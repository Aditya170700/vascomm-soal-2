@extends('dashboard.template.app')

@section('content')
    <div class="container-fluid px-4">
        {{-- TAMBAH --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" class="form-control rounded-0" id="image" name="image"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control rounded-0" id="name"
                                        placeholder="Contoh : Sarung" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Harga</label>
                                    <input type="number" class="form-control rounded-0" id="price"
                                        placeholder="Contoh : 10000" name="price" value="{{ old('price') }}" required
                                        min="1">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" required>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-primary rounded-0">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between my-4">
            <h5 class="fw-light">Manajemen Produk</h5>
            <button class="btn bg-primary rounded-0" data-bs-toggle="modal" data-bs-target="#addModal">
                TAMBAH PRODUK
            </button>
        </div>
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
            <div class="col-xl-12">
                <table class="table table-borderless table-striped mb-0 bg-white shadow-sm">
                    <thead>
                        <tr>
                            <th class="fw-light text-center">No</th>
                            <th class="fw-light">Nama</th>
                            <th class="fw-light">Harga</th>
                            <th class="fw-light">Status</th>
                            <th class="fw-light"></th>
                        </tr>
                    </thead>
                    <tbody class="mb-0">
                        @forelse ($results as $result)
                            <tr>
                                {{-- DETAIL --}}
                                <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                    aria-labelledby="exampleModal{{ $loop->iteration }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModal{{ $loop->iteration }}Label">
                                                    {{ $result->name }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="mb-3 text-center">
                                                        <img src="{{ asset($result->image) }}" alt=""
                                                            class="img-fluid" width="200">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nama</label>
                                                        <input type="text" class="form-control rounded-0"
                                                            id="name" placeholder="Contoh : John Doe" name="name"
                                                            value="{{ $result->name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="price" class="form-label">Harga</label>
                                                        <input type="text" class="form-control rounded-0"
                                                            id="price" placeholder="Contoh : 08972168712"
                                                            name="price" value="{{ $result->price }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <div>
                                                            {!! $result->badge_status !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- EDIT --}}
                                <div class="modal fade" id="editModal{{ $loop->iteration }}" tabindex="-1"
                                    aria-labelledby="editModal{{ $loop->iteration }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('products.update', $result->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="addModalLabel">Edit Produk</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <div class="mb-3 text-center">
                                                            <img src="{{ asset($result->image) }}" alt=""
                                                                class="img-fluid" width="200">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Gambar</label>
                                                            <input type="file" class="form-control rounded-0"
                                                                id="image" name="image">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Nama</label>
                                                            <input type="text" class="form-control rounded-0"
                                                                id="name" placeholder="Contoh : Sarung"
                                                                name="name" value="{{ $result->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Harga</label>
                                                            <input type="number" class="form-control rounded-0"
                                                                id="price" placeholder="Contoh : 10000"
                                                                name="price" value="{{ $result->price }}" required
                                                                min="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Status</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="status"
                                                                required>
                                                                <option {{ $result->status == 1 ? 'selected' : '' }}
                                                                    value="1">Aktif</option>
                                                                <option {{ $result->status == 0 ? 'selected' : '' }}
                                                                    value="0">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn bg-primary rounded-0">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->price_idr }}</td>
                                <td>{!! $result->badge_status !!}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-sm rounded-circle btn-success mx-1"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm rounded-circle btn-warning mx-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $loop->iteration }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('products.destroy', $result->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm rounded-circle btn-danger mx-1">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
