<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Support\Facades\Storage;

class ScholarController extends Controller
{


    public function store(){

        request()->validate(['image' => ['required', 'mimes:png,jpg,jpeg']]);
        $path = request()->file('image')->store('scholars', 's3');

        Scholar::create([
            'users_id' => auth()->user()->id,
            'image' => Storage::disk('s3')->url($path)
        ]);

        return back()->with('success', 'Scholar post successfully!');
    }
}
