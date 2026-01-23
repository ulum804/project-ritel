<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Warehouse 1 - Leya Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/kepala/warehouse1.css'), }}">
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
                <span>Warehouse 1</span>
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
            <a href="{{ route('warehouse1') }}" class="sidebar-item active">
                <i class="bi bi-building"></i> Warehouse 1
            </a>
            <a href="{{ route('warehouse2') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Warehouse 2
            </a>
            <a href="{{ route('warehouse3') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Warehouse 3
            </a>
            <a href="{{ route('warehouse4') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Warehouse 4
            </a>
            <a href="{{'/'}}" class="sidebar-item">
                <i class="bi bi-building"></i> Logout
            </a>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <!-- TAB NAVIGATION -->
            <div class="nav-tabs-custom">
                <a href="javascript:void(0)" class="tab-link active" onclick="showTab('purchase')">
                    Barang Masuk
                </a>
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('sales')">
                    Barang Keluar
                </a>
                {{-- <a href="javascript:void(0)" class="tab-link" onclick="showTab('move')">
                    Move Report
                </a> --}}
            </div>

            <!-- PURCHASE REPORT TAB -->
            <div id="purchase" class="tab-pane active">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-title">Barang Masuk</div>
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
                                        <td>#KY9W</td>
                                        <td>Minyak Sunmit 1ltr</td>
                                        <td>4 pack</td>
                                        <td>Waiting for confirmation</td>
                                        <td>Rp. 867,000.00</td>
                                        <td>
                                            <div class="btn-action-group">
                                                <button class="btn btn-danger btn-small">TOLAK</button>
                                                <button class="btn btn-success btn-small">TERIMA</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#EBG2</td>
                                        <td>Cimory yogurt strawberry</td>
                                        <td>50 pcs</td>
                                        <td>Delivery confirmation</td>
                                        <td>Rp. 255,000.00</td>
                                        <td>
                                            <div class="btn-action-group">
                                                <button class="btn btn-danger btn-small">TOLAK</button>
                                                <button class="btn btn-success btn-small">TERIMA</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TDH1</td>
                                        <td>Gorilla coffee</td>
                                        <td>2 pack</td>
                                        <td>Delivery validate stock</td>
                                        <td>Rp. 425,000.00</td>
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
                            DATE: 13 Januari 2025
                        </div>
                    </div>
                </div>
            </div>  

            <!-- SALES REPORT TAB -->
            <div id="sales" class="tab-pane">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-title">Barang Keluar</div>
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
                                        <td>10 pcs</td>
                                        <td>Waiting for confirmation</td>
                                        <td>Rp. 78,000.00</td>
                                        <td>
                                            <div class="btn-action-group">
                                                <button class="btn btn-danger btn-small">TOLAK</button>
                                                <button class="btn btn-success btn-small">TERIMA</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#EBG2</td>
                                        <td>Cimory yogurt strawberry</td>
                                        <td>25 pcs</td>
                                        <td>Packaging & QC</td>
                                        <td>Rp. 112,500.00</td>
                                        <td>
                                            <div class="btn-action-group">
                                                <button class="btn btn-danger btn-small">TOLAK</button>
                                                <button class="btn btn-success btn-small">TERIMA</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TDH1</td>
                                        <td>Gorilla coffee</td>
                                        <td>5 pack</td>
                                        <td>Delivery orders</td>
                                        <td>Rp. 212,500.00</td>
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
                            DATE: 13 Januari 2025
                        </div>
                    </div>
                </div>
            </div>

            <!-- MOVE REPORT TAB -->
            {{-- <div id="move" class="tab-pane">
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
                                <td>#KY9W</td>
                                <td>Minyak Sunmit 1ltr</td>
                                <td>4 pack</td>
                                <td>Waiting for confirmation</td>
                                <td>Rp. 867,000.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#EBG2</td>
                                <td>Cimory yogurt strawberry</td>
                                <td>50 pcs</td>
                                <td>In transit</td>
                                <td>Rp. 255,000.00</td>
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
                    DATE: 13 Januari 2025<br>
                    ASAL: Warehouse 2<br>
                    TUJUAN: Warehouse 1
                </div>
            </div>
        </div> --}}

        <!-- MOVE REPORT - Outgoing -->
        {{-- <div class="card report-card">
            <div class="card-body">
                <div class="report-title">History Transaksi </div>
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
                                <td>4 pack</td>
                                <td>Waiting for confirmation</td>
                                <td>Rp. 867,000.00</td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                        <button class="btn btn-success btn-small">TERIMA</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#TDH1</td>
                                <td>Gorilla coffee</td>
                                <td>2 pack</td>
                                <td>Validate stock</td>
                                <td>Rp. 425,000.00</td>
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
                    DATE: 10 Januari 2025<br>
                    ASAL: Warehouse 1<br>
                    TUJUAN: Warehouse 3
                </div>
            </div>
            </div> --}}
            {{-- </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/kepala/warehouse1.js') }}"></script>
    <script>
       
    </script>
</body>
</html>
