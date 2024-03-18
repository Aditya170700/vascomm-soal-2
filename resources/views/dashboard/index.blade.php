<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Vascomm</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .bg-purple {
            background: linear-gradient(266.45deg, #C2D6FF 2.92%, #ADC9FF 99.33%);
        }

        .bg-primary {
            background: rgba(65, 160, 228, 1) !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-white border-bottom">
        <a class="navbar-brand ps-3" href="{{ route('dashboards') }}">
            <img src="{{ asset('logo.png') }}" alt="Bootstrap">
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <p class="small text-primary p-0 m-0">Halo Admin,</p>
            <p class="small p-0 m-0">Aditya Ricki</p>
        </div>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link bg-dark rounded-circle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    @php
                        $routeName = request()->route()->getName();
                    @endphp
                    <div class="nav">
                        <a class="nav-link {{ str_contains($routeName, 'dashboards') ? 'bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('dashboards') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link {{ str_contains($routeName, 'users') ? 'bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('dashboards') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Manajemen User
                        </a>
                        <a class="nav-link {{ str_contains($routeName, 'products') ? 'bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('dashboards') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Manajemen Produk
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="bg-light" style="min-height: 100%">
                <div class="container-fluid px-4">
                    <h4 class="my-4">Dashboard</h4>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                                <div class="card-body">
                                    <p class="m-0 small">Jumlah User</p>
                                    <p class="m-0 fs-4">150 User</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                                <div class="card-body">
                                    <p class="m-0 small">Jumlah User Aktif</p>
                                    <p class="m-0 fs-4">150 User</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                                <div class="card-body">
                                    <p class="m-0 small">Jumlah Produk</p>
                                    <p class="m-0 fs-4">150 Produk</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                                <div class="card-body">
                                    <p class="m-0 small">Jumlah Produk Aktif</p>
                                    <p class="m-0 fs-4">150 Produk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h6>Produk Terbaru</h6>
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th class="fw-light rounded-start">Produk</th>
                                                <th class="fw-light">Tanggal Dibuat</th>
                                                <th class="fw-light rounded-end">Harga (Rp)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="mb-0">
                                            @for ($i = 1; $i <= 3; $i++)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('produk-3.png') }}" alt=""> <span>
                                                            Microsoft
                                                            Surface 7</span>
                                                    </td>
                                                    <td>12 Mei 2023</td>
                                                    <td>Rp. 1000</td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
