@extends('auth.template.app')

@section('content')
    <h4 class="fw-light">Selamat Datang</h4>
    <p class="small text-muted">Silahkan lengkapi data Anda untuk mulai mendaftar di Aplikasi</p>
    <form action="{{ route('register.post') }}" method="POST">
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
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control rounded-0" id="name" placeholder="Contoh : John Doe"
                        name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control rounded-0" id="phone" placeholder="Contoh : 08972168712"
                        name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control rounded-0" id="email"
                        placeholder="Contoh : admin@gmail.com" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
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
