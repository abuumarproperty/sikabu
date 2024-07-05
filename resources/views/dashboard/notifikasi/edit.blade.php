@extends('dashboard.layouts.main')

@section('content')
    <h1 class="app-page-title">Ubah Notifikasi</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section justify-content-center">
        <div class="col-12 col-md-10">

            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="/dashboard/notifications/{{ $notification->id }}" method="post" class="settings-form">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="Masukkan Keterangan Notifikasi" name="keterangan" autofocus
                                required value="{{ old('keterangan', $notification->keterangan) }}">

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
