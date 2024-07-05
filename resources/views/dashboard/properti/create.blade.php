@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Properti</h1>
    @else
        <h1 class="app-page-title text-white">Properti</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/properties" method="post" class="settings-form" enctype="multipart/form-data">
                        @csrf

                        {{-- <h5>Data Pelanggan</h5> --}}

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Properti</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Masukan Nama Properti (cth : Rumah Fulan)" name="nama"
                                value="{{ old('nama') }}">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Properti</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                                name="foto" value="{{ old('foto') }}">

                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="Masukkan Alamat Properti" name="alamat">{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota"
                                name="kota" value="{{ old('kota') }}"
                                placeholder="Masukkan Nama Kota (cth : Pekanbaru)">

                            @error('kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                name="harga" value="{{ old('harga') }}"
                                placeholder="Masukkan Harga Properti (cth : 1000000)">

                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                placeholder="Masukkan deskripsi Properti" name="deskripsi">{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
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
    <hr class="my-4">

    <script>
        function previewImage() {
            const foto_ktp = document.querySelector('#foto_ktp');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader(); // untuk mengambil data gambar
            oFReader.readAsDataURL(foto_ktp.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewAkad() {
            const foto_akad = document.querySelector('#foto_akad');
            const preview_akad = document.querySelector('#preview-akad');

            preview_akad.style.display = 'block';

            const oFReader = new FileReader(); // untuk mengambil data gambar
            oFReader.readAsDataURL(foto_akad.files[0]);

            oFReader.onload = function(oFREvent) {
                preview_akad.src = oFREvent.target.result;
            }
        }

        const hargaDealInput = document.getElementById("harga_deal");
        const nominalInput = document.getElementById("nominal");
        const sisaAngsuranInput = document.getElementById("sisa_angsuran");

        hargaDealInput.addEventListener("input", () => {
            updateSisaAngsuran();
        });

        nominalInput.addEventListener("input", () => {
            updateSisaAngsuran();
        });

        function updateSisaAngsuran() {
            const hargaDeal = parseFloat(hargaDealInput.value) || 0;
            const nominal = parseFloat(nominalInput.value) || 0;
            // const sisaAngsuran = nominal - hargaDeal;
            const sisaAngsuran = hargaDeal - nominal;
            sisaAngsuranInput.value = sisaAngsuran.toFixed(2);
        }
    </script>
@endsection
