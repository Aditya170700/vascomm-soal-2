<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VASCOMM</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo.png') }}" alt="Bootstrap">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarText">
                <div class="w-100 d-flex justify-content-center py-3">
                    <div class="input-group w-75">
                        <input type="text" class="form-control form-control-sm border-end-0"
                            placeholder="Cari parfum kesukaanmu">
                        <span class="input-group-text bg-white border-start-0">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger rounded-0">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-0 mx-2">MASUK</a>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-0">DAFTAR</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <main class="container my-5 py-5">
        <div id="carousel-banner" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-banner" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel-banner" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel-banner" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('bg-1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('bg-1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('bg-1.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-banner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-banner" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="mt-5">
            <h4>Terbaru</h4>
            <div class="row">
                @forelse ($latest_products as $lp)
                    <div class="col-6 col-lg-2 mb-4">
                        <div class="card">
                            <div class="d-flex justify-content-center py-3">
                                <img src="{{ asset($lp->image) }}" class="card-img-top w-75" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $lp->name }}</h5>
                                <h6 class="text-info">{{ $lp->price_idr }}</h6>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        Belum ada produk
                    </div>
                @endforelse
            </div>
        </div>
        <div class="mt-5">
            <h4>Produk Tersedia</h4>
            <div class="row">
                @forelse ($products as $lp)
                    <div class="col-6 col-lg-2 mb-4">
                        <div class="card">
                            <div class="d-flex justify-content-center py-3">
                                <img src="{{ asset($lp->image) }}" class="card-img-top w-75" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $lp->name }}</h5>
                                <h6 class="text-info">{{ $lp->price_idr }}</h6>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        Belum ada produk
                    </div>
                @endforelse
            </div>
        </div>
    </main>
    <footer class="border-top">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4 text-center">
                    <img src="{{ asset('logo.png') }}" alt="Bootstrap">
                    <p class="small my-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit nihil
                        sed quo animi sint
                        laboriosam voluptates.</p>
                    <div class="text-center">
                        <i class="fab fa-facebook text-primary mx-2"></i>
                        <i class="fab fa-twitter text-primary mx-2"></i>
                        <i class="fab fa-instagram text-primary mx-2"></i>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <h5>Layanan</h5>
                    <p class="small my-2">BANTUAN</p>
                    <p class="small my-2">TANYA JAWAB</p>
                    <p class="small my-2">HUBUNGI KAMI</p>
                    <p class="small my-2">CARA BERJUALAN</p>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <h5>Tentang Kami</h5>
                    <p class="small my-2">ABOUT US</p>
                    <p class="small my-2">KARIR</p>
                    <p class="small my-2">BLOG</p>
                    <p class="small my-2">KEBIJAKAN PRIVASI</p>
                    <p class="small my-2">SYARAT DAN KETENTUAN</p>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <h5>Mitra</h5>
                    <p class="small my-2">SUPPLIER</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/7e59b9b1c0.js" crossorigin="anonymous"></script>
</body>

</html>
