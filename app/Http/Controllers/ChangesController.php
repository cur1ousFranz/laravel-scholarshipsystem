<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coordinator\FamilyIncomeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ChangesController extends Controller
{

    public function index()
    {
        $family_incomes = DB::table('family_incomes')->first();
        $school_list = DB::table('school_courses')->groupBy('school')->get();
        return view('coordinator.changes', [
            'family_incomes' => $family_incomes,
            'school_list' => $school_list,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_name' => 'required',
            'course_name' => 'required',
        ]);

        DB::table('school_courses')->insert([
            'school' => $validated['school_name'],
            'course' => $validated['course_name']
        ]);

        return back()->with('success', 'Course added!');
    }

    public function updateIncome(FamilyIncomeRequest $request)
    {
        $validated = $request->validated();
        $income = array();

        $bracket1 = str_replace(',', '', $validated['b1']);
        $bracket2 = str_replace(',', '', $validated['b2_1']) .'-'. str_replace(',', '', $validated['b2_2']);
        $bracket3 = str_replace(',', '', $validated['b3_1']) .'-'. str_replace(',', '', $validated['b3_2']);
        $bracket4 = str_replace(',', '', $validated['b4_1']) .'-'. str_replace(',', '', $validated['b4_2']);
        $bracket5 = str_replace(',', '', $validated['b5_1']) .'-'. str_replace(',', '', $validated['b5_2']);
        $bracket6 = str_replace(',', '', $validated['b6_1']) .'-'. str_replace(',', '', $validated['b6_2']);
        $bracket7 = str_replace(',', '', $validated['b7']);

        $income['bracket1'] = $bracket1;
        $income['bracket2'] = $bracket2;
        $income['bracket3'] = $bracket3;
        $income['bracket4'] = $bracket4;
        $income['bracket5'] = $bracket5;
        $income['bracket6'] = $bracket6;
        $income['bracket7'] = $bracket7;

        DB::table('family_incomes')->where('id', 1)->update([
            'range' => json_encode($income)
        ]);

        return back()->with('success', 'Family income updated!');
    }
}
