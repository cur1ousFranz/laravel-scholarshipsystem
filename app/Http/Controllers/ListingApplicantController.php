<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicantList;
use App\Models\RejectedApplicant;
use App\Models\QualifiedApplicant;
use Illuminate\Support\Facades\Redirect;

class ListingApplicantController extends Controller
{
    public function store(Request $request, Application $application)
    {

        /**
         * Input has sent through checkboxes
         */
        if ($request->input('applicant')) {
            switch ($request->input('action')) {
                case 'qualified':

                    foreach ($request->input('applicant') as $applicantID) {

                        $applicant = ApplicantList::where(['applicants_id' => $applicantID,
                        'applications_id' => $application->id])->first();
                        $document = $applicant->document;

                        /** Getting the current count of qualified applicants, for validating the slots */
                        $qualifiedApplicantCount = QualifiedApplicant::where('applications_id', $application->id)->get()->count();

                        // Validating if there is slot available
                        if($qualifiedApplicantCount < $application->slots){
                            $applicant = [
                                'applications_id' => $application->id,
                                'applicants_id' => $applicantID,
                                'document' => $document,
                                'added' => auth()->user()->username
                            ];

                            // Adding to Qualified Applicant
                            QualifiedApplicant::create($applicant);

                            // Setting the applicant review to Yes
                            ApplicantList::where('applicants_id', $applicantID)->update([

                                'review' => 'Yes'
                            ]);

                        }else{

                            Application::where('id', $application->id)->update(['status' => 'Closed']);
                            return back()->with('error', 'No more slots available!');
                        }

                    }
                    return back()->with('success', 'Added to qualified successfully!');

                    break;

                case 'rejected':

                    foreach ($request->input('applicant') as $applicantID) {

                        $applicant = ApplicantList::where(['applicants_id' => $applicantID,
                        'applications_id' => $application->id])->first();
                        $document = $applicant->document;

                        $applicant = [
                            'applications_id' => $application->id,
                            'applicants_id' => $applicantID,
                            'document' => $document,
                            'added' => auth()->user()->username

                            ];

                        RejectedApplicant::create($applicant);

                        // Setting the applicant review to Yes
                        ApplicantList::where('applicants_id', $applicantID)->update([

                            'review' => 'Yes'
                        ]);
                    }
                    return back()->with('success', 'Added to rejected successfully!');

                    break;
            }
        } else {
            return Redirect::back()->with('error', 'No applicants selected!');
            // return back()->with('error', 'No applicants selected!');
        }
    }
}
