<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string'],
            'email'       => ['required', 'string', 'email'],
            'address'     => ['required', 'string'],
            'city'        => ['required', 'string'],
            'state'       => ['required', 'string'],
            'country'     => ['required', 'string'],
            'zip'         => ['required', 'string'],
            'card_number' => ['required', 'string'],
            'card_expiry' => ['required', 'string'],
            'card_cvc'    => ['required', 'integer'],
        ];
    }
}
