@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Edit Form Batal atau Mundur</h1>
    @else
        <h1 class="app-page-title text-white">Edit Form Batal atau Mundur</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/cancels/{{ $cancel->id }}" method="post" class="settings-form"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        {{-- <h5>Data Pelanggan</h5> --}}

                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>

                            <select class="form-select @error('costumer_id') is-invalid @enderror"
                                aria-label="Default select example" id="costumer_id" name="costumer_id">
                                @foreach ($costumers as $costumer)
                                    @if (old('costumer_id', $cancel->costumer_id) == $costumer->id)
                                        <option value="{{ $costumer->id }}" selected>{{ $costumer->nama }}</option>
                                    @else
                                        <option value="{{ $costumer->id }}">{{ $costumer->nama }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('costumer_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_surat_pembatalan" class="form-label">No. Surat Pembatalan</label>
                            <input type="text" class="form-control @error('no_surat_pembatalan') is-invalid @enderror"
                                id="no_surat_pembatalan" placeholder="Masukan Nomor Surat Pembatalan"
                                name="no_surat_pembatalan"
                                value="{{ old('no_surat_pembatalan', $cancel->no_surat_pembatalan) }}">

                            @error('no_surat_pembatalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Lahan</label>

                            <select class="form-select @error('land_id') is-invalid @enderror"
                                aria-label="Default select example" id="land_id" name="land_id">
                                @foreach ($lands as $land)
                                    @if (old('land_id', $cancel->land_id) == $land->id)
                                        <option value="{{ $land->id }}" selected>{{ $land->nama }}</option>
                                    @else
                                        <option value="{{ $land->id }}">{{ $land->nama }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('land_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="blok" class="form-label">Blok</label>
                            <input type="text" class="form-control @error('blok') is-invalid @enderror" id="blok"
                                placeholder="Masukan Nama Blok" name="blok" value="{{ old('blok', $cancel->blok) }}">

                            @error('blok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kantor_pelayanan" class="form-label">Kantor Pelayanan</label>
                            <input type="text" class="form-control @error('kantor_pelayanan') is-invalid @enderror"
                                id="kantor_pelayanan" placeholder="Masukan Nama Kantor Pelayanan" name="kantor_pelayanan"
                                value="{{ old('kantor_pelayanan', $cancel->kantor_pelayanan) }}">

                            @error('kantor_pelayanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pembatalan" class="form-label">Tanggal Pembatalan</label>
                            <input type="date" class="form-control @error('tanggal_pembatalan') is-invalid @enderror"
                                id="tanggal_pembatalan" name="tanggal_pembatalan" required
                                value="{{ old('tanggal_pembatalan', $cancel->tanggal_pembatalan) }}">

                            @error('tanggal_pembatalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alasan_batal" class="form-label">Alasan Batal</label>
                            <textarea class="form-control @error('alasan_batal') is-invalid @enderror" id="alasan_batal"
                                placeholder="Masukkan Alasan Batal" name="alasan_batal">{{ old('alasan_batal', $cancel->alasan_batal) }}</textarea>

                            @error('alasan_batal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_uang_yang_telah_disetor" class="form-label">Jumlah Uang Yang Telah Disetor
                                (Rp)</label>
                            <input type="text"
                                class="form-control @error('jumlah_uang_yang_telah_disetor') is-invalid @enderror"
                                id="jumlah_uang_yang_telah_disetor"
                                placeholder="Masukan Jumlah Uang Yang Telah Disetor (cth : 1000000)"
                                name="jumlah_uang_yang_telah_disetor"
                                value="{{ old('jumlah_uang_yang_telah_disetor', $cancel->jumlah_uang_yang_telah_disetor) }}">

                            @error('jumlah_uang_yang_telah_disetor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nilai_pengembalian" class="form-label">Nilai Pengembalian</label>
                            <input type="text" class="form-control @error('nilai_pengembalian') is-invalid @enderror"
                                id="nilai_pengembalian" placeholder="Masukan Nilai Pengembalian" name="nilai_pengembalian"
                                value="{{ old('nilai_pengembalian', $cancel->nilai_pengembalian) }}">

                            @error('nilai_pengembalian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dokumen_pembatalan" class="form-label">Dokumen Pembatalan</label>

                            <input type="hidden" name="oldFile" value="{{ $cancel->dokumen_pembatalan }}">

                            <input type="file" id="dokumen_pembatalan" name="dokumen_pembatalan"
                                class="form-control @error('dokumen_pembatalan') is-invalid @enderror" accept="file/*"
                                value="{{ old('dokumen_pembatalan', $cancel->dokumen_pembatalan) }}">

                            @error('dokumen_pembatalan')
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
    </script>
@endsection
