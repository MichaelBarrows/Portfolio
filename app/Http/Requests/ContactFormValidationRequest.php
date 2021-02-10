<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormValidationRequest extends FormRequest
{
    protected $redirect = "/#contact";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email_address' => ['required'],
            'phone_number' => ['required'],
            'message' => ['required'],
        ];
    }
}
