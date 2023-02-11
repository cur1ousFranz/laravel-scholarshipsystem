<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\User\ForgotPasswordRequest;
use App\Http\Requests\User\ForgotPasswordUpdateRequest;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('applicant.forgot-password');
    }

    public function store(ForgotPasswordRequest $request)
    {   
        $validated = $request->validated();
        $user = User::with('applicant.contact')->whereHas('applicant.contact', function ($query) use ($validated) {
            $query->where('email', $validated['email']);
        })->first();

        $token = Str::random(120);
        $user->forgot_password_token = $token;
        $user->save();
        
        // Should change the redirect URL in config file
        $data = array('link' => config('app.url') . '/forgot/password/change/?ftoken=' . $token);
        Mail::send('email.email-password-reset', $data, function($message) use ($user){
            $message->to($user->applicant[0]->contact->email)->subject('Password Reset');
        });

        return back()->with('success', 'Reset link has sent to your email');
    }

    public function show()
    {
        return view('applicant.forgot-password-change');
    }

    public function update(ForgotPasswordUpdateRequest $request)
    {   
        $validated = $request->validated();
        $user = User::where('forgot_password_token', $validated['ftoken'])->first();
        if($user) {
            $user->password = bcrypt($validated['password']);
            $user->forgot_password_token = null;
            $user->save();
    
            return back()->with('success', 'Password updated successfully!');
        }

        return back()->with('error', 'Session expired');
    }
}
