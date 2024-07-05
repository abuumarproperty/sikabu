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
                            Data Lahan
                        </h5>
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="dropdown">
                            <button class="btn app-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Download Laporan
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/dashboard/laporan-lahan-almadinah1">
                                        <span class="icon my-2">
                                            <i class="bi bi-printer"></i>
                                        </span>
                                        Download Laporan Al - Madinah 1
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/dashboard/laporan-lahan-almadinah2">
                                        <span class="icon my-2">
                                            <i class="bi bi-printer"></i>
                                        </span>
                                        Download Laporan Al - Madinah 2
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/dashboard/laporan-lahan-almadinah3">
                                        <span class="icon my-2">
                                            <i class="bi bi-printer"></i>
                                        </span>
                                        Download Laporan Al - Madinah 3
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-start">
                        <a class="btn app-btn-secondary" href="/dashboard/lands/create">
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
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($lands as $land)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $land->nama }}</td>
                                    <td>{{ $land->keterangan }}</td>
                                    <td>
                                        <a href="/dashboard/lands/{{ $land->id }}/edit"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-pen-fill"></i> Ubah
                                            </span>
                                        </a>

                                        <form action="/dashboard/lands/{{ $land->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf

                                            <button class="btn btn-danger btn-icon-split"
                                                onclick="return confirm('Are you sure?')">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </span>
                                            </button>
                                        </form>

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
