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
</head>
<body>
    <!-- TOP BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            {{-- <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button> --}}
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
</body>
</html>