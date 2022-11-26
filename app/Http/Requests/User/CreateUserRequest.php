<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'  => ['required', Rule::unique('users', 'username')],
            'email'     => ['required', 'sometimes', 'email', Rule::unique('contacts', 'email')],
            'password'  => ['required', 'confirmed', 'min:6']
        ];
    }

    public function messages()
    {
        return [
            'username.required'  => 'Username is required',
            'email.required'     => 'Email is required',
            'password.required'  => 'Password is required',
            'password.confirmed' => 'Password does not match',
        ];
    }
}
