@extends('dashboard.template.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between my-4">
            <h5 class="fw-light">Manajemen User</h5>
            <button class="btn bg-primary rounded-0">
                TAMBAH USER
            </button>
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
                        @for ($i = 1; $i <= 3; $i++)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td>Aditya</td>
                                <td>aditya@vascomm.com</td>
                                <td>089152435267</td>
                                <td><span class="badge bg-success">AKTIF</span></td>
                                <td>
                                    <button class="btn btn-sm rounded-circle btn-success">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm rounded-circle btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm rounded-circle btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
