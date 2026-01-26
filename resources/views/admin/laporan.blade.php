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
            <div class="page-title">Laporan Aproval semua warehouse</div>

            <!-- WAREHOUSE TABS -->
            <div class="warehouse-tabs">
                <button class="warehouse-tab active" onclick="switchWarehouse('wh1')">
                    <i class="bi bi-building"></i> Barang Masuk
                </button>
                <button class="warehouse-tab" onclick="switchWarehouse('wh2')">
                    <i class="bi bi-building"></i> Barang Keluar
                </button>
                {{-- <button class="warehouse-tab" onclick="switchWarehouse('wh3')">
                    <i class="bi bi-building"></i> Warehouse 3
                </button>
                <button class="warehouse-tab" onclick="switchWarehouse('wh4')">
                    <i class="bi bi-building"></i> Warehouse 4
                </button> --}}
            </div>

            <!-- WAREHOUSE 1 CONTENT -->
            <div id="wh1" class="tab-content-pane active">
                <!-- PURCHASE REPORT -->
                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Laporan aproval Barang Masuk</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>Id barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Alasan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal aprove</th>
                                        <th>Gudang </th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    @forelse ($masuks as $masuk)
                                    <tr>
                                        <td>#{{ $masuk->barang->kode_barang ?? '-' }}</td>
                                        <td>{{ $masuk->barang->nama_barang ?? '-' }}</td>
                                        <td>{{ $masuk->Qty_masuk }}</td>
                                        <td>{{ $masuk->alasan ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($masuk->tanggal_masuk_in)->format('d-m-Y') }}</td>
                                        <td>
                                            {{ $masuk->tanggal_masuk_approve
                                                ? \Carbon\Carbon::parse($masuk->tanggal_masuk_approve)->format('d-m-Y')
                                                : '-' }}
                                        </td>
                                        <td>{{ $masuk->gudang->nama_gudang ?? '-' }}</td>
                                        <td>{{ $masuk->status_masuk }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            Tidak ada data approval
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- WAREHOUSE 2 CONTENT -->
            <div id="wh2" class="tab-content-pane">

                <div class="card report-card">
                    <div class="card-body" style="padding: 20px;">
                        <div class="report-title">Laporan Aproval Barang Keluar</div>
                        <div class="table-responsive">
                           <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>Id barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Alasan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal aprove</th>
                                        <th>Dari Gudang </th>
                                        <th>Ke Gudang </th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @forelse ($keluars as $keluar)
                                    <tr>
                                        <td>#{{ $keluar->barang->kode_barang ?? '-' }}</td>
                                        <td>{{ $keluar->barang->nama_barang ?? '-' }}</td>
                                        <td>{{ $keluar->qty_keluar }}</td>
                                        <td>{{ $keluar->alasan ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($keluar->tanggal_keluar_in)->format('d-m-Y') }}</td>
                                        <td>
                                            {{ $keluar->tanggal_keluar_approve
                                                ? \Carbon\Carbon::parse($keluar->tanggal_keluar_approve)->format('d-m-Y')
                                                : '-' }}
                                        </td>
                                        <td>{{ $keluar->gudang->nama_gudang ?? '-' }}</td>
                                        <td>{{ $keluar->gudangTujuan->nama_gudang }}</td>
                                        <td>{{ $keluar->status_keluar }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            Tidak ada data approval
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- WAREHOUSE 3 CONTENT -->
            {{-- <div id="wh3" class="tab-content-pane">
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
            </div> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin/laporan.js') }}"></script>
</body>
</html>