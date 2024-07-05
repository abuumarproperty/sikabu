@extends('dashboard.layouts.main')

@section('content')
    <h1 class="app-page-title">Penyerahan Surat Lahan</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form">
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <select class="form-select" aria-label="Default select example" id="nama_pelanggan">
                                <option selected>-- Select --</option>
                                <option value="Didi">Didi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lahan" class="form-label">Lahan</label>
                            <input type="text" class="form-control" id="lahan" placeholder="Masukkan Lahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="blok" class="form-label">Blok</label>
                            <input type="text" class="form-control" id="blok" placeholder="Masukkan Blok" required>
                        </div>
                        <div class="mb-3">
                            <label for="kantor_pelayanan" class="form-label">Kantor Pelayanan</label>
                            <input type="text" class="form-control" id="kantor_pelayanan"
                                placeholder="Masukkan Nama Kantor Pelayanan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_yang_menyerahkan" class="form-label">Nama Yang Menyerahkan</label>
                            <input type="text" class="form-control" id="nama_yang_menyerahkan"
                                placeholder="Masukkan Yang Menyerahkan Berkas" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_yang_menerima" class="form-label">Nama Yang Menerima</label>
                            <input type="text" class="form-control" id="nama_yang_menerima"
                                placeholder="Masukkan Yang Menerima Berkas" required>
                        </div>
                        <div class="mb-3">
                            <label for="surat_kuasa" class="form-label">Upload Surat Kuasa (Jika Dikuasakan)</label>
                            <input type="file" class="form-control" id="surat_kuasa">
                        </div>
                        <div class="mb-3">
                            <label for="surat_tanah" class="form-label">Upload Surat Tanah</label>
                            <input type="file" class="form-control" id="surat_tanah" required>
                        </div>
                        <div class="mb-3">
                            <label for="berita_acara_serah_terima" class="form-label">Upload Berita Acara Serah
                                Terima</label>
                            <input type="file" class="form-control" id="berita_acara_serah_terima" required>
                        </div>
                        <div class="mb-3">
                            <label for="serah_terima" class="form-label">Upload Foto Serah Terima</label>
                            <input type="file" class="form-control" id="serah_terima" required>
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->

        </div>
    </div><!--//row-->
    <hr class="my-4">
@endsection
