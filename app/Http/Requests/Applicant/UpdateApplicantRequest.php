<?php

namespace App\Http\Requests\Applicant;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantRequest extends FormRequest
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
            'first_name'             => 'required',
            'last_name'              => 'required',
            'birth_date'             => 'required',
            'gender'                 => 'required',
            'civil_status'           => 'required',
            'nationality'            => 'required',
            'educational_attainment' => 'required',
            'years_in_city'          => 'required',
            'family_income'          => 'required',
            'registered_voter'       => 'required',
            'gwa'                    => 'required',

            'desired_school'         => 'required',
            'hei_type'               => 'required',
            'school_last_attended'   => 'required',
            'course_name'            => 'required',

            'country'                => 'required',
            'province'               => 'required',
            'city'                   => 'required',
            'barangay'               => 'required',
            'street'                 => 'required',
            'region'                 => 'required',
            'zipcode'                => 'required',

            'contact_number'         => 'required',
            'email'                  => ['required','email', Rule::unique('contacts', 'email')
                                        ->ignore($this->applicant)
                                    ],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'              => 'Firstname is required',
            'last_name.required'               => 'Lastname is required',
            'birth_date.required'              => 'Birth Date is required',
            'gender.required'                  => 'Gender is required',
            'civil_status.required'            => 'Civil Status is required',
            'nationality.required'             => 'Nationality is required',
            'educational_attainment.required'  => 'Educational attainment is required',
            'years_in_city.required'           => 'Years in city is required',
            'family_income.required'           => 'Family Income is required',
            'registered_voter.required'        => 'Registered Voter is required',
            'gwa.required'                     => 'GWA is required',

            'desired_school.required'          => 'Desired School is required',
            'hei_type.required'                => 'Hei Type is required',
            'school_last_attended.required'    => 'School Last Attented is required',
            'course_name.required'             => 'Course is required',

            'country.required'                 => 'Country is required',
            'province.required'                => 'Province is required',
            'city.required'                    => 'City is required',
            'barangay.required'                => 'Barangay is required',
            'street.required'                  => 'Street is required',
            'region.required'                  => 'Region is required',
            'zipcode.required'                 => 'Zipcode is required',

            'contact_number.required'          => 'Contact Number is required',
            'email.required'                   => 'Email is required',
            'email.email'                      => 'Invalid email',
        ];
    }
}
