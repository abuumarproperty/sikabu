@extends('dashboard.layouts.main')

@section('content')
    {{-- @dd($all_data) --}}
    <div class="tab-content" id="orders-table-tab-content">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="m-0 font-weight-bold text-primary py-2">
                            Data Tunggakan
                        </h5>
                    </div>
                    @can('admin')
                        <div class="col-md-5 text-end">
                            <div class="row">
                                <div class="col-md-6">

                                    <a class="btn app-btn-secondary" href="/dashboard/export-tunggakanPerbulan">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>
                                        Download Laporan Perbulan
                                    </a>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a class="btn app-btn-secondary" href="/dashboard/export-tunggakanPertahun">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>
                                        Download Laporan Pertahun
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endcan


                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" width="100%" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Lahan</th>
                                <th>Kantor Pelayanan</th>
                                <th>No. HP</th>
                                <th>Besar Angsuran</th>
                                <th>Sisa Angsuran</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Lahan</th>
                                <th>Kantor Pelayanan</th>
                                <th>No. HP</th>
                                <th>Besar Angsuran</th>
                                <th>Sisa Angsuran</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($all_data as $rekap_tunggakan)
                                <tr>
                                    <td>{{ $rekap_tunggakan->costumer->nama }}</td>
                                    <td>{{ $rekap_tunggakan->costumer->land->nama }}</td>
                                    <td>{{ $rekap_tunggakan->costumer->kantor_pelayanan }}</td>
                                    <td>{{ $rekap_tunggakan->costumer->no_hp_satu }}</td>
                                    <td>Rp. {{ number_format($rekap_tunggakan->costumer->besar_angsuran, 0, ',', '.') }}
                                    </td>
                                    <td>Rp. {{ number_format($rekap_tunggakan->sisa_angsuran, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!--//tab-content-->
@endsection
