<?php


namespace App\Services;


use App\Contracts\PaymentMethod;
use App\Models\Package;
use Exception;
use Illuminate\Validation\ValidationException;
use Stripe\Exception\ApiConnectionException;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

class StripePayment implements PaymentMethod
{
    public $stripe;
    public $card_number;
    public $expiry_month;
    public $expiry_year;
    public $card_cvc;

    public function __construct($card_number, $expiry_month, $expiry_year, $card_cvc)
    {
        $this->stripe = new StripeClient(env('STRIPE_KEY'));
        $this->card_number = str_replace(' ', '', $card_number);
        $this->expiry_month = $expiry_month;
        $this->expiry_year = $expiry_year;
        $this->card_cvc = $card_cvc;
    }

    public function createCharge(Package $package)
    {
        $this->stripe->charges->create([
            'amount'      => $package->price * 100,
            'currency'    => strtolower($package->currency),
            'source'      => $this->createToken(),
            'description' => 'Package Name : ' . $package->name,
        ]);
    }

    public function createToken(): string
    {
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number'    => $this->card_number,
                    'exp_month' => $this->expiry_month,
                    'exp_year'  => $this->expiry_year,
                    'cvc'       => $this->card_cvc,
                ],
            ]);
            return $token['id'];
        } catch (CardException | ApiErrorException | ApiConnectionException | Exception $e) {
            session()->flash('card_error', $e->getMessage());
            throw ValidationException::withMessages([
                'card_number' => $e->getMessage(),
            ]);
        }
    }

}
