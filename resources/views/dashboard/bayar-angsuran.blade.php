@extends('dashboard.layouts.main')

@section('content')
    <h1 class="app-page-title">Bayar Angsuran</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form">
                        <div class="mb-3">
                            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" id="tanggal_pembayaran" required>
                        </div>
                        <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select class="form-select" aria-label="Default select example" id="status_pembayaran">
                                <option selected>-- Select --</option>
                                <option value="Angsuran">Angsuran</option>
                                <option value="DP">DP</option>
                                <option value="Panjar (Booking)">Panjar (Booking)</option>
                                <option value="Pelunasan">Pelunasan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="angsuran_ke" class="form-label">Angsuran Ke</label>
                            <input type="text" class="form-control" id="angsuran_ke"
                                placeholder="Khusus Kredit (cth : 2)" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                            <select class="form-select" aria-label="Default select example" id="jenis_pembayaran">
                                <option selected>-- Select --</option>
                                <option value="Tunai">Tunai</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran (Rp)</label>
                            <input type="text" class="form-control" id="jumlah_pembayaran"
                                placeholder="Masukkan Nominal Pembayaran (cth : 1000000)" required>
                        </div>
                        <div class="mb-3">
                            <label for="petugas" class="form-label">Petugas</label>
                            <input type="text" class="form-control" id="petugas"
                                placeholder="Masukkan Nama Petugas (cth : John Doe)" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" placeholder="Keterangan"></textarea>
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->

        </div>
    </div><!--//row-->
    <hr class="my-4">
@endsection
