<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function creditCardForm() {
        return view("estudiante.credit_card_form");
    }

    public function processCreditCardForm() {
        // dd(request());
        $this->validate(request(), [
            'card_number' => 'required',
            'year' => 'required',
            'mes' => 'required',
            'cvc' => 'required'
        ]);

        try {
            \DB::beginTransaction();
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            if ( ! auth()->user()->hasPaymentMethod()) {
                auth()->user()->createAsStripeCustomer();
            }

            $paymentMethod = \Stripe\PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => request('card_number'),
                    'exp_month' => request('mes'),
                    'exp_year' => request('year'),
                    'cvc' => request('cvc'),
                ]
            ]);

            auth()->user()->updateDefaultPaymentMethod($paymentMethod->id);
            auth()->user()->save();

            \DB::commit();
            return back()->with(
                'message',
                ['success', __('Tarjeta actualizada correctamente')]
            );
        } catch (\Exception $exception) {
            \DB::rollBack();
            return back()->with('message', ['danger', $exception->getMessage()]);
        }
    }
}
