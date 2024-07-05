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
                            Properti
                        </h5>
                    </div>

                    <div class="col-md-6 text-end">
                        <a class="btn app-btn-secondary" href="/dashboard/properties/create">
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
                                <th>No</th>
                                <th>Nama Properti</th>
                                <th>Kota</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Properti</th>
                                <th>Kota</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $property->nama }}</td>
                                    <td>{{ $property->kota }}</td>
                                    <td>Rp. {{ number_format($property->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="/dashboard/properties/{{ $property->id }}"
                                            class="btn btn-info btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-eye"></i>
                                            </span>
                                        </a>

                                        <a href="/dashboard/properties/{{ $property->id }}/edit"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-pen-fill"></i>
                                            </span>
                                        </a>

                                        <form action="/dashboard/properties/{{ $property->id }}" method="post"
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
