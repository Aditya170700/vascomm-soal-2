@extends('auth.template.app')

@section('content')
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
            @if ($msg = Session::get('success'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
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
@endsection
