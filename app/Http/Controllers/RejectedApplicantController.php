<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\RejectedApplicant;

class RejectedApplicantController extends Controller
{

    public function index()
    {

        return view('coordinator.rejected_applicant',[
            'rejectedApplicant' => RejectedApplicant::select('applications_id')->distinct()
            ->orderBy('created_at','desc')
            ->paginate(10),
            'applicationArray' => array()
        ]);
    }

    public function show(Application $application){

        $rejectedApplicantList = RejectedApplicant::where('applications_id', $application->id)
                ->latest()
                ->paginate(10);

        return view('coordinator.rejected_applicant_list',[
            'rejectedApplicantList' => $rejectedApplicantList,
            'application' => $application
        ]);
    }
}
