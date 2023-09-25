<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::paginate(15);
        return view('career.index', ['careers' => $careers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $career = new Career;
        $career->user_id = auth()->id();
        // $career->career_img = $request -> input('career_img');

        if($request->hasfile('career_img')){
            $file = $request->file('career_img');
            // $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            // $filename = time() . '.' . $extension;
            $file->move('../../usea-edu.kh/media/career/logos/', $filename);
            $career->career_img = $filename;
        }else{
            return $request;
            $career->career_img = '';
        }

        $career->career_position_en = $request -> input('career_position_en');
        $career->career_position_kh = $request -> input('career_position_kh');
        $career->career_organization_en = $request -> input('career_organization_en');
        $career->career_organization_kh = $request -> input('career_organization_kh');

        // check if user submit career detail image
        if($request->hasfile('career_detail_img')){
            $file = $request -> file('career_detail_img');
            $filename = $file->getClientOriginalName();
            $file->move('../../usea-edu.kh/media/career/details/', $filename);
            $career->career_detail_img = $filename;
        }else{
            return $request;
            $career->career_detail_img = '';
        }

        // $career->career_detail_img = $request -> input('career_detail_img');
        $career->career_detail_en = $request -> input('career_detail_en');
        $career->career_detail_kh = $request -> input('career_detail_kh');
        $career->location_en = $request -> input('location_en');
        $career->location_kh = $request -> input('location_kh');
        $career->expire_date = $request -> input('expire_date');
        $career->keyword = $request -> input('keyword');
        $career->save();
        return redirect()->route('career.index')->with('status', 'Career Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $careers = Career::findOrFail($id);
        return view('career.edit', ['careers' => $careers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $career = Career::findOrFail($id);
        $career->user_id = auth()->id();
        // $career->career_img = $request -> input('career_img');

        if($request->hasfile('career_img')){
            $file = $request->file('career_img');
            // $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            // $filename = time() . '.' . $extension;
            $file->move('../../usea-edu.kh/media/career/logos/', $filename);
            $career->career_img = $filename;
        }else{
            return $request;
            $career->career_img = '';
        }

        $career->career_position_en = $request -> input('career_position_en');
        $career->career_position_kh = $request -> input('career_position_kh');
        $career->career_organization_en = $request -> input('career_organization_en');
        $career->career_organization_kh = $request -> input('career_organization_kh');

        // check if user submit career detail image
        if($request->hasfile('career_detail_img')){
            $file = $request -> file('career_detail_img');
            $filename = $file->getClientOriginalName();
            $file->move('../../usea-edu.kh/media/career/details/', $filename);
            $career->career_detail_img = $filename;
        }else{
            return $request;
            $career->career_detail_img = '';
        }

        // $career->career_detail_img = $request -> input('career_detail_img');
        $career->career_detail_en = $request -> input('career_detail_en');
        $career->career_detail_kh = $request -> input('career_detail_kh');
        $career->location_en = $request -> input('location_en');
        $career->location_kh = $request -> input('location_kh');
        $career->expire_date = $request -> input('expire_date');
        $career->keyword = $request -> input('keyword');
        $career->save();
        return redirect()->route('career.index')->with('status', 'Career Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $careers = Career::findOrFail($id);
        $careers->delete();
        return redirect()->route('career.index')->with('status', 'Career Deleted');
    }
}
