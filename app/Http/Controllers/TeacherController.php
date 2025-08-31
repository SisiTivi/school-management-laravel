<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('teacher.create-teacher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $school_id)
    {
        //
        $validated = $request->validate([
            'first_name' => 'string|required|max:2055',
            'last_name' => 'string|nullable|max:2055',
            'gender' => 'required|in:MALE,FEMALE',
            'subject' => 'required|max:2055',
            'phone_number' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'TEACHER'
        ]);

        Teacher::create([
            'user_id' => $user->id,
            'school_id' => $school_id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'subject' => $validated['subject']
        ]);

        return redirect()->route('school.show')->with('success', 'Create Teacher Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
