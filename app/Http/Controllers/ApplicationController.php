<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
        /**
     * Application Store
     */
    public function applicationStore(Request $request){

        $formFields = $request->validate([
            'slots' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $coordinatorID = DB::table('coordinators')->where('users_id', Auth::user()->id)->first();
        $formFields['coordinators_id'] = $coordinatorID->id;
        $formFields['status'] = "On-going";

        dd($formFields);

    }
}
