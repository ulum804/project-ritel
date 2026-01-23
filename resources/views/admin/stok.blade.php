<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stok Gudang - Leya Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/stok.css') }}">
    <!-- <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #0066cc 0%, #0052a3 100%);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            height: 65px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 22px;
            letter-spacing: 1px;
        }

        .warehouse-title {
            font-size: 18px;
            font-weight: 600;
            flex: 1;
            text-align: center;
        }

        .main-container {
            display: flex;
            min-height: 100vh;
            margin-top: 65px;
        }

        .sidebar-custom {
            width: 200px;
            background-color: white;
            border-right: 1px solid #e0e0e0;
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 65px;
            height: calc(100vh - 65px);
            overflow-y: auto;
            z-index: 1020;
        }

        .sidebar-item {
            padding: 12px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            font-size: 14px;
            text-decoration: none;
            border-left: 4px solid transparent;
        }

        .sidebar-item:hover {
            background-color: #f0f0f0;
            color: #0066cc;
        }

        .sidebar-item.active {
            background-color: #0066cc;
            color: white;
            border-left-color: #0052a3;
        }

        .logout-btn {
            background-color: steelblue;
            color: white;
            border: none;
        }

        .logout-btn:hover {
            background-color: #c82333;
            color: white;
        }


        .content {
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
            overflow-y: auto;
            margin-left: 200px;
            height: calc(100vh - 65px);
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }

        .warehouse-tabs {
            display: flex;
            gap: 10px;
            border-bottom: 2px solid #e0e0e0;
            margin-bottom: 20px;
            padding: 0;
            overflow-x: auto;
        }

        .warehouse-tab {
            padding: 12px 20px;
            background-color: white;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .warehouse-tab:hover {
            color: #0066cc;
        }

        .warehouse-tab.active {
            color: #0066cc;
            border-bottom-color: #0066cc;
        }

        .tab-content-pane {
            display: none;
        }

        .tab-content-pane.active {
            display: block;
        }

        .report-card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .report-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .table-custom {
            margin-bottom: 0;
            font-size: 13px;
        }

        .table-custom thead {
            background-color: #f0f0f0;
        }

        .table-custom th {
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding: 12px;
        }

        .table-custom td {
            padding: 12px;
            color: #666;
        }

        .table-custom tbody tr:hover {
            background-color: #fafafa;
        }

        .date-info {
            font-size: 12px;
            color: #999;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e0e0e0;
        }

        .nav-pills .nav-link {
            color: #0066cc;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .nav-pills .nav-link.active {
            background-color: #0066cc;
        }

        @media (max-width: 768px) {
            .sidebar-custom {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 1025;
                box-shadow: 2px 0 8px rgba(0,0,0,0.1);
            }

            .sidebar-custom.active {
                transform: translateX(0);
            }

            .content {
                padding: 15px;
                margin-left: 0;
            }

            .menu-toggle {
                display: block !important;
            }

            .warehouse-tabs {
                flex-wrap: wrap;
            }
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .warehouse-switch {
            padding: 20px 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .warehouse-switch a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: linear-gradient(90deg, #0066cc 0%, #0052a3 100%);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
            text-align: center;
            justify-content: center;
        }

        .warehouse-switch a:hover {
            box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3);
            transform: translateY(-2px);
            color: white;
        }
    </style> -->
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
                <span>Stok Gudang</span>
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
                <a href="{{ route('admin.manajemen') }}" class="sidebar-item">
                    <i class="bi bi-people"></i> Manajemen User
                </a>

                <a href="{{ route('admin.laporan') }}" class="sidebar-item ">
                    <i class="bi bi-file-earmark-text"></i> Laporan
                </a>

                <a href="{{ route('admin.stok') }}" class="sidebar-item active">
                    <i class="bi bi-boxes"></i> Stok Gudang
                </a>

                <!-- LOGOUT -->
              <a href="{{'/'}}" class="sidebar-item">
                <i class="bi bi-building"></i> Logout
            </a>
            </div>
        </div>




<!-- content -->

       <div class="content">
    <div class="page-title">Stok Gudang</div>

    <div class="card shadow-sm rounded-4 p-4" style="max-width:700px;">
        <div class="table-responsive">
            <table class="table table-borderless text-center align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th>ID Order</th>
                        <th>Product</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#XY8W</td>
                        <td>Minyak bimoli 1ltr</td>
                        <td>4 pack</td>
                    </tr>
                    <tr>
                        <td>#ERG2</td>
                        <td>cimory yogurt strawberry</td>
                        <td>50 pcs</td>
                    </tr>
                    <tr>
                        <td>#7DHJ</td>
                        <td>golds coffee</td>
                        <td>2 pack</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>