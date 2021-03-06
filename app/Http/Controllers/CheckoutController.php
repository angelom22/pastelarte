<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderLine;
use App\Services\Cart;
use DB;
use Laravel\Cashier\Exceptions\IncompletePayment;

class CheckoutController extends Controller
{
    public function index() {
        return view('payment.checkout.index');
    }

    public function processOrder()
    {
        if ( !auth()->user()->hasPaymentMethod()) {
            return redirect(
                route("estudiante.billing.credit_card_form")
            )->with("message", ["warning", __("Debes añadir un método de pago antes de procesar el pedido")]);
        }

        $order = null;
        
        try {
            DB::beginTransaction();

            $cart = new Cart;
            if (!$cart->hasProducts()) {
                return back()->with("message", ["danger", __("No hay productos para procesar")]);
            }

            $order = new Order;
            $order->user_id = auth()->id();
            $order->total_amount = $cart->totalAmountWithDiscount(false);

            if (session()->has("coupon")) {
                $coupon = Coupon::available(session("coupon"))->first();
                if ($coupon) {
                    $order->coupon_id = $coupon->id;
                }
            }

            $order->save();

            $orderLines = [];
            foreach ($cart->getContent() as $curso) {
                // dd($curso->carrera_id);
                $orderLines[] = [
                    "curso_id" => $curso->id,
                    "carrera_id" => $curso->carrera_id,
                    "order_id" => $order->id,
                    "precio" => (float)$curso->precio,
                    "created_at" => now()
                ];
            }

            OrderLine::insert($orderLines);
            DB::commit();

            auth()->user()->invoiceFor(__("Compra de cursos en Pastel Arte"), $order->total_amount * 100, [], [
                'tax_percent' => env('STRIPE_TAXES'),
            ]);
            $cart->clear();

            return redirect(route("estudiante.cursos"))
                ->with("message", ["success", __("Muchas gracias por tu pedido, ya puedes acceder a tus cursos")]);

        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('estudiante.cursos', ["order" => $order])]
            );
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with("message", ["danger", __($exception->getMessage())]);
        }
    }
}
