<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\School;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($school_id = null)
    {
        // create different access to teacher index
        // if access from school detail
        if ($school_id) {
            $teachers = Teacher::with('school', 'user')
                ->where('school_id', $school_id)
                ->where('status', 'ACTIVE')
                ->orderBy('first_name')
                ->paginate(10);
        }
        // if access from index
        else {
            $teachers = Teacher::with('school', 'user')
                ->where('status', 'ACTIVE')
                ->orderBy('first_name')
                ->paginate(10);
        }

        return view('teacher.index-teachers', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($school_id)
    {
        // find school id where the teacher want to be added
        $school = School::findOrFail($school_id);
        return view('teacher.create-teacher', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $school_id)
    {
        // validate input
        $validated = $request->validate([
            'first_name' => 'string|required|max:2055',
            'last_name' => 'string|nullable|max:2055',
            'gender' => 'required|in:MALE,FEMALE',
            'subject' => 'required|max:2055',
            'phone_number' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        // create user based on input
        $user = User::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone_number' => $validated['phone_number'],
            'role' => 'TEACHER'
        ]);

        // create teacher based on input
        Teacher::create([
            'user_id' => $user->id,
            'school_id' => $school_id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'subject' => $validated['subject']
        ]);

        return redirect()->route('school.show', $school_id)->with('success', 'Create Teacher Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school, Teacher $teacher)
    {
        //find user based on id teaacher
        return view('teacher.show-teacher', compact('teacher', 'school'));
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
        $teacher->update([
            'status' => 'DELETED'
        ]);

        return redirect()->route('school.teacher.index');
    }
}
