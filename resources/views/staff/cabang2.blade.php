<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Warehouse 2 - Leya Mart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/staff/staff1.css'), }}">
    <style>
        
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar-custom">
        <button class="menu-toggle" onclick="toggleSidebar()">
            <i class="fas fa-list"></i>
        </button>

        <span class="navbar-brand">Leya Mart</span>

        <div class="warehouse-title">
            <span>Gudang cabang 1</span>
        </div>

        <!-- <span class="user-profile">
            <i class="fas fa-user-circle"></i>
        </span> -->
    </nav>

    <!-- MAIN CONTAINER -->
    <div class="main-container">

        <!-- SIDEBAR -->
        <div class="sidebar-custom" id="sidebar">
            <ul class="sidebar-menu">
                <li>
                    <a href="#" class="menu-link active">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ '/' }}" class="menu-link">
                        <i class="fas fa-sign-out-alt"></i> Sign out
                    </a>
                </li>
            </ul>
        </div>

        <!-- CONTENT -->
        <div class="content">

            <!-- WAREHOUSE INFO -->
            <div class="warehouse-info" id="warehouseInfo">
                <i class="fas fa-info-circle me-2"></i>
                Anda sedang mengelola <strong>gudang cabang 1</strong>
            </div>

            <!-- TAB NAVIGATION -->
            <div class="nav-tabs-custom">
                <a href="javascript:void(0)" class="tab-link active" onclick="showTab('storage')">
                    <i class="fas fa-boxes me-2"></i> Management Storage
                </a>
                {{-- <a href="javascript:void(0)" class="tab-link" onclick="showTab('purchase')">
                    <i class="fas fa-file-invoice me-2"></i> Barang Masuk
                </a> --}}
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('sales')">
                    <i class="fas fa-shopping-cart me-2"></i> Barang Keluar
                </a>
            </div>

            <!-- STORAGE TAB -->
            <div id="storage" class="tab-pane active">
                <div class="storage-header">
                    <h2>Management Storage</h2>
                </div>

                <div class="card report-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>Reseller</th>
                                        <th>Produk</th>
                                        <th>kode</th>
                                        @foreach($gudangs as $gudang)
                                            <th>Stok {{ $gudang->nama_gudang }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($barangs as $barang)
                                        <tr>
                                            <td>
                                                @foreach($barang->barangMasuk as $masuk)
                                                    {{ $masuk->nama_reseller }}@if(!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->kode_barang }}</td>
                                            @foreach($gudangs as $gudang)
                                                @php
                                                    // stok barang di gudang tertentu dari StokModel
                                                    $stok = \App\Models\StokModel::where('id_gudang', $gudang->id_gudang)->where('id_barang', $barang->id_barang)->value('qty_stok') ?? 0;
                                                @endphp
                                                <td>{{ $stok }}</td>
                                            @endforeach
                                        </tr>
                                                @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PURCHASE TAB -->
            {{-- <div id="purchase" class="tab-pane">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-title">Form Barang Masuk</div>

                        <form>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">From Warehouse</label>
                                    <input type="text" class="form-control" placeholder="Gudang pertama" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Nama Produk</label>
                                    <select class="form-select">
                                        <option selected>Pilih Produk</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Tanggal Keluar</label>
                                    <input type="date" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" placeholder="Masukkan jumlah">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Harga Satuan</label>
                                    <input type="text" class="form-control" placeholder="Rp 0">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">To Warehouse</label>
                                    <select class="form-select">
                                        <option selected>Pilih Warehouse Tujuan</option>
                                        <option value="2">Gudang Utama</option>
                                        <option value="3">Cabang 1</option>
                                        <option value="4">Gudang Reject</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Alasan</label>
                                    <textarea class="form-control" rows="3"
                                        placeholder="Masukkan alasan atau catatan pengeluaran barang"></textarea>
                                </div>
                            </div>

                            <div class="mt-4 text-end">
                                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            <!-- SALES TAB -->
           <div id="sales" class="tab-pane">
            <div class="card report-card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="report-title">Form Barang Keluar</div>

                     <form action="{{ route('barang.keluar.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">From Warehouse</label>
                                <input type="text" class="form-control" placeholder="Gudang Cabang 1" readonly>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Nama Produk</label>
                                <select name="id_barang" class="form-select" required>
                                    <option value="">Pilih Produk</option>
                                    @foreach($barangs as $barang)
                                        <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar_in" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="qty_keluar" class="form-control" placeholder="Masukkan jumlah" min="1" required>
                            </div>

                            {{-- <div class="col-md-4">
                                <label class="form-label">Harga Satuan</label>
                                <input type="number" name="harga_satuan" class="form-control" placeholder="Rp 0" step="0.01" min="0">
                            </div> --}}

                            <div class="col-md-4">
                                <label class="form-label">To Warehouse</label>
                                <select name="id_gudang_tujuan" class="form-select" required>
                                    <option value="">Pilih Warehouse Tujuan</option>
                                    @foreach($gudangs as $gudang)
                                        @if($gudang->id_gudang != 1) <!-- Exclude Gudang Utama -->
                                            <option value="{{ $gudang->id_gudang }}">{{ $gudang->nama_gudang }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Alasan</label>
                                <textarea name="alasan" class="form-control" rows="3" placeholder="Masukkan alasan atau catatan pengeluaran barang"></textarea>
                            </div>

                            <input type="hidden" name="id_gudang" value="1"> <!-- Gudang Cabang 1 -->
                            <input type="hidden" name="id_user" value="{{ session('id_user') }}"> <!-- Dari session -->
                        </div>

                        <div class="mt-4 text-end">
                            <button type="reset" class="btn btn-secondary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentWarehouse = 1;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function toggleSubmenu(event, menuId) {
            event.preventDefault();
            const submenu = document.getElementById(menuId);
            const arrow = event.currentTarget.querySelector('.dropdown-arrow');
            submenu.classList.toggle('show');
            arrow.classList.toggle('rotate');
        }

        function showTab(tabName) {
            const tabs = document.querySelectorAll('.tab-pane');
            tabs.forEach(tab => tab.classList.remove('active'));
            
            const links = document.querySelectorAll('.tab-link');
            links.forEach(link => link.classList.remove('active'));
            
            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }


        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth < 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>
