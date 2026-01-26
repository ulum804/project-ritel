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
            {{-- <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button> --}}
            <span class="navbar-brand mb-0">Leya Mart</span>
            <div class="warehouse-title text-white">
                <span>Aproval Barang Masuk</span>
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
                <i class="bi bi-building"></i> Barang MAsuk
            </a>
            <a href="{{ route('warehouse2') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Barang Keluar
            </a>
            {{-- <a href="{{ route('warehouse3') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Warehouse 3
            </a>
            <a href="{{ route('warehouse4') }}" class="sidebar-item">
                <i class="bi bi-building"></i> Warehouse 4
            </a> --}}
            <a href="{{'/'}}" class="sidebar-item">
                <i class="bi bi-building"></i> Logout
            </a>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <!-- TAB NAVIGATION -->
            {{-- <div class="nav-tabs-custom">
                <a href="javascript:void(0)" class="tab-link active" onclick="showTab('purchase')">
                    Barang Masuk
                </a>
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('sales')">
                    Barang Keluar
                </a>
                {{-- <a href="javascript:void(0)" class="tab-link" onclick="showTab('move')">
                    Move Report
                </a> --}}
            {{-- </div>  --}}

            <!-- PURCHASE REPORT TAB -->
            <div id="purchase" class="tab-pane active">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-title">Barang Masuk</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Alasan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($masuks as $masuk)
                                    <tr>
                                        <td>#{{ $masuk->barang->kode_barang }}</td>
                                        <td>{{ $masuk->barang->nama_barang }}</td>
                                        <td>{{ $masuk->Qty_masuk }}</td>
                                        <td>{{ $masuk->alasan ?? '-' }}</td>
                                        <td>{{ $masuk->tanggal_masuk_in }}</td>
                                        <td>
                                            <form action="{{ route('masuk.approve',$masuk->id_barang_masuk) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success btn-small">TERIMA</button>
                                            </form>

                                            <form action="{{ route('masuk.reject',$masuk->id_barang_masuk) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger btn-small">TOLAK</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                            </table>
                        </div>
                        {{-- <div class="date-info">
                            DATE: 13 Januari 2025
                        </div> --}}
                    </div>
                </div>
            </div>  

            <!-- SALES REPORT TAB -->
            {{-- <div id="sales" class="tab-pane">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-title">Barang Keluar</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Alasan</th>
                                        <th>Tanggal keluar</th>
                                        <th>Dari Gudang</th>
                                        <th>Ke Gudang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    @foreach ($keluars as $keluar)
                                    <tr>
                                        <td>#{{ $keluar->id_barang_keluar }}</td>
                                        <td>{{ $keluar->barang->nama_barang ?? '-' }}</td>
                                        <td>{{ $keluar->qty_keluar }} pcs</td>
                                        <td>{{ $keluar->alasan ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($keluar->tanggal_keluar_in)->format('d-m-Y') }}</td>
                                        <td>{{ $keluar->gudangAsal->nama_gudang ?? '-' }}</td>
                                        <td>{{ $keluar->gudangTujuan->nama_gudang ?? '-' }}</td>
                                        <td>
                                            @if ($keluar->status_keluar === 'pending')
                                                <div class="btn-action-group">
                                                    <form action="{{ route('barang.keluar.tolak', $keluar->id_barang_keluar) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger btn-small">TOLAK</button>
                                                    </form>
                                                    <form action="{{ route('barang.keluar.setuju', $keluar->id_barang_keluar) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-success btn-small">TERIMA</button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="badge bg-{{ $keluar->status_keluar === 'setuju' ? 'success' : 'danger' }}">
                                                    {{ strtoupper($keluar->status_keluar) }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}

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
