<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicantList;
use App\Models\RejectedApplicant;
use App\Models\QualifiedApplicant;

class ListingApplicantController extends Controller
{

    public function index(ApplicantList $applicantlist){

        return view('coordinator.evaluation', [
            'applicantlist' => ApplicantList::with([
                                'applicant:id,educational_attainment,nationality,registered_voter,years_in_city,gwa,family_income',
                                'applicant.address:applicants_id,city',
                                'ratingReport:applicant_lists_id,rating',
                                ])
                                ->where('id', $applicantlist->id)
                                ->first()
                            ]);

    }

    public function store(Request $request, Application $application)
    {

        /**
         * Input has sent through checkboxes
         */
        if ($request->input('applicant')) {
            switch ($request->input('action')) {
                case 'qualified':

                    foreach ($request->input('applicant') as $applicantID) {

                        $applicantList = ApplicantList::where([
                            'applicants_id' => $applicantID,
                            'applications_id' => $application->id
                            ])
                            ->first();

                        /** Getting the current count of qualified applicants, for validating the slots */
                        $count = QualifiedApplicant::where('applications_id', $application->id)
                                    ->select('id')
                                    ->get()
                                    ->count();

                        // Validating if there is slot available
                        if($count < $application->slots){
                            $applicant = [
                                'applications_id' => $application->id,
                                'applicants_id' => $applicantID,
                                'applicant_lists_id' => $applicantList->id,
                                'document' => $applicantList->document,
                                'added' => auth()->user()->username
                            ];

                            QualifiedApplicant::create($applicant);
                            $applicantList->update(['review' => 'Yes']);

                        }else{

                            $application->update(['status' => 'Closed']);
                            return back()->with('error', 'No more slots available!');
                        }

                    }
                    return back()->with('success', 'Added to qualified successfully!');
                    break;

                case 'rejected':

                    foreach ($request->input('applicant') as $applicantID) {

                        $applicantList = ApplicantList::where(['applicants_id' => $applicantID,
                        'applications_id' => $application->id])->first();

                        $applicant = [
                            'applications_id' => $application->id,
                            'applicants_id' => $applicantID,
                            'applicant_lists_id' => $applicantList->id,
                            'document' => $applicantList->document,
                            'added' => auth()->user()->username

                        ];

                        RejectedApplicant::create($applicant);
                        $applicantList->update(['review' => 'Yes']);
                    }

                    return back()->with('success', 'Added to rejected successfully!');
                    break;
            }
        } else {
            return back()->with('error', 'No applicants selected!');
        }
    }
}
