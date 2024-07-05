@extends('dashboard.layouts.main')

@section('content')
    <h1 class="app-page-title">Batal atau Mundur</h1>
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
                            <label for="surat_pembatalan" class="form-label">Nomor Surat Pembatalan</label>
                            <input type="text" class="form-control" id="surat_pembatalan" placeholder="Masukkan No Surat"
                                required>
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
                            <label for="tanggal" class="form-label">Tanggal Pembatalan</label>
                            <input type="date" class="form-control" id="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="alasan_batal" class="form-label">Alasan Pembatalan</label>
                            <textarea class="form-control" id="alasan_batal" placeholder="Masukkan Alasan Batal atau Mundur"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_uang_telah_disetor" class="form-label">Jumlah Uang Telah Disetor</label>
                            <input type="text" class="form-control" id="jumlah_uang_telah_disetor" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nilai_pengembalian" class="form-label">Nilai Pengembalian (Rp)</label>
                            <input type="text" class="form-control" id="nilai_pengembalian"
                                placeholder="Nominal Uang Yang Harus Dikembalikan (cth : 1000000)" required>
                        </div>
                        <div class="mb-3">
                            <label for="surat_pembatalan" class="form-label">Upload Surat Pembatalan</label>
                            <input type="file" class="form-control" id="surat_pembatalan">
                        </div>
                        <div class="mb-3">
                            <label for="screenshot_pemberitahuan" class="form-label">Upload Bukti Pemberitahuan
                                (Screenshot)</label>
                            <input type="file" class="form-control" id="screenshot_pemberitahuan" required>
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->

        </div>
    </div><!--//row-->
    <hr class="my-4">
@endsection
