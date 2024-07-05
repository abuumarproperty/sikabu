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
                            Dokumentasi Akad
                        </h5>
                    </div>
                    <div class="col-md-5 text-end">
                        <a class="btn app-btn-secondary" href="/dashboard/documentation/create">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-upload me-2"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                            </svg>
                            Upload Foto
                        </a>
                    </div>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" width="100%" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($documentations as $documentation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $documentation->judul }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $documentation->foto) }}"
                                            alt="{{ $documentation->judul }}" width="100">
                                    </td>
                                    <td>{{ $documentation->keterangan }}</td>
                                    <td>
                                        <a class="btn btn-warning text-white"
                                            href="/dashboard/documentation/{{ $documentation->id }}/edit">Edit</a>
                                        <form action="/dashboard/documentation/{{ $documentation->id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf

                                            <button type="submit" class="btn btn-danger text-white"
                                                onclick="return confirm('Are you sure?')">Hapus</button>
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
