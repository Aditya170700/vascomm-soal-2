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
        .split {
            height: 100%;
            width: 50%;
            position: fixed;
            z-index: 1;
            top: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .left {
            left: 0;
            background-color: rgba(65, 160, 228, 1);
        }

        .right {
            right: 0;
        }

        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .centered img {
            width: 150px;
            border-radius: 50%;
        }

        .bg-primary {
            color: white;
            background: rgba(65, 160, 228, 1) !important;
        }
    </style>
</head>

<body>
    <div class="split left">
        <div class="centered text-dark">
            <h1>NAMA APLIKASI</h1>
            <p class="small">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.</p>
        </div>
    </div>

    <div class="split right">
        <div class="centered text-start">
            <h4 class="fw-light">Selamat Datang Admin</h4>
            <p class="small text-muted">Silahkan masukkan email atau nomor telepon dan password
                Anda untuk mulai menggunakan aplikasi</p>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="row">
                    @if ($msg = Session::get('error'))
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                {{ $msg }}
                            </div>
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-0" id="email"
                                placeholder="Contoh : admin@gmail.com" name="email">
                            @error('email')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control rounded-0" id="password" name="password"
                                placeholder="Masukkan password">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn bg-primary rounded-0">MASUK</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
