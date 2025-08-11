<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Create Account')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/create-account.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="row justify-content-between">
            <h2 class="text-center">Create Account</h2>
            <form action="{{ route('admin.store-account') }}" method="POST" class="form">
                @csrf
                <!-- first name -->
                <div class="col-md-6 mb-2">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="firstNameInput" placeholder="Enter First Name" required>
                </div>
                <!-- last name -->
                <div class="col-md-6 mb-2">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="lastNameInput" placeholder="Enter Last Name" required>
                </div>
                <!-- civility -->
                <div class="col-md-6 mb-2">
                    <label for="civility" class="form-label">Civility</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civility" id="civility1" value="MR" checked>
                            <label class="form-check-label" for="civility1">Mr</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civility" id="civility2" value="MRS">
                            <label class="form-check-label" for="civility2">Mrs</label>
                        </div>
                    </div>
                </div>
                <!-- email -->
                <div class="col-md-6 mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="emailInput" placeholder="Enter email" required>
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
                <!-- Login -->
                <div class="col-md-6 mb-2">
                    <span>
                        Already have account ?
                        <a href="{{ route('login.form') }}">click here</a>
                    </span>
                </div>
                <!-- login button -->
                <button type="submit" class="btn btn-primary">
                    Create Account
                </button>
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
</body>

</html>
