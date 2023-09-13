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
        $majors = Major::all();
        $facultys = Faculty::all();
        $educations = Degree::all();
        $years = StudyYear::all();
        // $semesters = Semester::all();
        $subjects = Subject::all();
        $icons = Fac_icon::all();

        return view('study-plan.create', ['facultys' => $facultys,'majors' => $majors, 'educations' => $educations, 'years' => $years, 'subjects' => $subjects, 'icons' => $icons]);
    }

    public function store(Request $request)
    {

        $facIcons = $request->input('fac_icon');
        $facNames = $request->input('fac_name');
        $majorNames = $request->input('major_name');
        $educations = $request->input('education_name');
        $study_year = $request->input('study_year');
        // $semester_name = $request->input('semester_name');
        $subject_name = $request->input('subject_name');
        $study_hour = $request->input('study_hour');
        $credit = $request->input('credit');
        $major_kh = $request->input('major_info_kh');
        $major_en = $request->input('major_info_en');

        $recordCount = count($facIcons);
        $loops = 0;

        for ($i = 0; $i < $recordCount; $i++) {

            if (
                $facIcons[$i] === null ||
                $facNames[$i] === null ||
                $majorNames[$i] === null ||
                $educations[$i] === null ||
                $study_year[$i] === null ||
                $subject_name[$i] === null ||
                $study_hour[$i] === null ||
                $credit[$i] === null ||
                $major_kh[$i] === null ||
                $major_en[$i] === null
            ) {
                // Skip this record if any input value is null
                continue;
            }
                $loops++;
                $record = new StudyPlan([
                    'user_id' => auth()->id(),
                    'fac_icon' => $facIcons[$i],
                    'fac_name' => $facNames[$i],
                    'major_name' => $majorNames[$i],
                    'education_name' => $educations[$i],
                    'study_year' => $study_year[$i],
                    'subject_name' => $subject_name[$i],
                    'study_hour' => $study_hour[$i],
                    'credit' => $credit[$i],
                    'major_info_kh' => $major_kh[$i],
                    'major_info_en' => $major_en[$i],
                ]);
                $record->save();

        }

        return redirect()->route('study-plan.index')->with('status', "Study Plan Added $loops records Successfully");
    }

    public function edit(string $id)
    {
        $plan = StudyPlan::findOrFail($id);
        $facultys = Faculty::all();
        $majors = Major::all();
        $educations = Degree::all();
        $years = StudyYear::all();
        // $semesters = Semester::all();
        $subjects = Subject::all();
        $icons = Fac_icon::all();
        return view('study-plan.edit', ['plan' => $plan, 'facultys' => $facultys, 'majors' => $majors, 'educations' => $educations, 'years' => $years, 'subjects' => $subjects, 'icons' => $icons]);
    }

    public function update(Request $request, $id)
    {
        $facultys = Faculty::all();
        $majors = Major::all();
        $educations = Degree::all();
        $years = StudyYear::all();
        $subjects = Subject::all();
        $icons = Fac_icon::all();

        $Faculty = count($facultys);
        $Major = count($majors);
        $Degree = count($educations);
        $StudyYear = count($years);
        $Subject = count($subjects);
        $Fac_icon = count($icons);

        DB::transaction(function () use($request, $id, $Faculty, $Major, $Degree, $StudyYear, $Subject, $Fac_icon){
        $validated = $request->validate([
            'fac_icon' => ['required','integer', "max:$Fac_icon"],
            'fac_name' => ['required','integer', "max:$Faculty"],
            'major_name' => ['required','integer', "max:$Major"],
            'education_name' => ['required','integer', "max:$Degree"],
            'major_info_en' => ['required','integer', "max:$Major"],
            'major_info_kh' => ['required','integer', "max:$Major"],
            'study_year' => ['required','integer', "max:$StudyYear"],
            'subject_name' => ['required','integer', "max:$Subject"],
            'study_hour' => ['required','integer'],
            'credit' => ['required','integer'],

        ]);

        $plan = StudyPlan::findOrFail($id);
        $plan->user_id = auth()->id();
        $plan->fac_icon = $request->fac_icon;
        $plan->fac_name = $request->fac_name;
        $plan->major_name = $request->major_name;
        $plan->education_name = $request->education_name;
        $plan->major_info_en = $request->major_info_en;
        $plan->major_info_kh = $request->major_info_kh;
        $plan->study_year = $request->study_year;
        $plan->subject_name = $request->subject_name;
        $plan->study_hour = $request->study_hour;
        $plan->credit = $request->credit;
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
