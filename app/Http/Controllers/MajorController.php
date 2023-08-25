<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::paginate(15);
       // dd($majors);
        return view('study-plan.major.index', ['majors' => $majors]);
    }

    public function create()
    {
        $facultys = Faculty::all();
        return view('study-plan.major.create',['facultys' => $facultys]);
    }

    public function store(Request $request)
    {
        $major = new Major;
        $major->major_name_en = $request->major_name_en;
        $major->major_name_kh = $request->major_name_kh;
        $major->fac_id  = $request->fac_id;
        $major->user_id = auth()->id(); 
        $major->save();
        return redirect()->route('study-plan.major.index')->with('status', 'Major Added  Successfully');
    }

    public function edit($id)
    {
        $major = Major::findOrFail($id);
        $facultys = Faculty::all();
        // dd($major);
        return view('study-plan.major.edit', ['major' => $major, 'facultys' => $facultys]);
    }

    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'major_name_en' => 'required|max:255',
        //     'major_name_kh' => 'required|max:255',
        //     'fac_id' => 'required',
        // ]);
        $major = Major::findOrFail($id);
        $major->major_name_en = $request->major_name_en;
        $major->major_name_kh = $request->major_name_kh;
        $major->fac_id  = $request->fac_id;
        $major->user_id = auth()->id(); 
        $major->save();
        return redirect()->route('study-plan.major.index')->with('status', 'Major Edited  Successfully');
        
    }
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();
        return redirect()->route('study-plan.major.index')->with('status', 'Study Tour Deleted Successfully');

    }
}
