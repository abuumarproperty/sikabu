@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">

            <div class="card mb-4">
                <div class="card-header">Edit Akun</div>
                <div class="card-body">
                    <form action="/dashboard/users/{{ $user->username }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div>
                            <input class="form-control @error('username') is-invalid @enderror" id="inputUsername"
                                type="hidden" value="{{ $user->username }}" name="username">

                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row gx-3 mb-3">
                            <label class="small mb-1" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                value="{{ $user->name }}" name="name">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row gx-3 mb-3">
                            <label class="small mb-1" for="avatar">Avatar</label>

                            <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">
                            <input class="form-control @error('avatar') is-invalid @enderror" id="avatar" type="file"
                                value="{{ $user->avatar }}" name="avatar">

                            @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                value="{{ $user->email }}" name="email">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                <label class="small mb-1" for="old_password">Old Password</label>
                                <input class="form-control @error('old_password') is-invalid @enderror" id="old_password"
                                    type="password" name="old_password">

                                @error('old_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label class="small mb-1" for="new_password">New Password</label>
                                <input class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                                    type="password" name="password">

                                @error('new_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- <div class="col-md-1 col-sm-1 align-self-center mt-4" id="showPassword">
                                <i class="bi bi-eye-slash" onclick="myFunction()" style="cursor: pointer"></i>
                            </div> --}}
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="status">Status</label>
                            <input class="form-control @error('status') is-invalid @enderror" id="status" type="text"
                                value="{{ $user->status }}" name="status">

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="is_admin">Hak Akses</label>
                            {{-- <input class="form-control @error('is_admin') is-invalid @enderror" id="is_admin"
                                type="text" value="{{ $user->is_admin }}" name="is_admin"> --}}

                            <select class="form-select @error('is_admin') is-invalid @enderror"name="is_admin"
                                id="is_admin">

                                @if ($user->is_admin == 1)
                                    <option value="1" selected>Administrator</option>
                                    <option value="0">Karyawan</option>
                                @else
                                    <option value="1">Administrator</option>
                                    <option value="0" selected>Karyawan</option>
                                @endif
                            </select>

                            {{-- @if ($user->is_admin == 1)
                                <p class="text-danger">*Administrator</p>
                            @else
                                <p class="text-danger">*Karyawan</p>
                            @endif --}}

                            @error('is_admin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary text-white">
                            Save Changes
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
@endsection
