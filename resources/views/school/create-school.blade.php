@extends('layouts.app')
@section('title','Create School')
@section('content')
<link rel="stylesheet" href="{{ asset('css/school/create-school.css') }}">
<div class="container">
    <div class="row justify-content-between">
        <h2 class="text-center">Create School</h2>
        <form action="{{ route('school.store') }}" method="POST">
            @csrf
            <!-- School Legal Name -->
            <div class="col-md-6 mb-2">
                <label for="schoolLegalName" class="form-label">School Legal Name</label>
                <input class="form-control" type="text" name="legal_name" id="schoolLegalName" value="{{ old('legal_name') }}">
            </div>
            @error('legal_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- School Commercial Name -->
            <div class="col-md-6 mb-2">
                <label for="schoolCommercialName" class="form-label">School Commercial Name</label>
                <input class="form-control" type="text" name="commercial_name" id="schoolCommercialName" value="{{ old('commercial_name') }}">
            </div>
            @error('commercial_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Education level -->
            <div class="col-md-6 mb-2">
                <label for="educationLevel" class="form-label">School Education Level</label>
                <select class="form-select" name="education_level" aria-label="Default select example">
                    <option disabled selected>Select Education Level</option>
                    <option value="PRIMARY_SCHOOL">Primary School</option>
                    <option value="JUNIOR_HIGH_SCHOOL">Junior High School</option>
                    <option value="SENIOR_HIGH_SCHOOL">Senior High School</option>
                </select>
            </div>
            @error('education_level')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Mobile Phone -->
            <div class="col-md-6 mb-2">
                <label for="mobile_phone" class="form-label">School Mobile Phone</label>
                <input class="form-control" type="tel" name="mobile_phone" id="mobile_phone" value="{{ old('mobile_phone') }}">
            </div>
            @error('mobile_phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Email -->
            <div class="col-md-6 mb-2">
                <label for="email" class="form-label">School Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Address -->
            <div class="col-md-6 mb-2">
                <label for="address" class="form-label">School Address</label>
                <textarea class="form-control" name="address" id="address" rows="3" value="{{ old('address') }}"></textarea>
            </div>
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Create School</button>
        </form>
    </div>
</div>
@endsection
