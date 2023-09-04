<?php

namespace App\Http\Controllers;

use App\Models\Fac_icon;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Fac_iconController extends Controller
{
    public function index()
    {
        $icons = Fac_icon::paginate(15);
        return view('study-plan.fac_icon.index', ['icons' => $icons]);
    }

    public function create()
    {
        $facultys = Faculty::all();
        return view('study-plan.fac_icon.create', ['facultys' => $facultys]);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request){
        $facultys = Faculty::all();
        $maxFacultyCount = count($facultys);
        $validated = $request->validate([
            'icon_name' => 'required',
            'fac_name_en' => ['required', 'integer', "max:$maxFacultyCount"],
        ]);
        $icon = new Fac_icon;
        $icon->icon_name = $request->icon_name;
        $icon->fac_name_en = $request->fac_name_en;
        $icon->user_id = auth()->id(); 
        $icon->save();
        });
        return redirect()->route('study-plan.fac_icon.index')->with('status', 'Faculty iCon Added  Successfully');
    }

    public function edit(string $id)
    {
        $icon = Fac_icon::findOrFail($id);
        $facultys = Faculty::all();
        return view('study-plan.fac_icon.edit', ['icon' => $icon,'facultys' => $facultys]);
    }
    public function update(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            $facultys = Faculty::all();
            $maxFacultyCount = count($facultys);
            $validated = $request->validate([
                'icon_name' => 'required',
                'fac_name_en' => ['required', 'integer', "max:$maxFacultyCount"],
            ]);

        $icon = Fac_icon::findOrFail($id);
        $icon->icon_name = $request->icon_name;
        $icon->fac_name_en = $request->fac_name_en;
        $icon->user_id = auth()->id();                                                                                                                                                                 
        $icon->save();
        });

        return redirect()->route('study-plan.fac_icon.index')->with('status', 'Faculty icon  Edited  Successfully');
        
    }
    public function destroy($id)
    {
        $icon = Fac_icon::findOrFail($id);
        $icon->delete();
        return redirect()->route('study-plan.fac_icon.index')->with('status', 'Faculty iCon Deleted Successfully');

    }

}
