<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyYear;

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
        $year = new StudyYear;
        $year->study_year_en = $request->study_year_en;
        $year->study_year_kh = $request->study_year_kh;
        $year->user_id = auth()->id(); 
        $year->save();
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
        // $validated = $request->validate([
        //     'major_name_en' => 'required|max:255',
        //     'major_name_kh' => 'required|max:255',
        //     'fac_id' => 'required',
        // ]);
        $year = StudyYear::findOrFail($id);
        $year->study_year_en = $request->study_year_en;
        $year->study_year_kh = $request->study_year_kh;
        $year->user_id = auth()->id(); 
        $year->save();
        return redirect()->route('study-plan.study-year.index')->with('status', 'Study Year Edited  Successfully');
        
    }

    public function destroy($id)
    {
        $year = StudyYear::findOrFail($id);
        $year->delete();
        return redirect()->route('study-plan.study-year.index')->with('status', 'Study Year Deleted Successfully');

    }
}
