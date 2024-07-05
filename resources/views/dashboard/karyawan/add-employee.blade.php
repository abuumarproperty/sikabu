@extends('dashboard.layouts.main')

@section('content')
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-12 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2"
                                src="{{ asset('assets/images/app-logo.svg') }}" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Pendaftaran Karyawan</h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form" action="/dashboard/users" method="post">
                            @csrf

                            <div class="email mb-3">
                                <label for="name">Your Name</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Masukkan Nama (cth : John Doe)" required autofocus>

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="email mb-3">
                                {{-- <label for="username">Username</label> --}}
                                <input id="username" name="username" type="hidden"
                                    class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Masukkan Username (cth : johndoe)" required>

                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="email mb-3">
                                <label for="avatar">Avatar</label>
                                <input id="avatar" name="avatar" type="file" class="form-control">
                            </div> --}}
                            <div class="email mb-3">
                                <label for="email">Your Email</label>
                                <input id="email" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan Email (cth : johndoe@gmail.com)" required>

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="password mb-3">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Create a password" required>

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="email mb-3">
                                <label for="status">Status</label>
                                <input id="status" name="status" type="text"
                                    class="form-control @error('status') is-invalid @enderror" placeholder="Status Karyawan"
                                    required>

                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                    Up</button>
                            </div>
                        </form><!--//auth-form-->
                    </div><!--//auth-form-container-->
                </div><!--//auth-body-->

            </div><!--//flex-column-->
        </div><!--//auth-main-col-->


    </div><!--//row-->
@endsection
