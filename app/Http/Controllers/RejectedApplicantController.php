<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\RejectedApplicant;

class RejectedApplicantController extends Controller
{

    public function index()
    {
        return view('coordinator.rejected_applicant',[
            'rejectedApplicant' => RejectedApplicant::with('applicant', 'application')
            ->select('applications_id')
            ->distinct()
            ->orderBy('created_at','desc')
            ->paginate(10),
            'applicationArray' => array()
        ]);
    }

    public function show(Application $application)
    {
        $list = RejectedApplicant::with([
            'applicant',
            'applicant.school',
            'applicant.address',
            'applicant.contact',
            'application:id',
            'applicantList:id',
            'applicantList.rating:applicant_lists_id,rate',
            ])
            ->leftJoin('applicants', 'applicants.id' , '=', 'rejected_applicants.applicants_id')
            ->filter(request(['search']))
            ->orderBy('rejected_applicants.created_at','desc')
            ->where('applications_id', $application->id)
            ->paginate(10);

        return view('coordinator.rejected_applicant_list',[
            'rejectedApplicantList' => $list,
            'application' => $application
        ]);
    }
}
