<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest as RequestsCreateUserRequest;
use App\Models\User;
use App\Models\Scholar;
use App\Models\Activity;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\LoginUserRequest;
use Illuminate\Notifications\Notifiable;

class UserController extends Controller
{

    use Notifiable;

    public function index(){

        if(Auth::check() && auth()->user()->role === 'coordinator'){
            return redirect('/home');
        }
        return view('welcome', [
            'activities' => Activity::latest()->limit(3)->get(),
            'application' => Application::where('status', 'On-going')->first(),
            'scholars' => Scholar::latest()->get()
        ]);
    }
    public function signup(){

        return view('signup');
    }

    public function create(CreateUserRequest $request){

        $validated = $request->validated();

        $user = User::create([
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
            'role' => 'applicant'
        ]);

        $applicant = $user->applicant()->create();
        $applicant->contact()->create(['email' => $validated['email']]);
        $applicant->address()->create();
        $applicant->school()->create();

        return back()->with('success', 'Created account succesfully!');
    }

    public function login(LoginUserRequest $request)
    {

        $validated = $request->validated();
        $user = User::where('username', $validated['username'])->first();

        if(Auth::attempt($validated)){
            if($user->role == "applicant"){
                $request->session()->regenerate();
                return redirect('/')->with('success', 'You logged in!');
            }

            if($user->role == "coordinator"){
                $request->session()->regenerate();
                return redirect('/home')->with('success', 'You logged in!');
            }
        }

        return back()->with('error', 'Invalid Credentials!');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
