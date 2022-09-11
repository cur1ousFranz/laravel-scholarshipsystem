<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;

class ScholarController extends Controller
{


    public function store(){

        request()->validate(['image' => ['required', 'mimes:png,jpg,jpeg']]);
        $imagePath = request()->file('image')->store('scholars', 'public');

        Scholar::create([
            'users_id' => auth()->user()->id,
            'image' => $imagePath
        ]);

        return back()->with('success', 'Scholar post successfully!');
    }
}
