@extends('layouts.app')
@section('title', $school->legal_name)
@section('content')
<link rel="stylesheet" href="{{ asset('css/school/show-schools.css') }}">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- Card School Detail -->
            <div class="card custom-card shadow-lg border-0 mb-5">
                <div class="card-header text-white text-center">
                    <h2 class="mb-0">School Detail</h2>
                </div>

                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Legal Name</strong>
                            <span>{{ $school->legal_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Commercial Name</strong>
                            <span>{{ $school->commercial_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Education Level</strong>
                            <span>{{ ucwords(strtolower(str_replace('_',' ',$school->education_level ))) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Address</strong>
                            <span>{{ $school->address }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Email</strong>
                            <span>{{ $school->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Phone Number</strong>
                            <span>{{ $school->mobile_phone }}</span>
                        </li>
                    </ul>
                </div>

                <div class="card-footer text-center bg-light">
                    <a href="{{ route('school.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>

            <!-- Students Table -->
            <div class="card custom-card shadow-sm border-0 mb-4">
                <div class="card-header text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Students</h4>
                    <a href="" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i>Add Student</a>
                </div>
                <div class="card-body">
                    <table class="table custom-table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- contoh data dummy --}}
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>11</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Teachers Table -->
            <div class="card custom-card shadow-sm border-0">
                <div class="card-header text-white  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Teachers</h4>
                    <a href="" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i>Add Teachers</a>
                </div>
                <div class="card-body">
                    <table class="table custom-table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- contoh data dummy --}}
                            <tr>
                                <td>1</td>
                                <td>Mr. Alex</td>
                                <td>alex@example.com</td>
                                <td>Mathematics</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mrs. Clara</td>
                                <td>clara@example.com</td>
                                <td>English</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
