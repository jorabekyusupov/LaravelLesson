<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['string', 'required', 'max:255'],
            'lastname' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'max:255', 'email', 'unique:users'],
            'phone' => ['string', 'required', 'max:255', 'regex:/^(\+998)[0-9]{2}[0-9]{3}[0-9]{2}[0-9]{2}$/','starts_with:+998'],
            'password' => ['string', 'required', 'min:8'],
        ];
    }
}
