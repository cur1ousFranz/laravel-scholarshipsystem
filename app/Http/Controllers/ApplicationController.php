<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    /**
     * Applicaiton Form
     */
    public function apply(){

        return view('applicant.apply');
    }
}
