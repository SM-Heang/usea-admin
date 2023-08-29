<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $facultys = Faculty::all();
        $maxFacultyCount = count($facultys);

        DB::transaction(function () use($request, $maxFacultyCount){

        $validated = $request->validate([
            'major_name_en' => 'required',
            'major_name_kh' => 'required',
            'major_info_en' => 'required',
            'major_info_kh' => 'required',
            'fac_id' => ['required', 'integer', "max:$maxFacultyCount"],
        ]);
        
        $major = new Major;
        $major->major_name_en = $request->major_name_en;
        $major->major_name_kh = $request->major_name_kh;
        $major->major_info_en = $request->major_info_en;
        $major->major_info_kh = $request->major_info_kh;
        $major->fac_id  = $request->fac_id;
        $major->user_id = auth()->id(); 
        $major->save();

        });

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
        $facultys = Faculty::all();
        $maxFacultyCount = count($facultys);

        DB::transaction(function () use($request, $id, $maxFacultyCount){
        $validated = $request->validate([
            'major_name_en' => 'required',
            'major_name_kh' => 'required',
            'major_info_en' => 'required',
            'major_info_kh' => 'required',
            'fac_id' => ['required', 'integer', "max:$maxFacultyCount"],
        ]);
        $major = Major::findOrFail($id);
        $major->major_name_en = $request->major_name_en;
        $major->major_name_kh = $request->major_name_kh;
        $major->major_info_en = $request->major_info_en;
        $major->major_info_kh = $request->major_info_kh;
        $major->fac_id  = $request->fac_id;
        $major->user_id = auth()->id();
        $major->save();

        });

        return redirect()->route('study-plan.major.index')->with('status', 'Major Edited  Successfully');
        
    }
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();
        return redirect()->route('study-plan.major.index')->with('status', 'Study Tour Deleted Successfully');

    }
}
