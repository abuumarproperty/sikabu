<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="/" class="logo m-0 float-start">
                    <img src="{{ asset('images/logo_perusahaan.png') }}" width="50" alt="Image" class="img-fluid" />
                    PT. Abu Umar Property
                </a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                    <li class="{{ Request::is('properties') ? 'active' : '' }}"><a href="/properties">Properties</a>
                    </li>
                    <li class="{{ Request::is('faq') ? 'active' : '' }}"><a href="/faq">Faq</a></li>
                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact Us</a></li>
                    {{-- <li>
                        @auth
                            <a href="/dashboard" class="btn btn-primary btn-sm">Dashboard</a>
                        @endauth
                        <a href="/login">Sign In</a>
                    </li> --}}

                    @auth
                        {{-- <li>
                            @if (auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}">
                            @else
                                <img src="{{ asset('img/undraw_profile.svg') }}">
                            @endif
                            <ul>
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li> --}}

                        <li>
                            {{-- <a href="/dashboard" class="login-animation">
                                <i class="uil uil-sign-in-alt"></i>{{ auth()->user()->name }}
                            </a> --}}
                            <a href="/dashboard" class="login-animation">
                                @if (auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                        alt="{{ auth()->user()->name }}" class="rounded-circle" height="30px">
                                @else
                                    <img src="{{ asset('assets/images/undraw_profile.svg') }}">
                                @endif
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="/login" class="login-animation"><i class="uil uil-sign-out-alt"></i> Signin</a>
                        </li>
                    @endauth
                </ul>

                <a href="#"
                    class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>
