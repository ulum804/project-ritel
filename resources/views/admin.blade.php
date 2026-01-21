<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap (opsional untuk layout konten) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            height: 65px;
            line-height: 65px;
        }
        .sidebar-custom {
            position: fixed;
            top: 65px;
            left: 0;
            width: 250px;
            height: calc(100% - 65px);
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            overflow-y: auto;
        }
        .sidebar-menu {
            list-style-type: none;
            padding: 0;
        }
        .sidebar-menu li {
            padding: 15px 20px;
        }
        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar-menu li a.active, .sidebar-menu li a:hover {
            background-color: #495057;
        }
        .submenu {
            list-style-type: none;
            padding-left: 20px;
            display: none;
        }
        .submenu li {
            padding: 10px 0;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 65px;
        }
</head>
<body>

<!-- HEADER -->
<nav class="navbar navbar-light bg-white fixed-top shadow-sm px-4" style="height:65px;">
    <span class="fw-bold">Admin Dashboard</span>
</nav>

<!-- SIDEBAR -->
<div class="sidebar-custom" id="sidebar">
    <ul class="sidebar-menu">

        <li>
            <a href="#" class="menu-link active">
                <span><i class="fas fa-home"></i> Dashboard</span>
            </a>
        </li>

        <li>
            <a href="#" class="menu-link" onclick="toggleSubmenu(event, 'user-menu')">
                <span><i class="fas fa-users"></i> Manajemen User</span>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </a>
            <ul class="submenu" id="user-menu">
                <li><a href="#"><i class="fas fa-user"></i> Data User</a></li>
                <li><a href="#"><i class="fas fa-user-shield"></i> Role & Akses</a></li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-link" onclick="toggleSubmenu(event, 'warehouse-menu')">
                <span><i class="fas fa-warehouse"></i> Stok Gudang</span>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </a>
            <ul class="submenu" id="warehouse-menu">
                <li><a href="#"><i class="fas fa-box"></i> Data Barang</a></li>
                <li><a href="#"><i class="fas fa-arrow-down"></i> Barang Masuk</a></li>
                <li><a href="#"><i class="fas fa-arrow-up"></i> Barang Keluar</a></li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-link">
                <span><i class="fas fa-chart-bar"></i> Laporan</span>
            </a>
        </li>

        <li>
            <a href="#" class="menu-link">
                <span><i class="fas fa-sign-out-alt"></i> Sign out</span>
            </a>
        </li>

    </ul>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <h4>Dashboard</h4>
    <p>Selamat datang di halaman admin.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total User</h6>
                    <h3>25</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Barang</h6>
                    <h3>120</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Laporan Bulan Ini</h6>
                    <h3>8</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script >
function toggleSubmenu(event, menuId) {
    event.preventDefault();

    const submenu = document.getElementById(menuId);
    const isOpen = submenu.style.display === "block";

    document.querySelectorAll(".submenu").forEach(menu => {
        menu.style.display = "none";
    });

    submenu.style.display = isOpen ? "none" : "block";
}
</script>
</body>
</html>