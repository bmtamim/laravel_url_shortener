<?php


namespace App\Actions;

use App\DTO\CheckoutDTO;
use App\Models\Package;
use App\Services\StripePayment;

class CheckoutAction
{
    public function __invoke(CheckoutDTO $DTO, Package $package)
    {
        $payment = new StripePayment($DTO->card_number, $DTO->card_expiry_month, $DTO->card_expiry_year, $DTO->card_cvc);

    }
}
