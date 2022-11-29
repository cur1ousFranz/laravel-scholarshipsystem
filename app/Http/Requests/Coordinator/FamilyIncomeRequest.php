<?php

namespace App\Http\Requests\Coordinator;

use Illuminate\Foundation\Http\FormRequest;

class FamilyIncomeRequest extends FormRequest
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
            'b1'      => 'required',
            'b2_1'    => 'required',
            'b2_2'    => 'required',
            'b3_1'    => 'required',
            'b3_2'    => 'required',
            'b4_1'    => 'required',
            'b4_2'    => 'required',
            'b5_1'    => 'required',
            'b5_2'    => 'required',
            'b6_1'    => 'required',
            'b6_2'    => 'required',
            'b7'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'b1.required'     => 'This field is required',
            'b2_1.required'   => 'This field is required',
            'b2_2.required'   => 'This field is required',
            'b3_1.required'   => 'This field is required',
            'b3_2.required'   => 'This field is required',
            'b4_1.required'   => 'This field is required',
            'b4_2.required'   => 'This field is required',
            'b5_1.required'   => 'This field is required',
            'b5_2.required'   => 'This field is required',
            'b6_1.required'   => 'This field is required',
            'b6_2.required'   => 'This field is required',
            'b7.required'     => 'This field is required',

        ];
    }
}
