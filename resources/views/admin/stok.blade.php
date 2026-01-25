<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Stok Gudang - Leya Mart</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/stok.css') }}">
</head>
<body>

<!-- ================= TOP BAR ================= -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container-fluid">
        {{-- <button class="menu-toggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button> --}}

        <span class="navbar-brand mb-0">Leya Mart</span>

        <div class="warehouse-title text-white">
            <span>Stok Gudang</span>
        </div>

        <span class="navbar-text text-white">
            <i class="bi bi-person-circle"></i>
        </span>
    </div>
</nav>

<!-- ================= MAIN CONTAINER ================= -->
<div class="main-container">

    <!-- ===== SIDEBAR ===== -->
    <aside class="sidebar-custom" id="sidebar">
        <div class="sidebar-content">

            <a href="{{ route('admin.manajemen') }}" class="sidebar-item">
                <i class="bi bi-people"></i> Manajemen User
            </a>

            <a href="{{ route('admin.laporan') }}" class="sidebar-item">
                <i class="bi bi-file-earmark-text"></i> Laporan
            </a>

            <a href="{{ route('admin.stok') }}" class="sidebar-item active">
                <i class="bi bi-boxes"></i> Stok Gudang
            </a>

            <a href="{{ url('/') }}" class="sidebar-item">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>

        </div>
    </aside>

    <!-- ===== CONTENT ===== -->
    <main class="content">
        <div class="page-title">Stok Gudang</div>

        <div class="card report-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
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
    </main>

</div>

</body>
</html>
