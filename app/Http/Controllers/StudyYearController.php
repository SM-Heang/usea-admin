<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudyYearController extends Controller
{
    public function index()
    {
        $years = StudyYear::paginate(15);
        // dd($years);
        return view('study-plan.study-year.index', ['years' => $years]);
    }

    public function create()
    {
        return view('study-plan.study-year.create');
    }
    public function store(Request $request)
    {
        DB::transaction(function () use($request){
        $validated = $request->validate([
            'study_year_en' => 'required',
            'study_year_kh' => 'required',
        ]);
        
        $year = new StudyYear;
        $year->study_year_en = $request->study_year_en;
        $year->study_year_kh = $request->study_year_kh;
        $year->user_id = auth()->id(); 
        $year->save();

        });

        return redirect()->route('study-plan.study-year.index')->with('status', 'Study Year Added  Successfully');
    }

    public function edit($id)
    {
        $year = StudyYear::findOrFail($id);
        // dd($major);
        return view('study-plan.study-year.edit', ['year' => $year]);
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            
        $validated = $request->validate([
            'study_year_en' => 'required',
            'study_year_kh' => 'required',
        ]);
        $year = StudyYear::findOrFail($id);
        $year->study_year_en = $request->study_year_en;
        $year->study_year_kh = $request->study_year_kh;
        $year->user_id = auth()->id(); 
        $year->save();

        });
        
        return redirect()->route('study-plan.study-year.index')->with('status', 'Study Year Edited  Successfully');
        
    }

    public function destroy($id)
    {
        $year = StudyYear::findOrFail($id);
        $year->delete();
        return redirect()->route('study-plan.study-year.index')->with('status', 'Study Year Deleted Successfully');

    }
}
