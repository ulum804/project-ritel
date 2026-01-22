<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manajemen User - Leya Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/manajemen.css') }}">
   
</head>
<body>
    <!-- TOP BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <span class="navbar-brand mb-0">Leya Mart</span>

            <div class="warehouse-title text-white">
                <span>Manajemen User</span>
            </div>

            <span class="navbar-text text-white">
                <i class="bi bi-person-circle"></i>
            </span>
        </div>
    </nav>

    <!-- MAIN CONTAINER -->
    <div class="main-container">
        <!-- SIDEBAR -->
        <div
            class="sidebar-custom"
            id="sidebar"
            style="display:flex; flex-direction:column; height:100%;"
        >
            <div style="flex:1; overflow-y:auto;">
                <a href="{{ route('admin.manajemen') }}" class="sidebar-item active">
                    <i class="bi bi-people"></i> Manajemen User
                </a>

                <a href="{{ route('admin.laporan') }}" class="sidebar-item">
                    <i class="bi bi-file-earmark-text"></i> Laporan
                </a>

                <a href="{{ route('admin.stok') }}" class="sidebar-item">
                    <i class="bi bi-boxes"></i> Stok Gudang
                </a>

                <!-- LOGOUT -->
              <a href="{{'/'}}" class="sidebar-item">
                <i class="bi bi-building"></i> Logout
            </a>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <div class="page-title">Manajemen User</div>

            <!-- CARD SUMMARY -->
            {{-- <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card shadow-sm rounded-4 p-4 text-center">
                        <h5>Admin</h5>
                        <div style="font-size:40px;">👥</div>
                        <h2 class="fw-bold">19</h2>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm rounded-4 p-4 text-center">
                        <h5>Staff Gudang</h5>
                        <div style="font-size:40px;">👥</div>
                        <h2 class="fw-bold">40</h2>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm rounded-4 p-4 text-center">
                        <h5>Kepala Gudang</h5>
                        <div style="font-size:40px;">👥</div>
                        <h2 class="fw-bold">21</h2>
                    </div>
                </div>
            </div> --}}

            <!-- TABLE USER -->
            <div class="card shadow-sm rounded-4 p-3">
                <div class="table-responsive">
                    <table class="table table-borderless align-middle">
                        <thead class="border-bottom">
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>email</th>
                                <th>Gudang</th>
                                <th>Role</th>
                                <th >Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    {{-- <td>{{ $user->id_user }}</td> --}}
                                    <td>{{ $user->nama_user }}</td>
                                    <td>{{ $user->telepon }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->gudang->nama_gudang ?? '-' }}</td>
                                    <td>{{ $user->role->jabatan }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id_user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-standard bg-danger text-white">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>