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
                            Data Pelanggan
                        </h5>
                    </div>
                    @can('admin')
                        <div class="col-md-6 text-end">
                            <a class="btn app-btn-secondary" href="/dashboard/costumers/download/laporan-penjualan">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Download Laporan
                            </a>
                        </div>
                    @endcan
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Lahan</th>
                                <th>Harga Deal</th>
                                <th>Besar Angsuran</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Lahan</th>
                                <th>Harga Deal</th>
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
                                    <td>Rp. {{ number_format($costumer->harga_setelah_pemotongan, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($costumer->besar_angsuran, 0, ',', '.') }}</td>
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

                                            <a href="/dashboard/costumer/file/{{ $costumer->id }}"
                                                class="btn btn-success btn-icon-split">
                                                <span class="icon text-white">
                                                    <i class="bi bi-printer"></i>
                                                </span>
                                            </a>
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
