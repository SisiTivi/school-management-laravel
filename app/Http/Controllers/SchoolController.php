<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //find school with active status
        $schools = School::where('status', 'ACTIVE')
            ->orderBy('legal_name', 'asc')
            ->paginate(10);
        return view('school.index-school', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('school.create-school');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $validated = $request->validate([
            'legal_name' => 'required|string|unique:schools,legal_name|max:255',
            'commercial_name' => 'required|string|max:255',
            'education_level' => 'required|in:PRIMARY_SCHOOL,JUNIOR_HIGH_SCHOOL,SENIOR_HIGH_SCHOOL',
            'mobile_phone' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:schools,email',
            'address' => 'required|string'
        ]);

        //create school
        School::create([
            'legal_name' =>  $validated['legal_name'],
            'commercial_name' => $validated['commercial_name'],
            'education_level' => $validated['education_level'],
            'mobile_phone' => $validated['mobile_phone'],
            'email' => strtolower($validated['email']),
            'address' => $validated['address'],
        ]);

        // redirect after complete
        return redirect()->route('school.index')->with('success', 'Create School Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //find teacher belongs to the school
        $teachers = $school->teachers()
            ->with('user')
            ->where('status', 'ACTIVE')
            ->orderBy('first_name')
            ->get();

        return view('school.show-school', compact('school', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
        return view('school.edit-school', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //validate input
        $validated = $request->validate([
            'legal_name' => 'required|string|unique:schools,legal_name,' . $school->id . '|max:255',
            'commercial_name' => 'required|string|max:255',
            'education_level' => 'required|in:PRIMARY_SCHOOL,JUNIOR_HIGH_SCHOOL,SENIOR_HIGH_SCHOOL',
            'mobile_phone' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:schools,email,' . $school->id,
            'address' => 'required|string'
        ]);

        // update the old data
        $school->update([
            'legal_name' =>  trim($validated['legal_name']),
            'commercial_name' => trim($validated['commercial_name']),
            'education_level' => $validated['education_level'],
            'mobile_phone' => trim($validated['mobile_phone']),
            'email' => strtolower(trim($validated['email'])),
            'address' => trim($validated['address']),
        ]);

        return redirect()->route('school.show', $school->id)->with('success', 'Update School Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //change status to deleted (soft delete)
        $school->update([
            'status' => 'DELETED'
        ]);

        return redirect()->route('school.index')->with('success', 'Delete school Success');
    }
}
