@extends('dashboard.template.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex my-4">
            <h5 class="fw-light">Dashboard</h5>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                    <div class="card-body">
                        <p class="m-0 small">Jumlah User</p>
                        <p class="m-0 fs-4">{{ $active_user }} User</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                    <div class="card-body">
                        <p class="m-0 small">Jumlah User Aktif</p>
                        <p class="m-0 fs-4">{{ $inactive_user }} User</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                    <div class="card-body">
                        <p class="m-0 small">Jumlah Produk</p>
                        <p class="m-0 fs-4">{{ $active_product }} Produk</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-purple text-dark mb-4 rounded-4 border-0 p-2">
                    <div class="card-body">
                        <p class="m-0 small">Jumlah Produk Aktif</p>
                        <p class="m-0 fs-4">{{ $inactive_product }} Produk</p>
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
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($product->image) }}" alt="" width="200">
                                            <span>{{ $product->name }}</span>
                                        </td>
                                        <td>{{ date('d M Y', strtotime($product->created_at)) }}
                                        </td>
                                        <td>{{ $product->price_idr }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
