@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Dokumentasi</h1>
    @else
        <h1 class="app-page-title text-white">Dokumentasi</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/documentation/{{ $documentation->id }}" method="post" class="settings-form"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Nama File</label>

                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                placeholder="Masukkan Nama File (cth : Dokumentasi Pembelian Tanah)" name="judul"
                                autofocus required value="{{ old('judul', $documentation->judul) }}">

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Dokumentasi</label>

                            <input type="hidden" name="oldFoto" value="{{ $documentation->foto }}">

                            <input type="file" id="foto" name="foto"
                                class="form-control @error('foto') is-invalid @enderror" accept="image/*"
                                value="{{ old('foto', $documentation->foto) }}">

                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="Masukkan Keterangan (sebagai notifikasi kepada karyawan)"
                                name="keterangan" required value="{{ old('keterangan', $documentation->keterangan) }}">

                            @error('keterangan')
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
