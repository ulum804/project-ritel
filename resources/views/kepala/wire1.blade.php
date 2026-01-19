<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wirehouse 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/kepala/dashboard.css') }}"> --}}
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
         <div class="bg-light text-white " style="width: 250px; height: 100vh; position: fixed;">
            <div class="text-light fw-bold d-flex justify-content-between align-items-center px-3" style="height: 60px; border-bottom-right-radius: 9%;border-bottom-left-radius: 9%;background-color:#0088FF;">
                <span class="fs-5">Leyba Mart</span>
                {{-- <span class="fs-4">&#9776;</span> <!-- Hamburger icon --> --}}
            </div>
            <div class="container d-flex flex-column align-items-start px-3 py-4 gap-3">
                <div class="col">
                    <div class="row"><button type="button" class="btn btn-primary mt-3 ms-4" style="width: 190px">Dashboard</button></div>
                    <div class="row"><button type="button" class="btn btn-primary mt-4 ms-4" style="width: 190px">Wirehouse 1</button></div>
                    <div class="row"><button type="button" class="btn btn-primary mt-4 ms-4" style="width: 190px">Wirehouse 2</button></div>
                    <div class="row"><button type="button" class="btn btn-primary mt-4 ms-4" style="width: 190px">Wirehouse 3</button></div>
                    <div class="row"><button type="button" class="btn btn-primary mt-4 ms-4" style="width: 190px">Wirehouse 4</button></div>
                </div>
            </div>
        </div>
            <!-- Kontainer kanan -->
        <div class="flex-grow-1 ms-250" style="margin-left: 250px;">
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
             <div class="d-flex justify-content-between gap-3 px-4 py-3 content-wrapper" style="margin-top: 100px;">
              <div class="container text-center">
                <div class="row">
                    <div class="col-6 col-md-4"><a class="btn btn-lg " href="#" role="button" style="width: 300px;background-color:#9ADCFF;">purchase order</a></div>
                    <div class="col-6 col-md-4"><a class="btn btn-lg btn-light" href="#" role="button" style="width: 300px">sales order</a></div>
                    <div class="col-6 col-md-4"><a class="btn btn-lg btn-light" href="#" role="button" style="width: 300px">move order</a></div>
                </div>
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
                                    <td>PO12345</td>
                                    <td>Product A</td>
                                    <td>10</td>
                                    <td>Waiting for confirmation</td>
                                    <td>Rp. 867.000,00</td>
                                    {{-- <td><span class="badge bg-success">Completed</span></td> --}}
                                </tr>
                                <tr>
                                    <td>PO12346</td>
                                    <td>Product B</td>
                                    <td>5</td>
                                    <td>Waiting for confirmation</td>
                                    <td>Rp. 867.000,00</td>
                                    {{-- <td><span class="badge bg-warning text-dark">Pending</span></td> --}}
                                </tr>
                                <tr>
                                    <td>PO12347</td>
                                    <td>Product C</td>
                                    <td>20</td>
                                    <td>Waiting for confirmation</td>
                                    <td>Rp. 867.000,00</td>
                                    {{-- <td><span class="badge bg-danger">Cancelled</span></td> --}}
                                </tr>
                        </table>
                        <div class="container">
                            <div class="row justify-content-around">
                                <div class="col" style="font-size:18px "><p>DATE : 5 Januari 2005</p></div>
                                <div class="col"></div>
                                <div class="col"><button type="button" class="btn btn-success" style="width: 211px">Setuju</button></div>
                                <div class="col"><button type="button" class="btn btn-danger" style="width: 211px">Tolak</button></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>