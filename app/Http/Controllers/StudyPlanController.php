<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use App\Models\Major;
use App\Models\Faculty;
use App\Models\Degree;
use App\Models\StudyYear;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;

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
        return view('study-plan.create', ['facultys' => $facultys, 'majors' => $majors, 'educations' => $educations, 'years' => $years, 'semesters' => $semesters, 'subjects' => $subjects]);
    }

    public function store(Request $request)
    {
        $plan = new StudyPlan;
        $plan->fac_icon = $request->fac_icon;
        $plan->fac_name = $request->fac_name;
        $plan->major_name = $request->major_name;
        $plan->education_name = $request->education_name;
        $plan->major_info = $request->major_info;
        $plan->study_year = $request->study_year;
        $plan->semester_name = $request->semester_name;
        $plan->subject_name = $request->subject_name;
        $plan->study_hour = $request->study_hour;
        $plan->credit = $request->credit;
        $plan->user_id = auth()->id(); 
        $plan->save();
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
        return view('study-plan.edit', ['plan' => $plan, 'facultys' => $facultys, 'majors' => $majors, 'educations' => $educations, 'years' => $years, 'semesters' => $semesters, 'subjects' => $subjects]);
    }

    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'major_name_en' => 'required|max:255',
        //     'major_name_kh' => 'required|max:255',
        //     'fac_id' => 'required',
        // ]);
        $plan = StudyPlan::findOrFail($id);
        $plan->fac_icon = $request->fac_icon;
        $plan->fac_name = $request->fac_name;
        $plan->major_name = $request->major_name;
        $plan->education_name = $request->education_name;
        $plan->major_info = $request->major_info;
        $plan->study_year = $request->study_year;
        $plan->semester_name = $request->semester_name;
        $plan->subject_name = $request->subject_name;
        $plan->study_hour = $request->study_hour;
        $plan->credit = $request->credit;
        $plan->user_id = auth()->id(); 
        $plan->save();
        return redirect()->route('study-plan.index')->with('status', 'Study Plan Edited  Successfully');
        
    }

    public function destroy($id)
    {
        $plan = StudyPlan::findOrFail($id);
        $plan->delete();
        return redirect()->route('study-plan.index')->with('status', 'Study Plan Deleted Successfully');

    }

}
