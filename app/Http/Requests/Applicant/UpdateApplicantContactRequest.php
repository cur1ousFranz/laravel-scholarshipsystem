<?php

namespace App\Http\Requests\Applicant;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantContactRequest extends FormRequest
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
            'contact_number'    => ['required', 'numeric'],
            'email'             => ['required','email', Rule::unique('contacts', 'email')
                                        ->ignore($this->applicant)
                                    ],
        ];
    }

    public function messages()
    {
        return [
            'contact_number.required'          => 'Contact Number is required',
            'contact_number.numeric'            => 'Invalid contact number',
            'email.required'                   => 'Email is required',
            'email.email'                      => 'Invalid email',
        ];
    }
}
