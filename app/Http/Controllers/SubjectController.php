<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(15);
        // dd($majors);
        return view('study-plan.subject.index', ['subjects' => $subjects]);
    }

    public function create()
    {
        return view('study-plan.subject.create');
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request){

        $validated = $request->validate([
            'subject_name_en' => 'required',
            'subject_name_kh' => 'required',
        ]);
        
        $subject = new Subject;
        $subject->subject_name_en = $request->subject_name_en;
        $subject->subject_name_kh = $request->subject_name_kh;
        $subject->user_id = auth()->id(); 
        $subject->save();

        });

        return redirect()->route('study-plan.subject.index')->with('status', 'Subject Added  Successfully');
    }


    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        // dd($major);
        return view('study-plan.subject.edit', ['subject' => $subject]);
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){

        $validated = $request->validate([
            'subject_name_en' => 'required',
            'subject_name_kh' => 'required',
        ]);
        $subject = Subject::findOrFail($id);
        $subject->subject_name_en = $request->subject_name_en;
        $subject->subject_name_kh = $request->subject_name_kh;
        $subject->user_id = auth()->id(); 
        $subject->save();

        });

        return redirect()->route('study-plan.subject.index')->with('status', 'Subject Edited  Successfully');
        
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('study-plan.subject.index')->with('status', 'Subject Deleted Successfully');

    }

}
