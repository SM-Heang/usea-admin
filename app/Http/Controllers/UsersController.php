<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::paginate(15);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Users;
        $user-> name              = $request -> input('name'); 
        $user-> email             = $request -> input('email'); 
        $user-> email_verified_at = $request -> input('email-verified'); 
        $user-> password          = Hash::make($request -> input('password')); 
        $user-> remember_token    = $request -> input('remember-token'); 
        $user-> created_at        = $request -> input('created-at'); 
        $user-> updated_at        = $request -> input('updated-at'); 
        $user->save();
        return redirect()->route('users.index')->with('status', 'User Added Successfully');
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
        $users = Users::findOrFail($id);
        return view('users.edit', ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Users::findOrFail($id);
        $user->name              = $request -> input('name'); 
        $user->email             = $request -> input('email');
        $user->email_verified_at = $request -> input('email-verified'); 
        $user->password          = Hash::make($request -> input('password')); 
        $user->remember_token    = $request -> input('remember-token'); 
        $user->created_at        = $request -> input('created-at'); 
        $user->updated_at        = $request -> input('updated-at'); 
        $user->save();
        return redirect()->route('users.index')->with('status', 'User Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = Users::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index')->with('status', 'User Deleted');
    }
}
