<?php
namespace App\Http\Controllers;

use App\Jobs\SendOwnerSalesEmail;
use App\Mail\StudentNewOrder;
use App\Models\Order;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Http\Controllers\WebhookController;
use Log;

class StripeWebHookController extends WebhookController {
    /**
     *
     * WEBHOOK que se encarga de obtener un evento al hacer un pago correctamente
     * charge.succeeded
     * @param $payload
     * @return Response
     */
    public function handleChargeSucceeded($payload) {
        try {
            $invoice_id = $payload['data']['object']["invoice"];
            $user = $this->getUserByStripeId($payload['data']['object']['customer']);
            if ($user) {
                $order = $user->orders()
                    ->where("status", Order::PENDIENTE)
                    ->latest()
                    ->first();
                if ($order) {
                    $order->load("order_lines.curso.user");
                    $order->update([
                        'invoice_id' => $invoice_id,
                        'status' => Order::ACEPTADA
                    ]);

                    // Asignacion de cursos para el usuario
                    $CursosId = $order->order_lines()->pluck("curso_id");
                    Log::info(json_encode($CursosId));
                    $user->cursos_estudiantes()->attach($CursosId);

                    Log::info(json_encode($user));
                    Log::info(json_encode($order));
                    Log::info("Pedido actualizado correctamente");
                    
                    // Envio de email para el estudiante
                    Mail::to($user->email)->queue(new StudentNewOrder($user, $order));

                    // Envio de email para el propietario del curso
                    foreach($order->order_lines as $order_line){
                       SendOwnerSalesEmail::dispatch(
                           $order_line->curso->user,
                           $user,
                           $order_line->curso
                       );
                    }

                    return new Response('Webhook Handled: {handleChargeSucceeded}', 200);
                }
            }
        } catch (\Exception $exception) {
            Log::debug("Excepción Webhook {handleChargeSucceeded}: " . $exception->getMessage() . ", Line: " . $exception->getLine() . ', File: ' . $exception->getFile());
            return new Response('Webhook Handled with error: {handleChargeSucceeded}', 400);
        }
    }
}
