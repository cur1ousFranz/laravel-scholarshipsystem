<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoordinatorController extends Controller
{

    /**
     * Registration form of Coordinator
     */
    public function createForm(){

        return view('coordinator.create_account');
    }

    /**
     * Create Account of Coordinator
     */
    public function createAccount(Request $request){
        $formFields = $request->validate([

            'username' => ['required', Rule::unique('users', 'username')],
            'password' => ['required', 'confirmed'],
            'code' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        if($formFields['code'] == 9999){
            $user = User::create([

                'username' => $formFields['username'],
                'password' => $formFields['password'],
                'role' => 'coordinator'
            ]);

            Coordinator::create([

                'users_id' => $user->id
            ]);

            return back();
        }else{
            return back()->withErrors(['username' => 'Invalid, please contact the administrator.'])->onlyInput('username');
        }
    }

    /**
     * Application Page
     */
    public function application(){

        return view('coordinator.application');
    }

    /**
     * Application Form
     */
    public function applicationCreate(){

        return view('coordinator.create_application');
    }

    /**
     * Application Store
     */
    public function applicationStore(Request $request){

        $formFields = $request->validate([
            'slots' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

            'description' => 'required',
            'years_in_city' => 'required',
            'family_income' => 'required',
            'educational_attainment' => 'required',
            'age' => 'required',
            'gwa' => 'required',
            'nationality' => 'required',
            'city' => 'required',
            'registered_voter' => 'required',
            'documentary_requirement' => ['required', 'mimes:pdf'],
            'application_form' => ['required', 'mimes:pdf']
        ]);


        $formFields['documentary_requirement'] = $request->file('documentary_requirement')->store('files', 'public');
        $formFields['application_form'] = $request->file('application_form')->store('files', 'public');

        dd($formFields);

        $coordinatorID = DB::table('coordinators')->where('users_id', Auth::user()->id)->first();
        $formFields['coordinators_id'] = $coordinatorID->id;
        $formFields['status'] = "On-going";

        // $application = Application::create($formFields);


    }

    /**
    * Submission Table
    */
   public function submission(){

       return view('coordinator.submission');
   }

       /**
    * Submission Table
    */
    public function applicant(){

        return view('coordinator.applicant');
    }
}
