<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    /**
     * Applicant profile page
     */
    public function applicantProfile(){

        $applicant = DB::table('applicants')->where('users_id', Auth::user()->id)->first();
        return view('applicant.profile', [
            'applicant' => $applicant
        ]);
    }

    // Applicant profile edit form
    public function applicantProfileEdit(){

        $applicant = DB::table('applicants')->where('users_id', Auth::user()->id)->first();
        $course = DB::table('courses')->get();
        return view('applicant.profile_edit', [
            'applicant' => $applicant,
            'course' => $course
        ]);
    }

    // Update Profile of Applicant
    public function applicantProfileUpdate(Request $request){

        $formFields = $request->validate([
            'first_name' => ['required', 'min:2'],
            'middle_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'age' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'nationality' => 'required',
            'educational_attainment' => 'required',
            'years_in_city' => 'required',
            'family_income' => 'required',
            'gwa' => 'required',

            'desired_school' => 'required',
            'hei_type' => 'required',
            'school_last_attended' => 'required',

            'course_name' => 'required',

            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'region' => 'required',
            'zipcode' => 'required',

            'contact_number' => 'required',
            'email' => 'required',

        ]);


        // TODOOOOOOOOOOOOOOOOOOOOOOOOOOO!

    }
}
