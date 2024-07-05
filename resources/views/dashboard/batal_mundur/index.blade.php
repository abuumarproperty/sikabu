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
                            Batal atau Mundur
                        </h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn app-btn-secondary" href="/dashboard/cancels/create">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg>
                            Data Baru
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
                                <th>Nama</th>
                                <th>Tanggal Pembatalan</th>
                                <th>Lahan</th>
                                <th>Blok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Pembatalan</th>
                                <th>Lahan</th>
                                <th>Blok</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($cancels as $cancel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cancel->costumer->nama }}</td>
                                    <td>{{ $cancel->tanggal_pembatalan }}</td>
                                    <td>{{ $cancel->land->nama }}</td>
                                    <td>{{ $cancel->blok }}</td>
                                    <td>
                                        <a href="/dashboard/cancels/{{ $cancel->id }}"
                                            class="btn btn-info btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-eye"></i>
                                            </span>
                                        </a>

                                        <a href="/dashboard/cancels/{{ $cancel->id }}/edit"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white">
                                                <i class="bi bi-pen-fill"></i>
                                            </span>
                                        </a>

                                        @can('admin')
                                            <form action="/dashboard/cancels/{{ $cancel->id }}" method="post"
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
