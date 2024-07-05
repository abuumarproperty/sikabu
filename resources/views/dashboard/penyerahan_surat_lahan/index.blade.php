@extends('dashboard.layouts.main')

@section('content')
    <div class="tab-content" id="orders-table-tab-content">

        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>
        @endif


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="m-0 font-weight-bold text-primary py-2">
                            Penyerahan Surat Lahan
                        </h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn app-btn-secondary" href="/dashboard/land_certificates/create">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg>
                            Tambah Data
                        </a>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Lahan</th>
                                <th>Blok</th>
                                <th>Tanggal Penyerahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Lahan</th>
                                <th>Blok</th>
                                <th>Tanggal Penyerahan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($land_certificates as $land_certificate)
                                <tr>
                                    <td>{{ $land_certificate->costumer->nama }}</td>
                                    <td>{{ $land_certificate->land->nama }}</td>
                                    <td>{{ $land_certificate->blok }}</td>
                                    <td>{{ $land_certificate->tanggal }}</td>
                                    <td>
                                        <a href="/dashboard/land_certificates/{{ $land_certificate->id }}"
                                            class="btn btn-info btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-eye"></i>
                                            </span>
                                        </a>
                                        <a href="/dashboard/land_certificates/{{ $land_certificate->id }}/edit"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-pen-fill"></i>
                                            </span>
                                        </a>

                                        @can('admin')
                                            <form action="/dashboard/land_certificates/{{ $land_certificate->id }}"
                                                method="post" class="d-inline">
                                                @method('delete')
                                                @csrf

                                                <button class="btn btn-danger btn-icon-split"
                                                    onclick="return confirm('Are you sure?')">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!--//tab-content-->
@endsection
