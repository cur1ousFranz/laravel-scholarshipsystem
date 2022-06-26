<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    //
    /**
     * Applicaiton Form
     */
    public function apply(){

        $application = DB::table('applications')->where('status', 'On-going')->first();

        if($application != null){
            $applicationDetail = DB::table('application_details')
            ->where('applications_id', $application->id)->first();

            return view('applicant.apply',[
                'application' => $application,
                'applicationDetail' => $applicationDetail
            ]);
        }else{
            return back();
        }

    }
}
