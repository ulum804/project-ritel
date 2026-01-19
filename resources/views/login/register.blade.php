<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/login/regis.css') }}">
</head>
<body>
    <div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Registration Panel -->
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
        <div class="w-75">
            <h3 class="text-center fw-bold mb-4">Registration</h3>
            <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" name="nama_user" class="form-control" placeholder="Username">
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="number" name="telepon" class="form-control" placeholder="Telepon">
            </div>
           <div class="mb-3 input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-badge-fill"></i>
                </span>
                 <select name="jabatan" class="form-select" required>
                    <option value="" disabled selected>Pilih Jabatan</option>
                    <option value="staff_gudang">Staff Gudang</option>
                    <option value="kepala_gudang">Kepala Gudang</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
           <div class="mb-3 input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-badge-fill"></i>
                </span>
                <select name="id_gudang" class="form-select" required>
                    <option value="" disabled selected>Pilih Gudang</option>
                    @foreach ($gudangs as $gudang)
                        <option value="{{ $gudang->id_gudang }}">
                            {{ $gudang->nama_gudang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">SIGN IN</button>
            </form>
        </div>
        </div>

        <!-- Welcome Panel -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-white bg-primary text-center">
        <h2 class="fw-bold">Hello, Welcome!</h2>
        <p class="mt-2">Have an account</p>
        <a href="{{'/'}}" class="btn btn-outline-light rounded-pill px-4">Login</a>
        </div>
    </div>
    </div>
</body>
</html>