@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Surat - Surat Umum</h1>
    @else
        <h1 class="app-page-title text-white">Surat - Surat Umum</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/docs/{{ $doc->id }}" method="post" class="settings-form"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <h5>Ubah Dokumen</h5>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Nama File</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                placeholder="Masukkan Nama File (cth : Surat Tugas)" name="judul" autofocus required
                                value="{{ old('judul', $doc->judul) }}">

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dokumen" class="form-label">Dokumen</label>

                            <input type="hidden" name="oldDokumen" value="{{ $doc->dokumen }}">

                            <input type="file" id="dokumen" name="dokumen"
                                class="form-control @error('dokumen') is-invalid @enderror" accept="file/*"
                                value="{{ old('dokumen', $doc->dokumen) }}">

                            @error('dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="Masukkan Keterangan (sebagai notifikasi kepada karyawan)"
                                name="keterangan" required value="{{ old('keterangan', $doc->keterangan) }}">

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
