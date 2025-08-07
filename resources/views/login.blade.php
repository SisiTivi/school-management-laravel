<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="card">
        <div id="card-content">
            <div class="card-tittle">
                <h2 class="text-center">LOGIN</h2>
            </div>
            <form action="" method="POST" class="form">
                @csrf
                <!-- email -->
                <div class="col-md-12 mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="Enter email">
                </div>
                <!-- password -->
                <div class="col-md-12 mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" placeholder="Enter password">
                </div>
                <!-- create account -->
                <div class="col-md-12 mb-2">
                    <span>
                        Dont have account ?
                        <a href="">click here</a>
                    </span>
                </div>
                <!-- login button -->
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>