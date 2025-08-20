<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schools = School::where('status', 'ACTIVE')
            ->orderBy('legal_name', 'asc')
            ->paginate(10);
        return view('school.show-school', compact('schools'));
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
        //
        $validated = $request->validate([
            'legal_name' => 'required|string|unique:schools,legal_name|max:255',
            'commercial_name' => 'required|string|max:255',
            'education_level' => 'required|in:PRIMARY_SCHOOL,JUNIOR_HIGH_SCHOOL,SENIOR_HIGH_SCHOOL',
            'mobile_phone' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:schools,email',
            'address' => 'required|string'
        ]);

        School::create([
            'legal_name' =>  trim($validated['legal_name']),
            'commercial_name' => trim($validated['commercial_name']),
            'education_level' => $validated['education_level'],
            'mobile_phone' => trim($validated['mobile_phone']),
            'email' => strtolower(trim($validated['email'])),
            'address' => trim($validated['address']),
        ]);

        return redirect()->route('index.admin')->with('success', 'Create School Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
