<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\QualifiedApplicant;

class QualifiedApplicantController extends Controller
{

    public function index()
    {
        /**
         * Retrieving the list of applications in QualifiedApplicants table
         * and filter it with unique applications_id, to avoid duplications
         */
        return view('coordinator.qualified_applicant',[
            'qualifiedApplicant' => QualifiedApplicant::with('applicant', 'application')
            ->select('applications_id')->distinct()
            ->orderBy('created_at','desc')
            ->paginate(10),
            'applicationArray' => array()
        ]);

    }

    public function show(Application $application){

        // Getting all qualified applicants and fetching data for search query
        $qualifiedApplicantList = QualifiedApplicant::with('applicant', 'application')
        ->where('applications_id', $application->id)
        ->latest()
        ->paginate(10);

        return view('coordinator.qualified_applicant_list',[
            'qualifiedApplicantList' => $qualifiedApplicantList,
            'application' => $application
        ]);
    }
}
