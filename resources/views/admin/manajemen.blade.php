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
        <div class="sidebar-custom" id="sidebar" style="display: flex; flex-direction: column; height: 100%;">
            <div style="flex: 1; overflow-y: auto;">
                 <a href="{{ route('admin.manajemen') }}" class="sidebar-item">
                    <i class="bi bi-people"></i> Manajemen User
                </a>
                <a href="{{ route('admin.laporan') }}" class="sidebar-item active">
                    <i class="bi bi-file-earmark-text"></i> Laporan
                </a>
                <a href="{{ route('admin.stok') }}" class="sidebar-item">
                    <i class="bi bi-boxes"></i> Stok gudang
                </a>

                <!-- LOGOUT BUTTON (MOVED UP) -->
                <div style="padding:20px 15px 25px; border-top:1px solid #eee; margin-top: 20px;">
                    <button class="sidebar-item w-100 text-start logout-btn"
                            onclick="logoutDummy()">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </div>
            </div>
        </div>

       <div class="content">
    <div class="page-title">Manajemen User</div>

    <!-- CARD SUMMARY -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 p-4 text-center">
                <h5>Admin</h5>
                <div style="font-size:40px">👥</div>
                <h2 class="fw-bold">19</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 p-4 text-center">
                <h5>Staff Gudang</h5>
                <div style="font-size:40px">👥</div>
                <h2 class="fw-bold">40</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 p-4 text-center">
                <h5>Kepala Gudang</h5>
                <div style="font-size:40px">👥</div>
                <h2 class="fw-bold">21</h2>
            </div>
        </div>
    </div>

    <!-- TABLE USER -->
    <div class="card shadow-sm rounded-4 p-4">
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Role</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Adi</td>
                        <td>Admin</td>
                        <td class="text-end">
    <div class="d-inline-flex gap-2">

        <!-- BUTTON PINDAH -->
        <div class="dropdown">
            <button class="btn-standard bg-success text-white dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">
                Pindah
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 1')">
                        Warehouse 1
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 2')">
                        Warehouse 2
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 3')">
                        Warehouse 3
                    </a>
                </li>
            </ul>
        </div>

        <!-- BUTTON HAPUS -->
        <button class="btn-standard bg-info text-white">Hapus</button>

    </div>
</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Alfinnn</td>
                        <td>Staff Gudang</td>
                        <td class="text-end">
    <div class="d-inline-flex gap-2">

        <!-- BUTTON PINDAH -->
        <div class="dropdown">
            <button class="btn-standard bg-success text-white dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">
                Pindah
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 1')">
                        Warehouse 1
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 2')">
                        Warehouse 2
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 3')">
                        Warehouse 3
                    </a>
                </li>
            </ul>
        </div>

        <!-- BUTTON HAPUS -->
        <button class="btn-standard bg-info text-white">Hapus</button>

    </div>
</td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ida</td>
                        <td>Staff Gudang</td>
                        <td class="text-end">
    <div class="d-inline-flex gap-2">

        <!-- BUTTON PINDAH -->
        <div class="dropdown">
            <button class="btn-standard bg-success text-white dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">
                Pindah
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 1')">
                        Warehouse 1
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 2')">
                        Warehouse 2
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 3')">
                        Warehouse 3
                    </a>
                </li>
            </ul>
        </div>

        <!-- BUTTON HAPUS -->
        <button class="btn-standard bg-info text-white">Hapus</button>

    </div>
</td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Ian</td>
                        <td>Kepala Gudang</td>
                        <td class="text-end">
    <div class="d-inline-flex gap-2">

        <!-- BUTTON PINDAH -->
        <div class="dropdown">
            <button class="btn-standard bg-success text-white dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">
                Pindah
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 1')">
                        Warehouse 1
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 2')">
                        Warehouse 2
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                       onclick="pindahWarehouse(1, 'Warehouse 3')">
                        Warehouse 3
                    </a>
                </li>
            </ul>
        </div>

        <!-- BUTTON HAPUS -->
        <button class="btn-standard bg-info text-white">Hapus</button>

    </div>
</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>