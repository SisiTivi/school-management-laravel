@extends('layouts.app')
@section('title','Create School')
@section('content')
<link rel="stylesheet" href="{{ asset('css/school/create-school.css') }}">
<div class="container">
    <div class="row justify-content-between">
        <h2 class="text-center">Create Teacher</h2>
        <form action="" method="POST">
            @csrf
            <!-- Teacher first name -->
            <div class="col-md-6 mb-2">
                <label for="teacherFirstName" class="form-label">First Name</label>
                <input class="form-control" type="text" name="first_name" id="teacherFirstName" value="{{ old('first_name') }}">
            </div>
            @error('first_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Teacher Last Name -->
            <div class="col-md-6 mb-2">
                <label for="teacherLastName" class="form-label">Teacher Last Name</label>
                <input class="form-control" type="text" name="last_name" id="teacherLastName" value="{{ old('last_name') }}">
            </div>
            @error('last_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Gender -->
            <div class="col-md-6 mb-2">
                <label for="gender" class="form-label">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender01" value="MALE">
                    <label class="form-check-label" for="gender01">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender02" value="FEMALE">
                    <label class="form-check-label" for="gender02">Female</label>
                </div>
            </div>
            @error('gender')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Teacher Subject -->
            <div class="col-md-6 mb-2">
                <label for="teacherSubject" class="form-label">Teacher Subject</label>
                <input class="form-control" type="text" name="subject" id="teacherSubject" value="{{ old('subject') }}">
            </div>
            @error('subject')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Phone number -->
            <div class="col-md-6 mb-2">
                <label for="phone_number" class="form-label">Teacher Phone number</label>
                <input class="form-control" type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
            </div>
            @error('phone_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <!-- Email -->
            <div class="col-md-6 mb-2">
                <label for="email" class="form-label">Teacher Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <!-- password -->
            <div class="col-md-6 mb-2">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Enter password" required>
                    <span class="input-group-text" id="togglePassword">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
            </div>
            <!-- confirm password -->
            <div class="col-md-6 mb-2">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPasswordInput" placeholder="Enter confirm password" required>
                    <span class="input-group-text" id="togglePasswordConfirmation">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
            </div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Create School</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('passwordInput');
        const passwordConfirmationInput = document.getElementById('confirmPasswordInput');

        const eyeIcon = document.querySelector('#togglePassword i');
        const eyeIconConfirmation = document.querySelector('#togglePasswordConfirmation i');

        // Toggle untuk password
        eyeIcon.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });

        // Toggle untuk konfirmasi password
        eyeIconConfirmation.addEventListener('click', () => {
            if (passwordConfirmationInput.type === 'password') {
                passwordConfirmationInput.type = 'text';
                eyeIconConfirmation.classList.remove('fa-eye-slash');
                eyeIconConfirmation.classList.add('fa-eye');
            } else {
                passwordConfirmationInput.type = 'password';
                eyeIconConfirmation.classList.remove('fa-eye');
                eyeIconConfirmation.classList.add('fa-eye-slash');
            }
        });
    }

    togglePasswordVisibility();
</script>

<script type="text/javascript" src="js/mdb.umd.min.js"></script>
<!--icon-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection