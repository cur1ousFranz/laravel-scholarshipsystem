<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
}
