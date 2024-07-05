@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Edit Data Lahan</h1>
    @else
        <h1 class="app-page-title text-white">Edit Data Lahan</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/lands/{{ $land->id }}" method="post" class="settings-form">
                        @method('put')
                        @csrf

                        <h5>Ubah Data Lahan</h5>

                        <div class="mb-3">
                            <label for="nama_lahan" class="form-label">Nama Lahan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama_lahan"
                                placeholder="Masukkan Nama Lahan (cth : Al Madinah 4)" name="nama" autofocus required
                                value="{{ old('nama', $land->nama) }}">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan', $land->keterangan) }}</textarea>

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->

        </div>
    </div><!--//row-->
    <hr class="my-4 mb-5">
    <div class="mb-5"></div>
@endsection
