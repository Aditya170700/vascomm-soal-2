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
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .bg-purple {
            background: linear-gradient(266.45deg, #C2D6FF 2.92%, #ADC9FF 99.33%);
        }

        .bg-primary {
            color: white;
            background: rgba(65, 160, 228, 1) !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    @include('dashboard.template.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('dashboard.template.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main class="bg-light" style="min-height: 100%">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
