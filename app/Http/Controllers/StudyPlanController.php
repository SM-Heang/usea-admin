<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use App\Models\Major;
use App\Models\Faculty;
use App\Models\Degree;
use App\Models\StudyYear;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Fac_icon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudyPlanController extends Controller
{
    public function index()
    {
        $plans = StudyPlan::paginate(15);
        return view('study-plan.index', ['plans' => $plans]);
    }

    public function create()
    {
        $facultys = Faculty::all();
        $majors = Major::all();
        $educations = Degree::all();
        $years = StudyYear::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        $icons = Fac_icon::all();
        return view('study-plan.create', ['facultys' => $facultys, 'majors' => $majors, 'educations' => $educations, 'years' => $years, 'semesters' => $semesters, 'subjects' => $subjects, 'icons' => $icons]);
    }

    public function store(Request $request)
    {
        $facultys = Faculty::all();
        $majors = Major::all();
        $educations = Degree::all();
        $years = StudyYear::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        $icons = Fac_icon::all();

        $Faculty = count($facultys);
        $Major = count($majors);
        $Degree = count($educations);
        $StudyYear = count($years);
        $Semester = count($semesters);
        $Subject = count($subjects);
        $Fac_icon = count($icons);

        DB::transaction(function () use($request, $Faculty, $Major, $Degree, $StudyYear,  $Semester, $Subject, $Fac_icon){
        $validated = $request->validate([
            'fac_icon' => ['required','integer', "max:$Fac_icon"],
            'fac_name' => ['required','integer', "max:$Faculty"],
            'major_name' => ['required','integer', "max:$Major"],
            'education_name' => ['required','integer', "max:$Degree"],
            'major_info_en' => ['required','integer', "max:$Major"],
            'major_info_kh' => ['required','integer', "max:$Major"],
            'study_year' => ['required','integer', "max:$StudyYear"],
            'semester_name' => ['required','integer', "max:$Semester"],
            'subject_name' => ['required','integer', "max:$Subject"],
            'study_hour' => ['required','integer'],
            'credit' => ['required','integer'],

        ]);

        $plan = new StudyPlan;
        $plan->fac_icon = $request->fac_icon;
        $plan->fac_name = $request->fac_name;
        $plan->major_name = $request->major_name;
        $plan->education_name = $request->education_name;
        $plan->major_info_en = $request->major_info_en;
        $plan->major_info_kh = $request->major_info_kh;
        $plan->study_year = $request->study_year;
        $plan->semester_name = $request->semester_name;
        $plan->subject_name = $request->subject_name;
        $plan->study_hour = $request->study_hour;
        $plan->credit = $request->credit;
        $plan->user_id = auth()->id(); 
        $plan->save();

        });

        return redirect()->route('study-plan.index')->with('status', 'Study Plan Added  Successfully');
    }

    public function edit(string $id)
    {
        $plan = StudyPlan::findOrFail($id);
        $facultys = Faculty::all();
        $majors = Major::all();
        $educations = Degree::all();
        $years = StudyYear::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        $icons = Fac_icon::all();
        return view('study-plan.edit', ['plan' => $plan, 'facultys' => $facultys, 'majors' => $majors, 'educations' => $educations, 'years' => $years, 'semesters' => $semesters, 'subjects' => $subjects, 'icons' => $icons]);
    }

    public function update(Request $request, $id)
    {
        $facultys = Faculty::all();
        $majors = Major::all();
        $educations = Degree::all();
        $years = StudyYear::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        $icons = Fac_icon::all();

        $Faculty = count($facultys);
        $Major = count($majors);
        $Degree = count($educations);
        $StudyYear = count($years);
        $Semester = count($semesters);
        $Subject = count($subjects);
        $Fac_icon = count($icons);

        DB::transaction(function () use($request, $id, $Faculty, $Major, $Degree, $StudyYear,  $Semester, $Subject, $Fac_icon){
        $validated = $request->validate([
            'fac_icon' => ['required','integer', "max:$Fac_icon"],
            'fac_name' => ['required','integer', "max:$Faculty"],
            'major_name' => ['required','integer', "max:$Major"],
            'education_name' => ['required','integer', "max:$Degree"],
            'major_info_en' => ['required','integer', "max:$Major"],
            'major_info_kh' => ['required','integer', "max:$Major"],
            'study_year' => ['required','integer', "max:$StudyYear"],
            'semester_name' => ['required','integer', "max:$Semester"],
            'subject_name' => ['required','integer', "max:$Subject"],
            'study_hour' => ['required','integer'],
            'credit' => ['required','integer'],

        ]);

        $plan = StudyPlan::findOrFail($id);
        $plan->fac_icon = $request->fac_icon;
        $plan->fac_name = $request->fac_name;
        $plan->major_name = $request->major_name;
        $plan->education_name = $request->education_name;
        $plan->major_info_en = $request->major_info_en;
        $plan->major_info_kh = $request->major_info_kh;
        $plan->study_year = $request->study_year;
        $plan->semester_name = $request->semester_name;
        $plan->subject_name = $request->subject_name;
        $plan->study_hour = $request->study_hour;
        $plan->credit = $request->credit;
        $plan->user_id = auth()->id(); 
        $plan->save();

        });

        return redirect()->route('study-plan.index')->with('status', 'Study Plan Edited  Successfully');
        
    }

    public function destroy($id)
    {
        $plan = StudyPlan::findOrFail($id);
        $plan->delete();
        return redirect()->route('study-plan.index')->with('status', 'Study Plan Deleted Successfully');

    }

}
