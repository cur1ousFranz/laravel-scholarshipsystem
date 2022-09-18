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

    public function show(Application $application){

        $list = RejectedApplicant::with([
            'applicant:id,first_name,middle_name,last_name,age,gender,civil_status,nationality,educational_attainment,years_in_city,family_income,registered_voter,gwa',
            'applicant.school:applicants_id,desired_school,course_name,hei_type,school_last_attended',
            'applicant.address:applicants_id,country,province,city,barangay,street,region,zipcode',
            'applicant.contact:applicants_id,contact_number,email',
            'application:id',
            'applicantList:id',
            'applicantList.ratingReport:applicant_lists_id,rating',
            ])
            ->where('applications_id', $application->id)
            ->select(
                'applicants_id',
                'applications_id',
                'applicant_lists_id',
                'document',
            )
            ->latest()
            ->paginate(10);

        return view('coordinator.rejected_applicant_list',[
            'rejectedApplicantList' => $list,
            'application' => $application
        ]);
    }
}
