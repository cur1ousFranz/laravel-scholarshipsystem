<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicantList;
use App\Models\RejectedApplicant;
use App\Models\QualifiedApplicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Applicaiton Form
     */
    public function apply(){

        $application = DB::table('applications')->where('status', 'On-going')->latest()->first();
        $applicant = Applicant::where('users_id', Auth::user()->id)->first();

        if($application != null){
            $applicationDetail = DB::table('application_details')
            ->where('applications_id', $application->id)->first();

            return view('applicant.apply',[
                'applicant' => $applicant,
                'application' => $application,
                'applicationDetail' => $applicationDetail,
            ]);

        // Returning back to page if there is no application On-going.
        }else{
            return back();
        }

    }

    // Submission Store
    public function submissionStore(Request $request, Application $application)
    {

        $formFields = $request->validate([

            'document' => ['required', 'mimes:pdf']
        ]);

        $applicant = Applicant::where('users_id', Auth::user()->id)->first();

        $formFields['document'] = $request->file('document')->store('application_submissions', 'public');
        $formFields['applications_id'] = $application->id;
        $formFields['applicants_id'] = $applicant->id;

        /**
         * This is for second validation which avoid the
         * user manipulation using the inspect element
         */

        // Validating if applicant is exist in ApplicantList
        $applicantList = ApplicantList::where([
            'applications_id' => $application->id,
            'applicants_id' => $applicant->id
        ])->exists();

        // Validating if applicant is exist in QualifiedApplicant list
        $qualifiedList = QualifiedApplicant::where([
            'applications_id' => $application->id,
            'applicants_id' => $applicant->id
        ])->exists();

        // Validating if applicant is exist in RejectedApplicant list
        $rejectedList = RejectedApplicant::where([
            'applications_id' => $application->id,
            'applicants_id' => $applicant->id
        ])->exists();

        if ($applicantList || $applicant->first_name == null || $qualifiedList || $rejectedList) {
            abort('403', 'Unauthorized Action');
        } else {

            ApplicantList::create($formFields);

            return back()->with('success', 'Application submitted successfully!');
        }
    }
}
