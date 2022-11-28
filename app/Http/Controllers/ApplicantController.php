<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Applicant\UpdateApplicantRequest;
use App\Http\Requests\Applicant\UpdateApplicantContactRequest;
use App\Models\Contact;

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
        $barangays = DB::table('barangays')->get();
        $family_incomes = DB::table('family_incomes')->first();
        $application = Application::with('applicationDetail')->where('status', 'On-going')->latest()->first();
        return view('applicant.profile', [
            'applicant' => $this->getApplicant(),
            'school_list' => $school_list,
            'barangays' => $barangays,
            'application' => $application,
            'family_incomes' => $family_incomes
        ]);
    }

    public function update(UpdateApplicantRequest $request)
    {
        $validated = $request->validated();

        $this->getApplicant()->update([
            'first_name' => ucwords(strtolower($validated['first_name'])),
            'middle_name' => request()->has('middle_name') ? ucwords(strtolower(request('middle_name'))) : NULL,
            'last_name' => ucwords(strtolower($validated['last_name'])),
            'birth_date' => $validated['birth_date'],
            'gender' => $validated['gender'],
            'civil_status' => $validated['civil_status'],
            'nationality' => 'Yes',
            'educational_attainment' => 'Yes',
            'years_in_city' => $validated['years_in_city'],
            'family_income' => $validated['family_income'],
            'registered_voter' => 'Yes',
            'gwa' => $validated['gwa'],
        ]);

        $this->getApplicant()->school()->update([
            'desired_school' => $validated['desired_school'],
            'course_name' => $validated['course_name'],
        ]);

        $this->getApplicant()->address()->update([
            'country' => 'Philippines',
            'province' => 'South Cotabato',
            'city' => 'General Santos',
            'barangay' => $validated['barangay'],
            'street' => ucwords(strtolower($validated['street'])),
            'region' => '12',
            'zipcode' => '9500',
        ]);

        $this->getApplicant()->contact()->update([
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'],
        ]);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    public function updateContact(UpdateApplicantContactRequest $request)
    {
        $validated = $request->validated();

        $contact = Contact::where('applicants_id', $this->getApplicant()->id)->first();
        $contact->contact_number = $validated['contact_number'];
        $contact->email = $validated['email'];
        $contact->save();

        return redirect('/profile')->with('success', 'Contact updated successfully!');
    }

}
