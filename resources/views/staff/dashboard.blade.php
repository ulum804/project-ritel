<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leyba Mart Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/staff/dashboard.css') }}">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-light text-white " style="width: 250px; height: 100vh; position: fixed;">
            <div class="text-light fw-bold d-flex justify-content-between align-items-center px-3" style="height: 60px; border-bottom-right-radius: 9%;border-bottom-left-radius: 9%;background-color:#0088FF;">
                <span class="fs-5">Leyba Mart</span>
                {{-- <span class="fs-4">&#9776;</span> <!-- Hamburger icon --> --}}
            </div>
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle mt-4 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 190px">
                    Dashboard
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Product</a></li>
                    <li><a class="dropdown-item" href="#">operation</a></li>
                    <li><a class="dropdown-item" href="#">Report</a></li>
                    <li><a class="dropdown-item" href="#">Management wirehouse</a></li>
                </ul>
                </div>
                <a class="btn btn-primary dropdown-toggle mt-4 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 190px">
                    purchase order
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">order</a></li>
                    <li><a class="dropdown-item" href="#">product</a></li>
                    <li><a class="dropdown-item" href="#">Report</a></li>
                    <li><a class="dropdown-item" href="#">configuraton</a></li>
                </ul>
                <a class="btn btn-primary dropdown-toggle mt-4 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 190px">
                    sales order
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">order</a></li>
                    <li><a class="dropdown-item" href="#">product</a></li>
                    <li><a class="dropdown-item" href="#">Report</a></li>
                    <li><a class="dropdown-item" href="#">configuraton</a></li>
                </ul>
                <a class="btn btn-primary dropdown-toggle mt-4 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 190px">
                    setings
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">management acount</a></li>
                </ul>
                </div>
            </div>
        </div>
         <!-- Kontainer kanan -->
        <div class="flex-grow-1 ms-250" style="margin-left: 250px;">
            <!-- Navbar horizontal -->
            <nav class="navbar navbar-expand-lg navbar-light  px-4 shadow-sm mb-5" style="height: 90px; background-color:#009DFF; position: fixed; top: 0; left: 250px; right: 0; z-index: 1030;">
            <div class="container-fluid">
                <span class="navbar-brand text-light fw-bold">Dashboard</span>
                <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="#"><img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="30" alt="User" /></a>
                    </li>
                </ul>
                </div>
            </div>
            </nav>
            <!-- Kotak Statistik -->

            <div class="d-flex justify-content-between gap-3 px-4 py-3 content-wrapper" style="margin-top: 100px;">
            <div class="bg-white shadow p-3 rounded p-3 text-center flex-fill" >
                <h6 class="mb-1 text-muted">In Goods</h6>
                <h4 class="fw-bold text-success">3</h4>
            </div>
            <div class="bg-white shadow p-3 rounded p-3 text-center flex-fill" >
                <h6 class="mb-1 text-muted">Out Goods</h6>
                <h4 class="fw-bold text-danger">8</h4>
            </div>
            <div class="bg-white shadow p-3 rounded p-3 text-center flex-fill" >
                <h6 class="mb-1 text-muted">Stock in Storage</h6>
                <h4 class="fw-bold text-primary">50</h4>
            </div>
            </div>
            {{-- konten utama --}}
            <div class="container-fluid px-4 py-3">
                 <div class="mb-5">
                    <h5 class="fw-bold mb-3">Purchase Activity</h5>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-primary">
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
                            <td>#XY8W</td>
                            <td>Minyak bimoli 1ltr</td>
                            <td>4 pack</td>
                            <td>Waiting for confirmation</td>
                            <td>Rp. 867.000,00</td>
                        </tr>
                        <tr>
                            <td>#ERG2</td>
                            <td>Cimory yogurt strawberry</td>
                            <td>50 pcs</td>
                            <td>Delivery process</td>
                            <td>Rp. 255.000,00</td>
                        </tr>
                        <tr>
                            <td>#7DHJ</td>
                            <td>Golda coffee</td>
                            <td>2 pack</td>
                            <td>Validate stock</td>
                            <td>Rp. 425.000,00</td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-outline-primary mb-3">Lihat detail</button>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-3">Sales Order Activity</h5>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-success">
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
                                <td>#XY8W</td>
                                <td>Minyak bimoli 1ltr</td>
                                <td>10 pcs</td>
                                <td>Waiting for confirmation</td>
                                <td>Rp. 78.000,00</td>
                            </tr>
                            <tr>
                                <td>#ERG2</td>
                                <td>Cimory yogurt strawberry</td>
                                <td>25 pcs</td>
                                <td>Packing & QC goods</td>
                                <td>Rp. 112.500,00</td>
                            </tr>
                            <tr>
                                <td>#7DHJ</td>
                                <td>Golda coffee</td>
                                <td>1 pack</td>
                                <td>Delivery orders</td>
                                <td>Rp. 212.500,00</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <button class="btn btn-outline-success ">Lihat detail</button>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>