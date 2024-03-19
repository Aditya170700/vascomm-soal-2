@extends('dashboard.template.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between my-4">
            <h5 class="fw-light">Manajemen User</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <table class="table table-borderless table-striped mb-0 bg-white shadow-sm">
                    <thead>
                        <tr>
                            <th class="fw-light text-center">No</th>
                            <th class="fw-light">Nama Lengkap</th>
                            <th class="fw-light">Email</th>
                            <th class="fw-light">No. Telepon</th>
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
                                            <form action="{{ route('users.approve', $result->id) }}" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="exampleModal{{ $loop->iteration }}Label">
                                                        {{ $result->name }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Nama</label>
                                                            <input type="text" class="form-control rounded-0"
                                                                id="name" placeholder="Contoh : John Doe"
                                                                name="name" value="{{ $result->name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control rounded-0"
                                                                id="phone" placeholder="Contoh : 08972168712"
                                                                name="phone" value="{{ $result->phone }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control rounded-0"
                                                                id="email" placeholder="Contoh : admin@gmail.com"
                                                                name="email" value="{{ $result->email }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    @if (!$result->status)
                                                        <button type="submit" class="btn btn-danger">Approve</button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->email }}</td>
                                <td>{{ $result->phone }}</td>
                                <td>{!! $result->badge_status !!}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-sm rounded-circle btn-success mx-1"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row mt-3">
                    <div class="col-12">
                        {{ $results->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
