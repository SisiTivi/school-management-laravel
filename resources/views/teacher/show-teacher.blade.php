@extends('layouts.app')
@section('title', $teacher->first_name)
@section('content')
<link rel="stylesheet" href="{{ asset('css/school/show-schools.css') }}">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- Card teacher Detail -->
            <div class="card custom-card shadow-lg border-0 mb-5">
                <div class="card-header text-white text-center">
                    <h2 class="mb-0">Teacher Detail</h2>
                </div>

                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>First Name</strong>
                            <span>{{ $teacher->first_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Last Name</strong>
                            <span>{{ $teacher->last_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Gender</strong>
                            <span>{{ ucwords($teacher->gender) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Subject</strong>
                            <span>{{ $teacher->subject }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Phone Number</strong>
                            <span>{{ $teacher->user->phone_number }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Email</strong>
                            <span>{{ $teacher->user->email }}</span>
                        </li>
                    </ul>
                </div>

                <div class="card-footer text-center bg-light">
                    <a href="{{ isset($school)? route('school.show',$school): route('teacher.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
