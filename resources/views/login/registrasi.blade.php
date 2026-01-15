<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/regis.css') }}">
</head>
<body>

<div class="container-fluid vh-100">
    <div class="row h-100">

        <!-- LEFT PANEL -->
              <!-- PANEL KIRI -->
        <div class="col-md-6 d-none d-md-flex left-panel align-items-center justify-content-center">
            <div class="text-center text-white">
                <h2 class="fw-bold">Hello, Welcome!</h2>
                <p class="mt-2"> have an account</p>
                <a href="" class="btn btn-outline-light rounded-pill px-4">
                    Login
                </a>
            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="login-box w-75">

                <h3 class="text-center fw-bold mb-4">register</h3>

                <form method="" action="">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="username"
                               class="form-control form-control-lg"
                               placeholder="Username">
                    </div>

                    <div class="mb-2">
                        <input type="password" name="password"
                               class="form-control form-control-lg"
                               placeholder="Password">
                    </div>

                    <div class="mb-2">
                        <input type="password" name="password"
                               class="form-control form-control-lg"
                               placeholder="confirm Password">
                    </div>

                    {{-- <div class="text-end mb-3">
                        <a href="#" class="text-decoration-none small text-muted">
                            Forgot Password!
                        </a>
                    </div> --}}

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                            sign in
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>
