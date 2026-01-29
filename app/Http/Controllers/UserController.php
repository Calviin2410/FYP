<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
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
        $user = User::findOrFail($id);
        
        return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function export()
    {
        $user = User::all();

        return (new FastExcel($user))->download('user.xlsx');
    }
}
