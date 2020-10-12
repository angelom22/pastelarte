<?php

namespace App\Mail;

use App\Models\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Laravel\Cashier\Invoice;

class StudentNewOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public User $estudiante;

    /**
     * @var Order
     */
    public Order $order;

    /**
     * @var Invoice|null
     */
    public ?Invoice $invoice;

    /**
     * Create a new message instance.
     *
     * @param User $estudiante
     * @param Order $order
     */
    public function __construct(User $estudiante, Order $order)
    {
        $this->estudiante = $estudiante;
        $this->order = $order;
        $this->invoice = $this->estudiante->findInvoice($this->order->invoice_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $vendor = config("app.name");
        $product = "Compra de cursos";
        $invoice = $this->invoice;
        $owner = $this->estudiante;
        $pdf = \PDF::loadview('vendor.cashier.receipt', compact('invoice', 'product', 'vendor', 'owner'));
        return $this
            ->attachData($pdf->output(), $this->invoice->id . '-' . date('d-m-Y') . '.pdf', ['mime' => 'application/pdf'])
            ->subject("Gracias por tu pedido - " . config("app.name"))
            ->markdown("emails.estudiantes.new_order");
    }
}
