<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Address;
use App\Models\Contact;
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
        $school = DB::table('schools')->where('applicants_id', $applicant->id)->first();
        $address = DB::table('addresses')->where('applicants_id', $applicant->id)->first();
        $course = DB::table('courses')->get();
        $contact = DB::table('contacts')->where('applicants_id', $applicant->id)->first();

        return view('applicant.profile', [
            'applicant' => $applicant,
            'school' => $school,
            'address' => $address,
            'course' => $course,
            'contact' => $contact
        ]);
    }

    // Applicant profile edit form
    public function applicantProfileEdit(){

        $applicant = DB::table('applicants')->where('users_id', Auth::user()->id)->first();
        $school = DB::table('schools')->where('applicants_id', $applicant->id)->first();
        $address = DB::table('addresses')->where('applicants_id', $applicant->id)->first();
        $course = DB::table('courses')->get();
        $contact = DB::table('contacts')->where('applicants_id', $applicant->id)->first();
        $ageArray = ['17', '18','19', '20','21', '22', '23', '24', '25'];

        return view('applicant.profile_edit', [
            'applicant' => $applicant,
            'school' => $school,
            'address' => $address,
            'course' => $course,
            'contact' => $contact,
            'age' => $ageArray
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
            'nationality' => 'required',            // Applicant Table
            'educational_attainment' => 'required',
            'years_in_city' => 'required',
            'family_income' => 'required',
            'gwa' => 'required',

            'desired_school' => 'required',
            'hei_type' => 'required',               // School Table
            'school_last_attended' => 'required',

            'course_name' => 'required',            // This will tkae the ID of course selected

            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',                   // Address Table
            'province' => 'required',
            'region' => 'required',
            'zipcode' => 'required',

            'contact_number' => 'required',         // Contact Table
            'email' => 'required',

        ]);

        $applicant = DB::table('applicants')->where('users_id', Auth::user()->id)->first();

        Applicant::where('users_id', $applicant->id)->update([

            'courses_id' => $formFields['course_name'],
            'first_name' => $formFields['first_name'],
            'middle_name' => $formFields['middle_name'],
            'last_name' => $formFields['last_name'],
            'age' => $formFields['age'],
            'gender' => $formFields['gender'],
            'civil_status' => $formFields['civil_status'],
            'nationality' => $formFields['nationality'],
            'educational_attainment' => $formFields['educational_attainment'],
            'years_in_city' => $formFields['years_in_city'],
            'family_income' => $formFields['family_income'],
            'gwa' => $formFields['gwa'],
        ]);

        School::where('applicants_id', $applicant->id)->update([

            'desired_school' => $formFields['desired_school'],
            'hei_type' => $formFields['hei_type'],
            'school_last_attended' => $formFields['school_last_attended'],
        ]);

        Address::where('applicants_id', $applicant->id)->update([

            'street' => $formFields['street'],
            'barangay' => $formFields['barangay'],
            'city' => $formFields['city'],
            'province' => $formFields['province'],
            'region' => $formFields['region'],
            'zipcode' => $formFields['zipcode'],
        ]);

        Contact::where('applicants_id', $applicant->id)->update([

            'contact_number' => $formFields['contact_number'],
            'email' => $formFields['email'],
        ]);

        return redirect('/profile');

    }
}
