<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    //
    /**
     * Applicaiton Form
     */
    public function apply(){

        $application = DB::table('applications')->where('status', 'On-going')->first();
        $applicant = Applicant::where('users_id', Auth::user()->id)->first();

        if($application != null){
            $applicationDetail = DB::table('application_details')
            ->where('applications_id', $application->id)->first();

            $applicantList = DB::table('applicant_lists')
            ->where('applications_id', $application->id)->get();

            // dd($applicantList);

            return view('applicant.apply',[
                'applicant' => $applicant,
                'applicantList' => $applicantList,
                'application' => $application,
                'applicationDetail' => $applicationDetail
            ]);
        }else{
            return back();
        }

    }
}
