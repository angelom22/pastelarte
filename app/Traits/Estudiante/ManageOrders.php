<?php
namespace App\Traits\Estudiante;

use App\Models\Order;

trait ManageOrders {
    public function orders() {
        $orders = auth()->user()->processedOrders();
        return view('estudiante.orders.index', compact('orders'));
    }

    public function showOrder(Order $order) {
        // dd($order->order_lines);
        $order
            ->load("order_lines.curso", "coupon")
            ->loadCount("order_lines");
        return view('estudiante.orders.show', compact('order'));
    }

    public function downloadInvoice(Order $order) {
        try {
            if ($order->user_id !== auth()->id()) {
                session()->flash("message", ["danger", __("No tienes acceso a este recurso")]);
                return back();
            }

            return auth()->user()->downloadInvoice($order->invoice_id, [
                'vendor' => env('APP_NAME'),
                'product' => __("Compra de cursos"),
                'street' => __("Alborada VI etapa, Av Eleodoro Aviles Minuche y Sozoranga. Mz. 6255 Cs. 260."),
                'location' => __("Guayaquil, Ecuador"),
                'phone' => __("Telefono: (+593) 980877300"),
            ]);

        } catch (\Exception $exception) {
            session()->flash("message", ["danger", __("Ha ocurrido un error descargando la factura")]);
            return back();
        }
    }
}
