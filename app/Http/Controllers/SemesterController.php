<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::paginate(15);
        // dd($semesters);
        return view('study-plan.semester.index', ['semesters' => $semesters]);
    }

    public function create()
    {
        return view('study-plan.semester.create');
    }
    public function store(Request $request)
    {
        $semester = new Semester;
        $semester->semester_name_en = $request->semester_name_en;
        $semester->semester_name_kh = $request->semester_name_kh;
        $semester->user_id = auth()->id(); 
        $semester->save();
        return redirect()->route('study-plan.semester.index')->with('status', 'Semester Added  Successfully');
    }

    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        // dd($major);
        return view('study-plan.semester.edit', ['semester' => $semester]);
    }

    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'major_name_en' => 'required|max:255',
        //     'major_name_kh' => 'required|max:255',
        //     'fac_id' => 'required',
        // ]);
        $semester = Semester::findOrFail($id);
        $semester->semester_name_en = $request->semester_name_en;
        $semester->semester_name_kh = $request->semester_name_kh;
        $semester->user_id = auth()->id(); 
        $semester->save();
        return redirect()->route('study-plan.semester.index')->with('status', 'Semester Edited  Successfully');
        
    }

    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();
        return redirect()->route('study-plan.semester.index')->with('status', 'Semester Deleted Successfully');

    }

}

