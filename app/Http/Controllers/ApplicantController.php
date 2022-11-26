<?php

namespace App\Http\Controllers;

use App\Http\Requests\Applicant\UpdateApplicantRequest;
use App\Models\Applicant;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{

    private $applicant;
    private function getApplicant(){

        $this->applicant = Applicant::where('users_id', Auth::user()->id)->first();

        return $this->applicant;
    }

    public function index()
    {
        $school_list = DB::table('school_courses')->groupBy('school')->get();

        return view('applicant.profile', [
            'applicant' => $this->getApplicant(),
            'school_list' => $school_list,
        ]);
    }

    public function edit()
    {

        $school_list = DB::table('school_courses')->groupBy('school')->get();
        $dynamic_address = DB::table('dynamic_addresses')->groupBy('country')->get();

        return view('applicant.profile_edit', [
            'applicant' => $this->getApplicant(),
            'school_list' => $school_list,
            'dynamic_address' => $dynamic_address,
        ]);
    }

    public function update(UpdateApplicantRequest $request)
    {
        // dd($request->all());
        dd('qwdqildhqwdiugqwd');
        $validated = $request->validated();

        $this->getApplicant()->update([
            'first_name' => ucwords(strtolower($validated['first_name'])),
            'middle_name' => request()->has('middle_name') ? ucwords(strtolower(request('middle_name'))) : NULL,
            'last_name' => ucwords(strtolower($validated['last_name'])),
            'birth_date' => $validated['birth_date'],
            'gender' => $validated['gender'],
            'civil_status' => $validated['civil_status'],
            'nationality' => $validated['nationality'],
            'educational_attainment' => $validated['educational_attainment'],
            'years_in_city' => $validated['years_in_city'],
            'family_income' => $validated['family_income'],
            'registered_voter' => $validated['registered_voter'],
            'gwa' => $validated['gwa'],
        ]);

        $this->getApplicant()->school()->update([
            'desired_school' => $validated['desired_school'],
            'course_name' => $validated['course_name'],
            'hei_type' => $validated['hei_type'],
            'school_last_attended' => ucwords(strtolower($validated['school_last_attended'])),
        ]);

        $this->getApplicant()->address()->update([
            'country' => $validated['country'],
            'province' => $validated['province'],
            'city' => $validated['city'],
            'barangay' => $validated['barangay'],
            'street' => ucwords(strtolower($validated['street'])),
            'region' => $validated['region'],
            'zipcode' => $validated['zipcode'],
        ]);

        $this->getApplicant()->contact()->update([
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'],
        ]);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

}
