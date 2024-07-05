@include('partials.header')

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('partials.navbar')

    <div class="hero page-inner overlay" style="background-image: url('{{ asset('images/hero_bg_3.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">
                        {{ $property->nama }}
                    </h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="/properties">Properties</a>
                            </li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                {{ $property->nama }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            <img src="{{ asset('storage/' . $property->foto) }}" alt="Image" class="img-fluid" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="heading text-primary">{{ $property->nama }}</h2>
                    <p class="meta">{{ $property->kota }}</p>
                    <p class="text-black-50">
                        {{ $property->deskripsi }}
                    </p>

                    <div class="d-block agent-box p-5">
                        <div class="img mb-4">
                            <img src="{{ asset('images/logo_perusahaan.png') }}" alt="Image" class="img-fluid" />
                        </div>
                        <div class="text">
                            <h3 class="mb-0">Abu Umar Property</h3>
                            <div class="meta mb-3">Perusahaan</div>
                            <p>
                                Silahkan hubungi untuk informasi lebih lanjut.
                            </p>
                            <ul class="list-unstyled social dark-hover d-flex">
                                <li class="me-1">
                                    <a href="https://www.instagram.com/abuumarproperty.id?igsh=azE2cGFtNHgyYWJh"><span
                                            class="icon-instagram"></span></a>
                                </li>
                                {{-- <li class="me-1">
                                    <a href="#"><span class="icon-twitter"></span></a>
                                </li> --}}
                                <li class="me-1">
                                    <a href="https://www.facebook.com/share/GFw6hGFW17ZM1EES/?mibextid=qi2Omg"><span
                                            class="icon-facebook"></span></a>
                                </li>
                                <li class="me-1">
                                    <a
                                        href="https://api.whatsapp.com/send?phone=6285210351600&text=Assalamualaikum...%20Izin%20mengetahui%20informasi%20lebih%20detail%20mengenai%20properti%20yang%20anda%20tawarkan..."><span
                                            class="icon-whatsapp"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
