<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Warehouse 1 - Leya Mart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/staff/staff1.css'), }}">
    <style>
        
    </style>
</head>
<body>
    <!-- TOP BAR -->
    <nav class="navbar-custom">
        <button class="menu-toggle" onclick="toggleSidebar()">
            <i class="fas fa-list"></i>
        </button>
        <span class="navbar-brand">Leya Mart</span>
        <div class="warehouse-title">
            <span>Warehouse 1</span>
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
                        <span><i class="fas fa-home"></i> Dashboard</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="#" class="menu-link" onclick="toggleSubmenu(event, 'warehouse-menu')">
                        <span><i class="fas fa-warehouse"></i> Warehouse</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="submenu" id="warehouse-menu">
                        <li><a href="#"><i class="fas fa-box"></i> Product</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-link" onclick="toggleSubmenu(event, 'transaction-menu')">
                        <span><i class="fas fa-exchange-alt"></i> Transaction</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="submenu" id="transaction-menu">
                        <li><a href="#"><i class="fas fa-file-invoice"></i> Purchase Order</a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i> Sales Order</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-link">
                        <span><i class="fas fa-chart-bar"></i> Report</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{'/'}}" class="menu-link">
                        <span><i class="fas fa-sign-out-alt"></i> Sign out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <!-- Warehouse Info Alert -->
            <div class="warehouse-info" id="warehouseInfo">
                <i class="fas fa-info-circle me-2"></i>
                Anda sedang mengelola <strong>gudang utama</strong>
            </div>

            <!-- TAB NAVIGATION -->
            <div class="nav-tabs-custom">
                <a href="javascript:void(0)" class="tab-link active" onclick="showTab('storage')">
                    <i class="fas fa-boxes me-2"></i>Management Storage
                </a>
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('purchase')">
                    <i class="fas fa-file-invoice me-2"></i>Barang Masuk
                </a>
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('sales')">
                    <i class="fas fa-shopping-cart me-2"></i>Barang Keluart
                </a>
                <a href="javascript:void(0)" class="tab-link" onclick="showTab('transfer')">
                    <i class="fas fa-exchange-alt me-2"></i>form transefer 
                </a>
            </div>

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
                                        <th>Produk</th>
                                        <th>SKU</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PURCHASE REPORT TAB -->
            <div id="purchase" class="tab-pane">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="report-title">Pembelian Barang</div>
                        <!-- FORM BARANG masuk -->
<div class="card report-card mt-4">
    <div class="card-body">
        <div class="report-title">Form Barang masuk</div>

        <form>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">ID Barang masuk</label>
                    <input type="text" class="form-control" placeholder="BK001">
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
                    <label class="form-label">Total</label>
                    <input type="text" class="form-control" placeholder="Rp 0" readonly>
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PO001</td>
                                        <td>Minyak Goreng Tropical</td>
                                        <td>50 unit</td>
                                        <td>Rp 45.900</td>
                                        <td>Rp 2.295.000</td>
                                        <td>10-Jan-2025</td>
                                    </tr>
                                    <tr>
                                        <td>PO002</td>
                                        <td>Indomie Ayam Bawang</td>
                                        <td>200 box</td>
                                        <td>Rp 3.500</td>
                                        <td>Rp 700.000</td>
                                        <td>11-Jan-2025</td>
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
                        <div class="report-title">Penjualan Barang</div>
                        <div class="report-title">Form Barang Keluar</div>

        <form>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">ID Barang Keluar</label>
                    <input type="text" class="form-control" placeholder="BK001">
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
                    <label class="form-label">Total</label>
                    <input type="text" class="form-control" placeholder="Rp 0" readonly>
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SO001</td>
                                        <td>Teh Kotak</td>
                                        <td>30 pcs</td>
                                        <td>Rp 6.500</td>
                                        <td>Rp 195.000</td>
                                        <td>12-Jan-2025</td>
                                    </tr>
                                    <tr>
                                        <td>SO002</td>
                                        <td>Sprite 600ml</td>
                                        <td>25 pcs</td>
                                        <td>Rp 15.000</td>
                                        <td>Rp 375.000</td>
                                        <td>13-Jan-2025</td>
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

            <!-- TRANSFER STOCK TAB -->
            <div id="transfer" class="tab-pane">
                <div class="transfer-form">
                    <h4 style="margin-bottom: 25px; color: #333;">Pengajuan Transfer Stock</h4>
                    <form onsubmit="">
                        <div class="form-row">
                            <div class="form-group-custom">
                                <label>From Warehouse:</label>
                                <input type="text" id="fromWarehouse" value="Warehouse 1" readonly>
                            </div>
                            <div class="form-group-custom">
                                <label>To Warehouse:</label>
                                <select id="" required>
                                    <option value="">Pilih Warehouse Tujuan</option>
                                    <option value="2">Gudang utama</option>
                                    <option value="2">Cabang 1</option>
                                    <option value="3">Cabang 2</option>
                                    <option value="4">Gudang reject</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group-custom">
                                <label>Product:</label>
                                <select id="productSelect" required>
                                    <option value="">Pilih Produk</option>
                                </select>
                            </div>
                            <div class="form-group-custom">
                                <label>Quantity:</label>
                                <input type="number" id="quantity" placeholder="Masukkan jumlah" min="1" required>
                            </div>
                        </div>

                        <div class="form-group-custom">
                            <label>Note:</label>
                            <textarea id="note" placeholder="Catatan pengajuan..." rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn-submit-custom"><i class="fas fa-paper-plane me-2"></i>Kirim Pengajuan</button>
                    </form>

                    <div style="margin-top: 30px;">
                        <h5 style="color: #333; margin-bottom: 15px;">Riwayat Pengajuan Transfer</h5>
                        <div class="table-responsive">
                            <table class="table table-custom table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Qty</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TR001</td>
                                        <td>Indomie Ayam Bawang</td>
                                        <td>WH 1</td>
                                        <td>WH 2</td>
                                        <td>50 box</td>
                                        <td>Pending</td>
                                        <td>05-Jan-2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
    </script>
</body>
</html>
