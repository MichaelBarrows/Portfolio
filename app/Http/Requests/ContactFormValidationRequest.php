<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormValidationRequest extends FormRequest
{
    protected $redirect = "/#contact";

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email_address' => 'required|email',
            'phone_number' => 'required|string',
            'message' => 'required|string',
        ];
    }
}
