<?php


namespace App\DTO;


use App\Http\Requests\CheckoutRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CheckoutDTO extends DataTransferObject
{
    public $name;
    public $email;
    public $address;
    public $city;
    public $state;
    public $country;
    public $zip;
    public $card_number;
    public $card_expiry_month;
    public $card_expiry_year;
    public $card_cvc;

    public static function createFromRequest(CheckoutRequest $request)
    {
        $card_expiry = explode('/', $request->input('card_expiry'));
        $data = [
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'address'           => $request->input('address'),
            'city'              => $request->input('city'),
            'state'             => $request->input('state'),
            'country'           => $request->input('country'),
            'zip'               => $request->input('zip'),
            'card_number'       => $request->input('card_number'),
            'card_expiry_month' => rtrim($card_expiry[0]),
            'card_expiry_year'  => ltrim($card_expiry[1]),
            'card_cvc'          => $request->input('card_cvc'),
        ];
        return new self($data);
    }

    public function toArray(): array
    {
        $data = [
            'name'    => $this->name,
            'email'   => $this->email,
            'address' => $this->address,
            'city'    => $this->city,
            'state'   => $this->state,
            'country' => $this->state,
            'zip'     => $this->zip,
        ];
        return $data;
    }

    public function cardDetails(): array
    {
        return [
            'card_number'       => $this->card_number,
            'card_expiry_month' => $this->card_expiry_month,
            'card_expiry_year'  => $this->card_expiry_year,
            'card_cvc'          => $this->card_cvc,
        ];
    }
}
