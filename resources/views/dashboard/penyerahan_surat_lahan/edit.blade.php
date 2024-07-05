@extends('dashboard.layouts.main')

@section('content')
    @if (Auth::user()->is_admin == 0)
        <h1 class="app-page-title">Edit Data</h1>
    @else
        <h1 class="app-page-title text-white">Edit Data</h1>
    @endif

    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/land_certificates/{{ $land_certificate->id }}" method="post"
                        class="settings-form" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        {{-- <h5>Data Pelanggan</h5> --}}

                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>

                            <select class="form-select @error('costumer_id') is-invalid @enderror"
                                aria-label="Default select example" id="costumer_id" name="costumer_id">
                                @foreach ($costumers as $costumer)
                                    @if (old('costumer_id', $land_certificate->costumer_id) == $costumer->id)
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
                            <label class="form-label">Lahan</label>

                            <select class="form-select @error('land_id') is-invalid @enderror"
                                aria-label="Default select example" id="land_id" name="land_id">
                                @foreach ($lands as $land)
                                    @if (old('land_id', $land_certificate->land_id) == $land->id)
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
                                placeholder="Masukan Nama Yang menerima (cth : John Doe)" name="blok"
                                value="{{ old('blok', $land_certificate->blok) }}">

                            @error('blok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kantor_pelayanan" class="form-label">Kantor Pelayanan</label>
                            <input type="text" class="form-control @error('kantor_pelayanan') is-invalid @enderror"
                                id="kantor_pelayanan" placeholder="Masukan Nama Yang menerima (cth : John Doe)"
                                name="kantor_pelayanan"
                                value="{{ old('kantor_pelayanan', $land_certificate->kantor_pelayanan) }}">

                            @error('kantor_pelayanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" required value="{{ old('tanggal', $land_certificate->tanggal) }}">

                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_yang_menyerahkan" class="form-label">Nama Yang Menyerahkan</label>
                            <input type="text" class="form-control @error('nama_yang_menyerahkan') is-invalid @enderror"
                                id="nama_yang_menyerahkan" placeholder="Masukan Nama Yang Menyerahkan (cth : John Doe)"
                                name="nama_yang_menyerahkan"
                                value="{{ old('nama_yang_menyerahkan', $land_certificate->nama_yang_menyerahkan) }}">

                            @error('nama_yang_menyerahkan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_yang_menerima" class="form-label">Nama Yang Menerima</label>
                            <input type="text" class="form-control @error('nama_yang_menerima') is-invalid @enderror"
                                id="nama_yang_menerima" placeholder="Masukan Nama Yang menerima (cth : John Doe)"
                                name="nama_yang_menerima"
                                value="{{ old('nama_yang_menerima', $land_certificate->nama_yang_menerima) }}">

                            @error('nama_yang_menerima')
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
