@extends('layouts.app')
@section('title','Show Schools')
@section('content')
<link rel="stylesheet" href="{{ asset('css/school/show-schools.css') }}">
<div class="container">
    <h2 class="my-5">School List</h2>
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
                        <a href="" class="btn btn-primary">Detail</a>
                        <a href="" class="btn btn-primary">Edit</a>
                        <form action="" method="POST" id="btn_delete">
                            @csrf
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
