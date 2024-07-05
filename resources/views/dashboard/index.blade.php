@extends('dashboard.layouts.main')

@section('content')
    {{-- <h1 class="app-page-title">Overview</h1> --}}

    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <div class="inner">
            <div class="app-card-body p-3 p-lg-4">
                <h3 class="mb-3">Welcome, {{ auth()->user()->name }}!</h3>
                <div class="row gx-5 gy-3">
                    <div class="col-12 col-lg-9">
                        <div>
                            Silahkan untuk melihat notifikasi terlebih dahulu apabila terdapat pengumuman terbaru yaa..
                            Selamat Bekerja!!
                        </div>
                    </div><!--//col-->
                </div><!--//row-->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div><!--//app-card-body-->

        </div><!--//inner-->
    </div><!--//app-card-->

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
                            Data Pelanggan
                        </h5>
                    </div>
                    {{-- <div class="col-md-6 text-end">
                        <a class="btn app-btn-secondary" href="#">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Download CSV
                        </a>
                    </div> --}}
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
                                <th>Besar Angsuran</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Lahan</th>
                                <th>Blok</th>
                                <th>Besar Angsuran</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($costumers as $costumer)
                                <tr>
                                    <td>{{ $costumer->nama }}</td>
                                    <td>{{ $costumer->land->nama }}</td>
                                    <td>{{ $costumer->blok }}</td>
                                    <td>{{ $costumer->besar_angsuran }}</td>
                                    <td>{{ $costumer->tanggal_jatuh_tempo }}</td>
                                    <td>
                                        <a href="/dashboard/costumers/{{ $costumer->id }}"
                                            class="btn btn-info btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-eye"></i>
                                            </span>
                                        </a>
                                        <a href="/dashboard/costumers/{{ $costumer->id }}/edit"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-pen-fill"></i>
                                            </span>
                                        </a>

                                        @can('admin')
                                            <form action="/dashboard/costumers/{{ $costumer->id }}" method="post"
                                                class="d-inline">
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
