<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\QualifiedApplicant;

class QualifiedApplicantController extends Controller
{

    public function index()
    {
        return view('coordinator.qualified_applicant',[
            'qualifiedApplicant' => QualifiedApplicant::with([
                                'application',
                                ])
                                ->select('applications_id')->distinct()
                                ->orderBy('created_at','desc')
                                ->paginate(10),
            'applicationArray' => array()
        ]);

    }

    public function show(Application $application)
    {
        $list = QualifiedApplicant::with([
                    'applicant',
                    'applicant.school',
                    'applicant.address',
                    'applicant.contact',
                    'application:id',
                    'applicantList:id',
                    'applicantList.rating:applicant_lists_id,rate',
                ])
                ->leftJoin('applicants', 'applicants.id' , '=', 'qualified_applicants.applicants_id')
                ->where('applications_id', $application->id)
                ->filter(request(['search']))
                ->orderBy('qualified_applicants.created_at','desc')
                ->paginate(10);

        return view('coordinator.qualified_applicant_list',[
            'qualifiedApplicantList' => $list,
            'application' => $application
        ]);
    }
}
