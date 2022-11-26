<?php

namespace App\Http\Requests\Coordinator;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
            'slots'                   => 'required',
            'batch'                   => 'required',
            'end_date'                => 'required',
            'description'             => 'required',
            'documentary_requirement' => ['required', 'mimes:pdf'],
            'application_form'        => ['required', 'mimes:pdf']
        ];
    }

    public function messages()
    {
        return [
            'slots.required'                    => 'Slots is required',
            'batch.required'                    => 'Batch is required',
            'end_date.required'                 => 'End Date is required',
            'description.required'              => 'Description is required',
            'documentary_requirement.required'  => 'Documentary Requirement is required',
            'application_form.required'         => 'Application Form is required',
        ];
    }
}
