<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicantList;
use App\Models\RatingReport;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    private $applicant;
    private function getApplicant(){

        $this->applicant = Applicant::without('school', 'address', 'contact')
        ->where('users_id', Auth::user()->id)->first();

        return $this->applicant;
    }

    public function index(){

        $application = Application::with('applicationDetail')->where('status', 'On-going')->latest()->first();

        if($application != null){
            return view('applicant.apply',[
                'applicant' => $this->getApplicant(),
                'application' => $application,
            ]);

        }else{
            return back();
        }

    }

    public function store(Request $request, Application $application)
    {

        $formFields = $request->validate([

            'document' => ['required', 'mimes:pdf']
        ]);

        $formFields['document'] = $request->file('document')->store('application_submissions', 'public');
        $formFields['applications_id'] = $application->id;
        $formFields['applicants_id'] = $this->getApplicant()->id;

        /**
         * This is for second validation which avoid the
         * user manipulation using the inspect element
         */

        $exist = $application->applicantList
        ->where('applicants_id', $this->getApplicant()->id);

        if (!$exist->isEmpty() || $this->getApplicant()->first_name == null) {
            abort('403', 'Unauthorized Action');

        } else {

            /** MATCH ALGORITHM - RATING PERCENTAGE */

            // STAGE 1
            $passed = false;

            if($this->getApplicant()->educational_attainment === "Yes"
            && $this->getApplicant()->nationality === "Yes"
            && $this->getApplicant()->registered_voter === "Yes"
            && $this->getApplicant()->address->city === "General Santos"){

                $passed = true;
            }

            $rating = 0;
            // STAGE 2
            if($passed) {

                switch($this->getApplicant()->family_income){

                    case "Less than ₱10,957" : $rating += 50; break;
                    case "₱10,957 to ₱21,194" : $rating += 42; break;
                    case "₱21,194 to ₱43,828" : $rating += 35; break;
                    case "₱43,828 to ₱76,669" : $rating += 28; break;
                    case "₱76,669 to ₱131,484" : $rating += 21; break;
                    case "₱131,484 to ₱219,140" : $rating += 14; break;
                    case "₱219,140 and above" : $rating += 7; break;
                }

                switch(true){

                    case ($this->getApplicant()->gwa >= 80): $rating += 35; break;
                    case ($this->getApplicant()->gwa < 80 && $this->getApplicant()->gwa >= 75)
                    : $rating += 17; break;
                    case ($this->getApplicant()->gwa < 75) : $rating += 8; break;
                }

                switch($this->getApplicant()->years_in_city){

                    case 1 : $rating += 3; break;
                    case 2 : $rating += 7; break;
                    case 3 : $rating += 15; break;
                }

                RatingReport::create([
                    'applicant_lists_id' => ApplicantList::create($formFields)->id,
                    'rating' => $rating
                ]);

            }else{

                $applicantList = ApplicantList::create([
                    'applications_id' => $formFields['applications_id'],
                    'applicants_id' =>  $formFields['applicants_id'],
                    'document' => $formFields['document'],
                    'review' => 'Yes',
                ]);

                $applicantList->ratingReport()->create([
                    'rating' => 0
                ]);

                $applicantList->rejectedApplicant()->create([
                    'applications_id' => $formFields['applications_id'],
                    'applicants_id' =>  $formFields['applicants_id'],
                    'document' => $formFields['document'],
                    'added' => "System"
                ]);

            }

            return back()->with('success', 'Application submitted successfully!');
        }
    }
}
