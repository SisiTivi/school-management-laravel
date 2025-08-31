@extends('layouts.app')
@section('title','Schools')
@section('content')
<link rel="stylesheet" href="{{ asset('css/school/index-schools.css') }}">
<div class="container">
    <div class="row justify-content-between mt-3" id="title_and_addSchoolButton">
        <div class="col-sm-12 col-md-4" id="schoolSectionLeft">
            <h3>School List</h3>
        </div>
        <div class="col-sm-12 col-md-4" id="schoolSectionRight">
            <a href="{{ route('school.create') }}">
                <button class="btn btn-primary">
                    Add School
                    <span>
                        <i class="bi bi-plus"></i>
                    </span>
                </button>
            </a>
        </div>
    </div>
    <section class="col-md-12 mt-3">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="2%">No</th>
                    <th>School Legal Name</th>
                    <th>School Commercial Name</th>
                    <th>Education Level</th>
                    <th>Mobile Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schools as $index => $school)
                <tr>
                    <td>{{ $schools->firstItem() + $index }}</td>
                    <td>{{ $school->legal_name }}</td>
                    <td>{{ $school->commercial_name }}</td>
                    <td>{{ ucwords(strtolower(str_replace('_',' ',$school->education_level))) }}</td>
                    <td>{{ $school->mobile_phone }}</td>
                    <td>{{ $school->email }}</td>
                    <td>{{ $school->address }}</td>
                    <td>
                        <a href="{{ route('school.show',$school) }}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('school.edit',$school) }}" class="btn btn-primary">Edit</a>
                        <form action="" method="POST" id="btn_delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $schools->links() }}
        </div>
    </section>
</div>
@endsection
