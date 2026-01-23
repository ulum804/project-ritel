<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laporan - Leya Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/laporan.css') }}">
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

        .btn-standard {
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-standard:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
                <span>Laporan</span>
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

                <a href="{{ route('admin.laporan') }}" class="sidebar-item active">
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
            <div class="page-title">Laporan Semua Warehouse</div>

            <!-- WAREHOUSE TABS -->
            <div class="warehouse-tabs">
                <button class="warehouse-tab active" onclick="switchWarehouse('wh1')">
                    <i class="bi bi-building"></i> Warehouse 1
                </button>
                <button class="warehouse-tab" onclick="switchWarehouse('wh2')">
                    <i class="bi bi-building"></i> Warehouse 2
                </button>
                <button class="warehouse-tab" onclick="switchWarehouse('wh3')">
                    <i class="bi bi-building"></i> Warehouse 3
                </button>
                <button class="warehouse-tab" onclick="switchWarehouse('wh4')">
                    <i class="bi bi-building"></i> Warehouse 4
                </button>
            </div>

            <!-- WAREHOUSE 1 CONTENT -->
            <div id="wh1" class="tab-content-pane active">
                <!-- PURCHASE REPORT -->
                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Pembelian Barang</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Alasan</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#KY9W</td>
                                        <td>Minyak Sunmit 1ltr</td>
                                        <td>4 pack</td>
                                        <td>Waiting for confirmation</td>
                                        <td>Rp. 867,000.00</td>
                                    </tr>
                                    <tr>
                                        <td>#EBG2</td>
                                        <td>Cimory yogurt strawberry</td>
                                        <td>50 pcs</td>
                                        <td>Delivery confirmation</td>
                                        <td>Rp. 255,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 13 Januari 2025</div>
                    </div>
                </div>

                <!-- SALES REPORT -->
                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Penjualan Barang</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Activity</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#KY9W</td>
                                        <td>Minyak Sunmit 1ltr</td>
                                        <td>10 pcs</td>
                                        <td>Waiting for confirmation</td>
                                        <td>Rp. 78,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 13 Januari 2025</div>
                    </div>
                </div>

                <!-- MOVE REPORT -->
                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Barang Pindahan (Masuk)</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Activity</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#KY9W</td>
                                        <td>Minyak Sunmit 1ltr</td>
                                        <td>4 pack</td>
                                        <td>Waiting for confirmation</td>
                                        <td>Rp. 867,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 13 Januari 2025<br>ASAL: Warehouse 2<br>TUJUAN: Warehouse 1</div>
                    </div>
                </div>

                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Barang Dipindah (Keluar)</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Activity</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#KY9W</td>
                                        <td>Minyak Sunmit 1ltr</td>
                                        <td>4 pack</td>
                                        <td>Waiting for confirmation</td>
                                        <td>Rp. 867,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 10 Januari 2025<br>ASAL: Warehouse 1<br>TUJUAN: Warehouse 3</div>
                    </div>
                </div>
            </div>

            <!-- WAREHOUSE 2 CONTENT -->
            <div id="wh2" class="tab-content-pane">
                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Pembelian Barang</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Alasan</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#WH2P001</td>
                                        <td>Mie Instan Sedaap</td>
                                        <td>100 pack</td>
                                        <td>Stock replenishment</td>
                                        <td>Rp. 550,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 13 Januari 2025</div>
                    </div>
                </div>

                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Penjualan Barang</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Activity</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#WH2S001</td>
                                        <td>Mie Instan Sedaap</td>
                                        <td>30 pack</td>
                                        <td>Ready to ship</td>
                                        <td>Rp. 165,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 13 Januari 2025</div>
                    </div>
                </div>
            </div>

            <!-- WAREHOUSE 3 CONTENT -->
            <div id="wh3" class="tab-content-pane">
                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Pembelian Barang</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Alasan</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#WH3P001</td>
                                        <td>Susu UHT Indomilk</td>
                                        <td>200 pack</td>
                                        <td>Fresh stock</td>
                                        <td>Rp. 900,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 12 Januari 2025</div>
                    </div>
                </div>
            </div>

            <!-- WAREHOUSE 4 CONTENT -->
            <div id="wh4" class="tab-content-pane">
                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Penjualan Barang</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Activity</th>
                                        <th>Total Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#WH4S001</td>
                                        <td>Teh Kotak Emas</td>
                                        <td>80 pack</td>
                                        <td>Processing</td>
                                        <td>Rp. 240,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="date-info">DATE: 11 Januari 2025</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin/laporan.js') }}"></script>
    <!-- <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function switchWarehouse(warehouseId) {
            // Hide all warehouse tabs
            const panes = document.querySelectorAll('.tab-content-pane');
            panes.forEach(pane => {
                pane.classList.remove('active');
            });

            // Remove active from all buttons
            const buttons = document.querySelectorAll('.warehouse-tab');
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected warehouse
            document.getElementById(warehouseId).classList.add('active');

            // Add active to clicked button
            const clickedButton = document.querySelector(`.warehouse-tab[onclick="switchWarehouse('${warehouseId}')"]`);
            if (clickedButton) {
                clickedButton.classList.add('active');
            }
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth < 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script> -->
</body>
</html>