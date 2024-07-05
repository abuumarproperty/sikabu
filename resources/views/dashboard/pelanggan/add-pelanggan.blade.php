@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Tambah Data Pelanggan (Akad)</h1>
    @else
        <h1 class="app-page-title text-white">Tambah Data Pelanggan (Akad)</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/costumers" method="post" class="settings-form" enctype="multipart/form-data">
                        @csrf

                        <h5>Data Pelanggan</h5>

                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama_pelanggan" placeholder="Masukkan Nama Pelanggan (cth : John Doe)" name="nama"
                                autofocus required value="{{ old('nama') }}">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                            <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik"
                                placeholder="Masukan NIK Pelanggan (cth: 1409xxxx)" name="nik" required
                                value="{{ old('nik') }}">

                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                                placeholder="Masukan Umur Pelanggan (cth : 20)" name="umur" required
                                value="{{ old('umur') }}">

                            @error('umur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') @enderror" id="pekerjaan"
                                placeholder="Masukan Pekerjaan Pelanggan (cth : IT Consultant)" name="pekerjaan" required
                                value="{{ old('pekerjaan') }}">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="Masukkan Alamat Pelanggan" name="alamat">{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="saksi_satu" class="form-label">Saksi Satu</label>
                            <input type="text" class="form-control @error('saksi_satu') is-invalid @enderror"
                                id="saksi_satu" placeholder="Masukan Nama Saksi Satu (cth : John Doe)" name="saksi_satu"
                                required value="{{ old('saksi_satu') }}">

                            @error('saksi_satu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="saksi_dua" class="form-label">Saksi Dua</label>
                            <input type="text" class="form-control @error('saksi_dua') is-invalid @enderror"
                                id="saksi_dua" placeholder="Masukan Nama Saksi Dua (cth : John Doe)" name="saksi_dua"
                                required value="{{ old('saksi_dua') }}">

                            @error('saksi_dua')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto_ktp" class="form-label">Upload KTP</label>

                            <img class="img-preview img-fluid mb-3 col-sm-5">

                            <input type="file" class="form-control  @error('foto_ktp') is-invalid @enderror"
                                id="foto_ktp" name="foto_ktp" value="{{ old('foto_ktp') }}" onchange="previewImage()">

                            @error('foto_ktp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <h5>Data Lahan</h5>

                        <div class="mb-3">
                            <label for="no_akad" class="form-label">No Akad</label>
                            <input type="text" class="form-control @error('no_akad') is-invalid @enderror" id="no_akad"
                                placeholder="Masukan Nomor Akad" name="no_akad" required value="{{ old('no_akad') }}">

                            @error('no_akad')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lahan" class="form-label">Lahan (Kavling)</label>

                            <select class="form-select @error('land_id') is-invalid @enderror"
                                aria-label="Default select example" id="land_id" name="land_id">
                                @foreach ($lands as $land)
                                    <option value="{{ $land->id }}">{{ $land->nama }}</option>
                                @endforeach
                            </select>

                            @error('land_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kantor_pelayanan" class="form-label">Kantor Pelayanan</label>
                            <input type="text" class="form-control @error('kantor_pelayanan') is-invalid @enderror"
                                id="kantor_pelayanan" placeholder="Masukan Nama Kantor Pelayanan" name="kantor_pelayanan"
                                required value="{{ old('kantor_pelayanan') }}">

                            @error('kantor_pelayanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="blok" class="form-label">Blok</label>
                            <input type="text" class="form-control @error('blok') is-invalid @enderror"
                                id="blok" placeholder="Masukan Nama Blok" name="blok" required
                                value="{{ old('blok') }}">

                            @error('blok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">QTT</label>
                            <input type="text" class="form-control @error('kuantitas') is-invalid @enderror"
                                id="quantity" placeholder="Masukan Jumlah Kuantitas Pembelian (cth : 10)"
                                name="kuantitas" required value="{{ old('kuantitas') }}">

                            @error('kuantitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual (Deal)</label>
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror"
                                id="harga_jual" placeholder="Masukan Harga Jual" name="harga_jual" required
                                value="{{ old('harga_jual') }}">

                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="potongan" class="form-label">Potongan Harga</label>
                            <input type="text" class="form-control @error('potongan') is-invalid @enderror"
                                id="potongan" placeholder="Dikosongkan Jika Tidak Ada" name="potongan"
                                value="{{ old('potongan') }}">

                            @error('potongan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_setelah_pemotongan" class="form-label">Harga Setelah Pemotongan</label>
                            <input type="text"
                                class="form-control @error('harga_setelah_pemotongan') is-invalid @enderror"
                                id="harga_setelah_pemotongan" name="harga_setelah_pemotongan"
                                placeholder="Harga Setelah Pemotongan" required
                                value="{{ old('harga_setelah_pemotongan') }}">

                            @error('harga_setelah_pemotongan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="purchase_id" class="form-label">Status Pembelian</label>
                            <select class="form-select @error('purchase_id') is-invalid @enderror"
                                aria-label="Default select example" id="purchase_id" name="purchase_id">
                                @foreach ($purchases as $purchase)
                                    <option value="{{ $purchase->id }}">{{ $purchase->nama }}</option>
                                @endforeach
                            </select>

                            @error('purchase_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tenor" class="form-label">Tenor</label>

                            <input type="text" class="form-control @error('tenor') is-invalid @enderror"
                                id="tenor" name="tenor" placeholder="Masukkan Tenor Pembayaran (cth : 12 Bulan)"
                                required value="{{ old('tenor') }}">

                            @error('tenor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="besar_angsuran" class="form-label">Besar Angsuran (Rp)</label>
                            <input type="text" class="form-control @error('besar_angsuran') is-invalid @enderror"
                                id="besar_angsuran" placeholder="Masukan Besar Angsuran (cth : 1000000)"
                                name="besar_angsuran" required value="{{ old('besar_angsuran') }}">

                            @error('besar_angsuran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                            <input type="date" class="form-control @error('tanggal_jatuh_tempo') is-invalid @enderror"
                                id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" required
                                value="{{ old('tanggal_jatuh_tempo') }}">

                            @error('tanggal_jatuh_tempo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_hp_satu" class="form-label">Nomor Handphone 1</label>
                            <input type="text" class="form-control @error('no_hp_satu') is-invalid @enderror"
                                id="no_hp_satu" placeholder="Masukan Nomor Handphone 1 (cth : 08xxxxxxxx)"
                                name="no_hp_satu" required value="{{ old('no_hp_satu') }}">

                            @error('no_hp_satu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_hp_dua" class="form-label">Nomor Handphone 2</label>
                            <input type="text" class="form-control @error('no_hp_dua') is-invalid @enderror"
                                id="no_hp_dua" placeholder="Masukan Nomor Handphone 1 (cth : 08xxxxxxxx)"
                                name="no_hp_dua" value="{{ old('no_hp_dua') }}">

                            @error('no_hp_dua')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mediator" class="form-label">Agen / Mediator</label>
                            <input type="text" class="form-control @error('agen') is-invalid @enderror"
                                id="mediator" placeholder="Masukan Nama Agen atau Mediator" name="agen" required
                                value="{{ old('agen') }}">

                            @error('agen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="dokumen_akad_satu" class="form-label">Dokumen Akad 1</label>
                                    <input type="file"
                                        class="form-control @error('dokumen_akad_satu') is-invalid @enderror"
                                        id="dokumen_akad_satu" name="dokumen_akad_satu[]"
                                        value="{{ old('dokumen_akad_satu') }}" accept="file/*" multiple>

                                    @error('dokumen_akad_satu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="dokumen_akad_dua" class="form-label">Dokumen Akad 2</label>
                                    <input type="file"
                                        class="form-control @error('dokumen_akad_dua') is-invalid @enderror"
                                        id="dokumen_akad_dua" name="dokumen_akad_dua[]"
                                        value="{{ old('dokumen_akad_dua') }}" accept="file/*" multiple>

                                    @error('dokumen_akad_dua')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="dokumen_akad_tiga" class="form-label">Dokumen Akad 3</label>
                                    <input type="file"
                                        class="form-control @error('dokumen_akad_tiga') is-invalid @enderror"
                                        id="dokumen_akad_tiga" name="dokumen_akad_tiga[]"
                                        value="{{ old('dokumen_akad_tiga') }}" accept="file/*" multiple>

                                    @error('dokumen_akad_tiga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="foto_akad_satu" class="form-label">Upload Foto Akad 1</label>

                                    <img class="img-fluid mb-3 col-sm-5" id="preview-akad">

                                    <input type="file"
                                        class="form-control @error('foto_akad_satu') is_invalid @enderror"
                                        id="foto_akad_satu" name="foto_akad_satu[]" value="{{ old('foto_akad_satu') }}"
                                        onchange="previewAkad()" accept="image/*" multiple>

                                    @error('foto_akad_satu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="foto_akad_dua" class="form-label">Upload Foto Akad 2</label>

                                    <img class="img-fluid mb-3 col-sm-5" id="preview-akad">

                                    <input type="file"
                                        class="form-control @error('foto_akad_dua') is_invalid @enderror"
                                        id="foto_akad_dua" name="foto_akad_dua[]" value="{{ old('foto_akad_dua') }}"
                                        onchange="previewAkad()" accept="image/*" multiple>

                                    @error('foto_akad_dua')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="foto_akad_tiga" class="form-label">Upload Foto Akad 3</label>

                                    <img class="img-fluid mb-3 col-sm-5" id="preview-akad">

                                    <input type="file"
                                        class="form-control @error('foto_akad_tiga') is_invalid @enderror"
                                        id="foto_akad_tiga" name="foto_akad_tiga[]" value="{{ old('foto_akad_tiga') }}"
                                        onchange="previewAkad()" accept="image/*" multiple>

                                    @error('foto_akad_tiga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="dokumen_pendukung_satu" class="form-label">Upload Dokumen
                                        Pendukung 1</label>
                                    <input type="file"
                                        class="form-control @error('dokumen_pendukung_satu') is-invalid @enderror"
                                        id="dokumen_pendukung_satu" name="dokumen_pendukung_satu[]"
                                        value="{{ old('dokumen_pendukung_satu') }}" accept="file/*" multiple>

                                    @error('dokumen_pendukung_satu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="dokumen_pendukung_dua" class="form-label">Upload Dokumen Pendukung
                                        2</label>
                                    <input type="file"
                                        class="form-control @error('dokumen_pendukung_dua') is-invalid @enderror"
                                        id="dokumen_pendukung_dua" name="dokumen_pendukung_dua[]"
                                        value="{{ old('dokumen_pendukung_dua') }}" accept="file/*" multiple>

                                    @error('dokumen_pendukung_dua')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="dokumen_pendukung_tiga" class="form-label">Upload Dokumen
                                        Pendukung 3</label>
                                    <input type="file"
                                        class="form-control @error('dokumen_pendukung_tiga') is-invalid @enderror"
                                        id="dokumen_pendukung_tiga" name="dokumen_pendukung_tiga[]"
                                        value="{{ old('dokumen_pendukung_tiga') }}" accept="file/*" multiple>

                                    @error('dokumen_pendukung_tiga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
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

        const hargaDealInput = document.getElementById("harga_jual");
        const nominalInput = document.getElementById("potongan");
        const sisaAngsuranInput = document.getElementById("harga_setelah_pemotongan");

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
