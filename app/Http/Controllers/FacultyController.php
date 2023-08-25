<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Major;

class FacultyController extends Controller
{
    public function index()
    {
        $facultys = Faculty::paginate(15);
        // dd($majors);
        return view('study-plan.faculty.index', ['facultys' => $facultys]);
    }

    public function create()
    {
        return view('study-plan.faculty.create');
    }

    public function store(Request $request)
    {
        $faculty = new Faculty;
        $faculty->fac_name_en = $request->fac_name_en;
        $faculty->fac_name_kh = $request->fac_name_kh;
        $faculty->user_id = auth()->id(); 
        $faculty->save();
        return redirect()->route('study-plan.faculty.index')->with('status', 'Faculty Added  Successfully');
    }
    
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
        // dd($major);
        return view('study-plan.faculty.edit', ['faculty' => $faculty]);
    }

    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'major_name_en' => 'required|max:255',
        //     'major_name_kh' => 'required|max:255',
        //     'fac_id' => 'required',
        // ]);
        $faculty = Faculty::findOrFail($id);
        $faculty->fac_name_en = $request->fac_name_en;
        $faculty->fac_name_kh = $request->fac_name_kh;
        $faculty->user_id = auth()->id(); 
        $faculty->save();
        return redirect()->route('study-plan.faculty.index')->with('status', 'Faculty Edited  Successfully');
        
    }

    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        return redirect()->route('study-plan.faculty.index')->with('status', 'Faculty Plan Deleted Successfully');

    }


}
