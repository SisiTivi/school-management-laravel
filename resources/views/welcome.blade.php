@extends('layouts.app')
@section('title','Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
<div class="container mt-3">
    <h2>Welcome</h2>
    <!-- school -->
    <div class="section" id="schoolSection">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-4" id="schoolSectionLeft">
                <h3>School List</h3>
            </div>
            <div class="col-sm-12 col-md-4" id="schoolSectionRight">
                <button class="btn btn-primary">
                    Add School
                    <span>
                        <i class="bi bi-plus"></i>
                    </span>
                </button>
            </div>
        </div>
        <div class="col-12 mt-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Legal Name</th>
                        <th>Commercial Name</th>
                        <th>Address</th>
                        <th>Total Staff</th>
                        <th>Total Student</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
