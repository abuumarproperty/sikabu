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
                    <div class="col-md-4">
                        <h5 class="m-0 font-weight-bold text-primary py-2">
                            Data Angsuran
                        </h5>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3 text-end">
                        @can('admin')
                            <div class="dropdown">
                                <button class="btn app-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Download Laporan
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="/dashboard/pay_installments/download/laporan-bulanan/pekanbaru">
                                            <span class="icon my-2">
                                                <i class="bi bi-printer"></i>
                                            </span>
                                            Download Laporan Kantor Pusat Pekanbaru
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="/dashboard/pay_installments/download/laporan-bulanan/dumai">
                                            <span class="icon my-2">
                                                <i class="bi bi-printer"></i>
                                            </span>
                                            Download Laporan Kantor Cabang Dumai
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="/dashboard/pay_installments/download/laporan-bulanan/rohul">
                                            <span class="icon my-2">
                                                <i class="bi bi-printer"></i>
                                            </span>
                                            Download Laporan Kantor Cabang Rohul
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                    </div>
                    <div class="col-md-3 text-center">
                        <a class="btn app-btn-secondary" href="/dashboard/pay_installments/create">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                                <path
                                    d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1m-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1" />
                            </svg>
                            Bayar Angsuran
                        </a>
                    </div>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kantor</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Angsuran Ke</th>
                                <th>Nominal</th>
                                <th>Sisa Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Kantor</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Angsuran Ke</th>
                                <th>Nominal</th>
                                <th>Sisa Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- @if ($pay_installments[0]->costumer !== 0) --}}
                            @if ($costumers)
                                {{-- @dd($pay_installments) --}}
                                @foreach ($pay_installments as $pay_installment)
                                    {{-- @dd($pay_installment->tanggal_pembayaran) --}}
                                    <tr>
                                        <td>{{ $pay_installment->costumer->nama }}</td>
                                        <td>{{ $pay_installment->costumer->kantor_pelayanan }}</td>
                                        <td>{{ $pay_installment->tanggal_pembayaran }}</td>
                                        <td>{{ $pay_installment->angsuran_ke }}</td>
                                        <td>Rp. {{ number_format($pay_installment->nominal, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($pay_installment->sisa_angsuran, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="/dashboard/pay_installments/{{ $pay_installment->id }}"
                                                class="btn btn-info btn-icon-split">
                                                <span class="icon text-white">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                            </a>

                                            <a href="/dashboard/pay_installments/{{ $pay_installment->id }}/edit"
                                                class="btn btn-warning btn-icon-split">
                                                <span class="icon text-white">
                                                    <i class="bi bi-pen-fill"></i>
                                                </span>
                                            </a>

                                            @can('admin')
                                                <form action="/dashboard/pay_installments/{{ $pay_installment->id }}"
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
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!--//tab-content-->
@endsection
