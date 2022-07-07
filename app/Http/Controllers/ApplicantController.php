<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ApplicantController extends Controller
{
    /**
     * Applicant profile page
     */
    public function applicantProfile()
    {

        $applicant = Applicant::where('users_id', Auth::user()->id)->first();

        return view('applicant.profile', [
            'applicant' => $applicant

        ]);
    }

    // Applicant profile edit form
    public function applicantProfileEdit()
    {

        $applicant = Applicant::where('users_id', Auth::user()->id)->first();
        $ageArray = ['17', '18', '19', '20', '21', '22', '23', '24', '25'];

        $school_list = DB::table('school_courses')->groupBy('school')->get();
        $dynamic_address = DB::table('dynamic_address')->groupBy('country')->get();

        return view('applicant.profile_edit', [
            'applicant' => $applicant,
            'age' => $ageArray,
            'school_list' => $school_list,
            'dynamic_address' => $dynamic_address
        ]);
    }

    /**
     * This is used for Dynamic Dependent Dropdown
     * of School and Courses
     * AJAX
     */
    public function fetch(Request $request)
    {

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('school_courses')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }

    /**
     * This is used for Dynamic Dependent Dropdown
     * of Addresses
     * AJAX
     */
    public function fetchAddress(Request $request)
    {

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('dynamic_address')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }


    // Update Profile of Applicant
    public function applicantProfileUpdate(Request $request)
    {

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
            'registered_voter' => 'required',
            'gwa' => 'required',

            'desired_school' => 'required',
            'hei_type' => 'required',               // School Table
            'school_last_attended' => 'required',
            'course_name' => 'required',

            'country' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',               // Address Table
            'street' => 'required',
            'region' => 'required',
            'zipcode' => 'required',

            'contact_number' => 'required',         // Contact Table
            'email' => 'required',

        ]);

        $applicant = DB::table('applicants')->where('users_id', Auth::user()->id)->first();

        Applicant::where('id', $applicant->id)->update([

            'first_name' => ucwords($formFields['first_name']),
            'middle_name' => ucwords($formFields['middle_name']),
            'last_name' => ucwords($formFields['last_name']),
            'age' => $formFields['age'],
            'gender' => $formFields['gender'],
            'civil_status' => $formFields['civil_status'],
            'nationality' => $formFields['nationality'],
            'educational_attainment' => $formFields['educational_attainment'],
            'years_in_city' => $formFields['years_in_city'],
            'family_income' => $formFields['family_income'],
            'registered_voter' => $formFields['registered_voter'],
            'gwa' => $formFields['gwa'],
        ]);

        School::where('applicants_id', $applicant->id)->update([

            'desired_school' => $formFields['desired_school'],
            'course_name' => $formFields['course_name'],
            'hei_type' => $formFields['hei_type'],
            'school_last_attended' => ucwords($formFields['school_last_attended']),
        ]);

        Address::where('applicants_id', $applicant->id)->update([

            'country' => $formFields['country'],
            'province' => $formFields['province'],
            'city' => $formFields['city'],
            'barangay' => $formFields['barangay'],
            'street' => ucwords($formFields['street']),
            'region' => $formFields['region'],
            'zipcode' => $formFields['zipcode'],
        ]);

        Contact::where('applicants_id', $applicant->id)->update([

            'contact_number' => $formFields['contact_number'],
            'email' => $formFields['email'],
        ]);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Applicant Notification message
     */
    public function notificationMessage(Request $request){

        $notification = DB::table('notifications')->where('id', $request->route('id'))->first();

        return view('applicant.notification',[
            'notification' => $notification
        ]);
    }
}
