<?php


namespace App\Contracts;


use App\Models\Package;

interface PaymentMethod
{
    public function createCharge(Package $package);
}
