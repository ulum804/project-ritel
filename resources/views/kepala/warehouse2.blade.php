<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Warehouse 2 - Leya Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/kepala/warehouse2.css') }}">
    <style>
       
    </style>
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
                <span>Warehouse 2</span>
            </div>
            <span class="navbar-text text-white">
                <i class="bi bi-person-circle"></i>
            </span>
        </div>
    </nav>

    <!-- MAIN CONTAINER -->
    <div class="main-container">
        <!-- SIDEBAR -->
        <div class="sidebar-custom" id="sidebar">
            <a href="{{ route('warehouse1') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Warehouse 1
            </a>
            <a href="{{ route('warehouse2') }}" class="sidebar-item active">
                <i class="bi bi-building"></i> Warehouse 2
            </a>
            <a href="{{ route('warehouse3') }}" class="sidebar-item">
                <i class="bi bi-buildings"></i> Warehouse 3
            </a>
            <a href="{{ route('warehouse4') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Warehouse 4
            </a>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <!-- TAB NAVIGATION -->
            <div class="nav-tabs-custom">
                <a href="javascript:void(0)" class="tab-link active" onclick="showTab('purchase')">
                    Purchase Report
                </a>
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('sales')">
                    Sales Report
                </a>
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('move')">
                    Move Report
                </a>
            </div>

            <!-- PURCHASE REPORT TAB -->
            <div id="purchase" class="tab-pane active">
        <div class="card report-card">
            <div class="card-body">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#FG2A</td>
                                <td>Beras Premium 10kg</td>
                                <td>3 pack</td>
                                <td>Waiting for confirmation</td>
                                <td>Rp. 450,000.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#HJ3B</td>
                                <td>Telur Ayam 1 Lusin</td>
                                <td>20 pack</td>
                                <td>Delivery confirmation</td>
                                <td>Rp. 320,000.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="date-info">
                    DATE: 14 Januari 2025
                </div>
            </div>
        </div>
            </div>

            <!-- SALES REPORT TAB -->
            <div id="sales" class="tab-pane">
        <div class="card report-card">
            <div class="card-body">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#KY9W</td>
                                <td>Minyak Sunmit 1ltr</td>
                                <td>8 pcs</td>
                                <td>Waiting for confirmation</td>
                                <td>Rp. 144,000.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#LM5C</td>
                                <td>Susu Indomilk</td>
                                <td>15 pcs</td>
                                <td>Packaging & QC</td>
                                <td>Rp. 180,000.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="date-info">
                    DATE: 14 Januari 2025
                </div>
            </div>
        </div>
            </div>

            <!-- MOVE REPORT TAB -->
            <div id="move" class="tab-pane">
        <div class="card report-card">
            <div class="card-body">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#MV1D</td>
                                <td>Gorilla coffee</td>
                                <td>3 pack</td>
                                <td>In transit</td>
                                <td>Rp. 637,500.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="date-info">
                    DATE: 12 Januari 2025<br>
                    ASAL: Warehouse 3<br>
                    TUJUAN: Warehouse 2
                </div>
            </div>
        </div>

        <!-- MOVE REPORT - Outgoing -->
        <div class="card report-card">
            <div class="card-body">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#MV2E</td>
                                <td>Cimory yogurt strawberry</td>
                                <td>30 pcs</td>
                                <td>Ready for delivery</td>
                                <td>Rp. 153,000.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="date-info">
                    DATE: 11 Januari 2025<br>
                    ASAL: Warehouse 2<br>
                    TUJUAN: Warehouse 4
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/kepala/warehouse2.js') }}"></script>
    <script>
    
    </script>
</body>
</html>
