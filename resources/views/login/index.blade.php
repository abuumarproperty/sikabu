<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">

        <div class="col-12 col-md-12 col-lg-12 app-auth-card-container">
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show mt-3 mb-0 mx-3 text-center" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif
        </div>
        <div class="col-12 col-md-12 col-lg-12 auth-main-col text-center p-5">

            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">Log in to SIKABU</h2>

                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="/login" method="post">
                            @csrf

                            <div class="email mb-3">
                                <label class="sr-only" for="email">Email</label>
                                <input id="email" name="email" type="email"
                                    class="form-control signin-email @error('email') is-invalid @enderror"
                                    placeholder="Email address" required="required">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="password">Password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control signin-password @error('password') is-invalid @enderror"
                                    placeholder="Password" required="required">

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                {{-- <div class="form-group{{ $errors->has('captcha') ? 'as-error' : '' }}">

                                    <label for="password" class="col-md-4 control-label">Captcha</label>

                                     <div class="col-md-6">

                                        <div class="captcha">

                                            <span>{!! captcha_src() !!}</span>

                                            <a href="/refresh_captcha" class="btn btn-success btn-refresh">
                                                <i class="fa fa-refresh"></i></a>

                                        </div>

                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">

                                        @if ($errors->has('captcha'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('captcha') }}</strong>
                                            </span>
                                        @endif

                                    </div> 

                                </div> --}}

                                <div class="extra mt-3 row justify-content-between">
                                    {{-- <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="RememberPassword">
                                            <label class="form-check-label" for="RememberPassword">
                                                Remember me
                                            </label>
                                        </div>
                                    </div><!--//col-6--> --}}
                                    <div class="col-12">
                                        <div class="forgot-password text-end">
                                            <a
                                                href="https://api.whatsapp.com/send?phone=6285210351600&text=Assalamualaikum...%20Saya%lupa%20password..%20Mohon%20bantuannya%20pak...">Forgot
                                                password?</a>
                                        </div>
                                    </div><!--//col-6-->
                                </div><!--//extra-->
                            </div><!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
                                    In</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link"
                                href="https://api.whatsapp.com/send?phone=6285210351600&text=Assalamualaikum...%20Izin%untuk%20didaftarkan%20sebagai%20karyawan%20pak...">here</a>.
                        </div>
                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                        <small class="copyright">
                            Designed and Develop with <span class="sr-only">love</span><i class="fas fa-heart"
                                style="color: #fb866a;"></i>
                            by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Didi
                                Riwanda</a>
                        </small>

                    </div>
                </footer><!--//app-auth-footer-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->

    </div><!--//row-->


</body>

</html>
