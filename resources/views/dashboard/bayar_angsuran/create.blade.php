@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Bayar Angsuran</h1>
    @else
        <h1 class="app-page-title text-white">Bayar Angsuran</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/pay_installments" method="post" class="settings-form"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- <h5>Data Pelanggan</h5> --}}

                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>

                            <select class="form-select @error('costumer_id') is-invalid @enderror"
                                aria-label="Default select example" id="costumer_id" name="costumer_id">
                                @foreach ($costumers as $costumer)
                                    <option value="{{ $costumer->id }}">{{ $costumer->nama }}</option>
                                @endforeach
                            </select>

                            @error('costumer_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror"
                                id="tanggal_pembayaran" name="tanggal_pembayaran" required
                                value="{{ old('tanggal_pembayaran') }}">

                            @error('tanggal_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Disetorkan Untuk</label>

                            <select class="form-select @error('deposit_id') is-invalid @enderror"
                                aria-label="Default select example" id="deposit_id" name="deposit_id">
                                @foreach ($deposits as $deposit)
                                    <option value="{{ $deposit->id }}">{{ $deposit->nama }}</option>
                                @endforeach
                            </select>

                            @error('deposit_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="angsuran_ke" class="form-label">Angsuran Ke</label>
                            <input type="number" class="form-control @error('angsuran_ke') is-invalid @enderror"
                                id="angsuran_ke" placeholder="Masukan Angka Angsuran ke Berapa (cth : 3), Khusus kredit"
                                name="angsuran_ke" value="{{ old('angsuran_ke') }}">

                            @error('angsuran_ke')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Pembayaran</label>

                            <select class="form-select @error('payment_id') is-invalid @enderror"
                                aria-label="Default select example" id="payment_id" name="payment_id">
                                @foreach ($payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->nama }}</option>
                                @endforeach
                            </select>

                            @error('payment_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_deal" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control @error('harga_deal') is-invalid @enderror"
                                id="harga_deal"
                                placeholder="Masukan Harga Deal, Jika Memiliki Sisa Angsuran Maka Masukkan Sisa Angsuran. (cth : 1000000)"
                                name="harga_deal" value="{{ old('harga_deal') }}">

                            @error('harga_deal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                                placeholder="Masukan Nominal Pembayaran (cth : 1000000)" name="nominal"
                                value="{{ old('nominal') }}">

                            @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sisa_angsuran" class="form-label">Sisa Angsuran</label>
                            <input type="text" class="form-control @error('sisa_angsuran') is-invalid @enderror"
                                id="sisa_angsuran" placeholder="Masukan Sisa Pembayaran (cth : 1000000)"
                                name="sisa_angsuran" value="{{ old('sisa_angsuran') }}">

                            @error('sisa_angsuran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="petugas" class="form-label">Petugas</label>
                            <input type="text" class="form-control @error('petugas') is-invalid @enderror" id="petugas"
                                placeholder="Masukan Nama Petugas (cth : John Doe)" name="petugas"
                                value="{{ old('petugas') }}">

                            @error('petugas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                placeholder="Masukkan Keterangan" name="keterangan">{{ old('keterangan') }}</textarea>

                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <input type="text" class="form-control @error('catatan') is-invalid @enderror"
                                id="catatan" placeholder="Masukan Catatan Yang Diinginkan" name="catatan"
                                value="{{ old('catatan') }}">

                            @error('catatan')
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
