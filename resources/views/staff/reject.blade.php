<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Warehouse 4 - Leya Mart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0066cc;
            --primary-dark: #0052a3;
            --sidebar-width: 200px;
            --sidebar-bg: #ffffff;
            --sidebar-hover: #f0f0f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
        }

        /* Navbar Custom */
        .navbar-custom {
            background: linear-gradient(90deg, #0066cc 0%, #0052a3 100%);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            height: 65px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 22px;
            letter-spacing: 1px;
            color: white;
            margin: 0;
            flex: 0 0 auto;
        }

        .navbar-custom .warehouse-title {
            font-size: 18px;
            font-weight: 600;
            flex: 1;
            text-align: center;
            color: white;
        }

        .navbar-custom .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            flex: 0 0 auto;
        }

        /* Main Container */
        .main-container {
            display: flex;
            min-height: 100vh;
            margin-top: 65px;
        }

        /* Sidebar Custom */
        .sidebar-custom {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            border-right: 1px solid #e0e0e0;
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 65px;
            height: calc(100vh - 65px);
            overflow-y: auto;
            z-index: 1020;
            transition: all 0.3s ease;
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
            background-color: var(--sidebar-hover);
            color: var(--primary-color);
        }

        .sidebar-item.active {
            background-color: var(--primary-color);
            color: white;
            border-left-color: var(--primary-dark);
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
            overflow-y: auto;
            margin-left: var(--sidebar-width);
            height: calc(100vh - 65px);
        }

        /* Warehouse Info */
        .warehouse-info {
            background: linear-gradient(90deg, #0066cc 0%, #0052a3 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .nav-tabs-custom {
            display: flex;
            gap: 10px;
            border-bottom: 2px solid #e0e0e0;
            margin-bottom: 20px;
            padding: 0;
        }

        .nav-tabs-custom a {
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
        }

        .nav-tabs-custom a:hover {
            color: #0066cc;
        }

        .nav-tabs-custom a.active {
            color: #0066cc;
            border-bottom-color: #0066cc;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        .report-card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .report-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
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

        .btn-action-group {
            display: flex;
            gap: 5px;
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .date-info {
            font-size: 12px;
            color: #999;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e0e0e0;
        }

        /* Transfer Request Styles */
        .transfer-form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .form-group-custom {
            margin-bottom: 20px;
        }

        .form-group-custom label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-group-custom input,
        .form-group-custom select,
        .form-group-custom textarea {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-group-custom input:focus,
        .form-group-custom select:focus,
        .form-group-custom textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .status-badge-custom {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin: 5px 0;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-completed {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .btn-submit-custom {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit-custom:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Management Storage Styles */
        .storage-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .storage-header h2 {
            margin: 0;
            color: #333;
        }

        .storage-search {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .storage-search input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .storage-search button {
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .storage-search button:hover {
            background-color: var(--primary-dark);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        .product-image {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.3;
        }

        .product-sku {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }

        .product-stock {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .stock-label {
            font-size: 12px;
            color: #666;
            font-weight: 600;
        }

        .stock-value {
            font-size: 14px;
            font-weight: 700;
            color: #0066cc;
        }

        .product-price {
            font-size: 14px;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stock-status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .stock-available {
            background-color: #d4edda;
            color: #155724;
        }

        .stock-low {
            background-color: #fff3cd;
            color: #856404;
        }

        .stock-out {
            background-color: #f8d7da;
            color: #721c24;
        }

        .product-actions {
            display: flex;
            gap: 8px;
        }

        .btn-product {
            flex: 1;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background-color: #e7f0ff;
            color: #0066cc;
        }

        .btn-edit:hover {
            background-color: #0066cc;
            color: white;
        }

        .btn-delete {
            background-color: #f8d7da;
            color: #721c24;
        }

        .btn-delete:hover {
            background-color: #721c24;
            color: white;
        }

        .storage-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #333;
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

            .form-row {
                grid-template-columns: 1fr;
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

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu > li {
            margin: 0;
        }

        .menu-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 20px;
            cursor: pointer;
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .menu-link:hover {
            background-color: var(--sidebar-hover);
            color: var(--primary-color);
        }

        .menu-link.active {
            background-color: var(--primary-color);
            color: white;
            border-left-color: var(--primary-dark);
        }

        .menu-link i {
            margin-right: 10px;
        }

        .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .submenu.show {
            max-height: 500px;
        }

        .submenu li a {
            display: flex;
            align-items: center;
            padding: 8px 20px 8px 52px;
            color: #666;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .submenu li a:hover {
            color: var(--primary-color);
            background-color: var(--sidebar-hover);
        }

        .dropdown-arrow {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .dropdown-arrow.rotate {
            transform: rotate(180deg);
        }
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
        <span>Gudang reject</span>
    </div>

    <span class="user-profile">
        <i class="fas fa-user-circle"></i>
    </span>
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
            Anda sedang mengelola <strong>gudang reject</strong>
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
                                <input type="text" class="form-control" placeholder="Gudang Reject" readonly>
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
                                        @if($gudang->id_gudang != 3) <!-- Exclude Gudang Utama -->
                                            <option value="{{ $gudang->id_gudang }}">{{ $gudang->nama_gudang }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Alasan</label>
                                <textarea name="alasan" class="form-control" rows="3" placeholder="Masukkan alasan atau catatan pengeluaran barang"></textarea>
                            </div>

                            <input type="hidden" name="id_gudang" value="3"> <!-- Gudang Reject -->
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

        // Product Database\

        // function renderProducts(productsToShow = products) {
        //     const grid = document.getElementById('productsGrid');
        //     grid.innerHTML = '';
            
        //     productsToShow.forEach(product => {
        //         const stockClass = product.status === 'available' ? 'stock-available' : 
        //                            product.status === 'low' ? 'stock-low' : 'stock-out';
        //         const stockText = product.status === 'available' ? '✓ Tersedia' : 
        //                           product.status === 'low' ? '⚠ Stok Rendah' : '✗ Habis';
                
        //         const card = document.createElement('div');
        //         card.className = 'product-card';
        //         card.innerHTML = `
        //             <div class="product-image">${product.emoji}</div>
        //             <div class="product-info">
        //                 <div class="product-name">${product.name}</div>
        //                 <div class="product-sku">${product.sku}</div>
        //                 <div class="product-stock">
        //                     <span class="stock-label">Stok:</span>
        //                     <span class="stock-value">${product.stock}</span>
        //                 </div>
        //                 <div class="product-price">${product.price}</div>
        //                 <span class="stock-status ${stockClass}">${stockText}</span>
        //                 <div class="product-actions">
        //                     <button class="btn-product btn-edit" onclick="editProduct(${product.id})">Edit</button>
        //                     <button class="btn-product btn-delete" onclick="deleteProduct(${product.id})">Hapus</button>
        //                 </div>
        //             </div>
        //         `;
        //         grid.appendChild(card);
        //     });
        // }

        // function searchProducts() {
        //     const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        //     const filtered = products.filter(p => 
        //         p.name.toLowerCase().includes(searchTerm) || 
        //         p.sku.toLowerCase().includes(searchTerm)
        //     );
        //     renderProducts(filtered);
        // }

        // function editProduct(id) {
        //     alert('Edit product ID: ' + id);
        // }

        // function deleteProduct(id) {
        //     alert('Delete product ID: ' + id);
        // }

        // function toggleSidebar() {
        //     const sidebar = document.getElementById('sidebar');
        //     sidebar.classList.toggle('active');
        // }

        // function updateWarehouseOptions() {
        //     if (currentWarehouse === 1) {
        //         document.getElementById('toWarehouse').innerHTML = `
        //             <option value="">Pilih Warehouse Tujuan</option>
        //             <option value="2">Warehouse 2</option>
        //             <option value="3">Warehouse 3</option>
        //             <option value="4">Warehouse 4</option>
        //         `;
        //     } else if (currentWarehouse >= 2) {
        //         document.getElementById('toWarehouse').innerHTML = `
        //             <option value="">Pilih Warehouse Asal</option>
        //             <option value="1">Warehouse 1</option>
        //         `;
        //     }
        // }

        function showTab(tabName) {
            const tabs = document.querySelectorAll('.tab-pane');
            tabs.forEach(tab => tab.classList.remove('active'));
            
            const links = document.querySelectorAll('.tab-link');
            links.forEach(link => link.classList.remove('active'));
            
            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }

        // function submitTransfer(event) {
        //     event.preventDefault();
        //     const toWarehouse = document.getElementById('toWarehouse').value;
        //     const product = document.getElementById('productSelect').value;
        //     const quantity = document.getElementById('quantity').value;
        //     const note = document.getElementById('note').value;

        //     if (!toWarehouse || !product || !quantity) {
        //         alert('Mohon isi semua field yang diperlukan');
        //         return;
        //     }

        //     alert(`Pengajuan transfer berhasil!\nDari: Warehouse ${currentWarehouse}\nKe: Warehouse ${toWarehouse}\nProduk: ${product}\nJumlah: ${quantity}`);
        //     document.getElementById('toWarehouse').value = '';
        //     document.getElementById('productSelect').value = '';
        //     document.getElementById('quantity').value = '';
        //     document.getElementById('note').value = '';
        // }

        // Initialize
        // document.addEventListener('DOMContentLoaded', function() {
        //     renderProducts();
        //     updateWarehouseOptions();
        // });

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
    </script></body>
</html>
