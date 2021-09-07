<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Contracts\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;


class StripeController extends Controller implements PaymentMethod
{
    public function makeToken(Request $request)
    {
        $request->validate([
            'card_number' => ['required', 'string'],
            'card_expiry' => ['required', 'string'],
            'card_cvc'    => ['required', 'integer'],
        ]);

        $stripe = new StripeClient(env('STRIPE_KEY'));
        $expiration = explode('/', $request->input('card_expiry'));
        $token = $stripe->tokens->create([
            'card' => [
                'number'    => $request->input('card_number'),
                'exp_month' => rtrim($expiration[0]),
                'exp_year'  => ltrim($expiration[1]),
                'cvc'       => $request->input('card_cvc'),
            ],
        ]);

        return response()->json([
            'token' => $token->id,
        ]);
    }

    public function assignSubscription()
    {

    }
}
