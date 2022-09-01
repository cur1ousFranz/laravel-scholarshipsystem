<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicantList;
use App\Models\ApplicationDetail;
use App\Models\RejectedApplicant;
use App\Models\QualifiedApplicant;
use Illuminate\Support\Facades\DB;
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

        $application = Application::where('status', 'On-going')->latest()->first();

        if($application != null){
            $applicationDetail = ApplicationDetail::where('applications_id', $application->id)->first();

            return view('applicant.apply',[
                'applicant' => $this->getApplicant(),
                'application' => $application,
                'applicationDetail' => $applicationDetail,
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

        // Validating if applicant is exist in ApplicantList
        $applicantList = ApplicantList::where([
            'applications_id' => $application->id,
            'applicants_id' => $this->getApplicant()->id
        ])->exists();

        // Validating if applicant is exist in QualifiedApplicant list
        $qualifiedList = QualifiedApplicant::where([
            'applications_id' => $application->id,
            'applicants_id' => $this->getApplicant()->id
        ])->exists();

        // Validating if applicant is exist in RejectedApplicant list
        $rejectedList = RejectedApplicant::where([
            'applications_id' => $application->id,
            'applicants_id' => $this->getApplicant()->id
        ])->exists();

        if ($applicantList || $this->getApplicant()->first_name == null || $qualifiedList || $rejectedList) {
            abort('403', 'Unauthorized Action');
        } else {

            ApplicantList::create($formFields);

            return back()->with('success', 'Application submitted successfully!');
        }
    }
}
