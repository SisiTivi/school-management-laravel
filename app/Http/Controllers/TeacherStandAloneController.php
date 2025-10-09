<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherStandAloneController extends Controller
{

    public function index()
    {
        $teachers = Teacher::with('school', 'user')
            ->where('status', 'ACTIVE')
            ->orderBy('first_name')
            ->paginate(10);

        return view('teacher.index-teachers', compact('teachers'));
    }
    //
    public function show(Teacher $teacher)
    {
        return view('teacher.show-teacher', compact('teacher'));
    }
}
