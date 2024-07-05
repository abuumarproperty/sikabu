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

    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('images/hero_bg_3.jpg')"></div>
            <div class="img overlay" style="background-image: url('images/hero_bg_2.jpg')"></div>
            <div class="img overlay" style="background-image: url('images/hero_bg_1.jpg')"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1 class="heading" data-aos="fade-up">
                        Cara Termudah Untuk Menemukan Rumah Impian Anda
                    </h1>
                    {{-- <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                        data-aos-delay="200">
                        <input type="text" class="form-control px-4"
                            placeholder="Masukkan nama kota. contoh : Pekanbaru" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="property">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">
                        Popular Properties
                    </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p>
                        <a href="/properties" target="_blank" class="btn btn-primary text-white py-3 px-4">View all
                            properties</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">
                            @foreach ($properties as $property)
                                <div class="property-item">
                                    <a href="/property/{{ $property->id }}" class="img">
                                        <img src="{{ asset('storage/' . $property->foto) }}" alt="Image"
                                            class="img-fluid" width="100%" />
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2"><span>Rp.
                                                {{ number_format($property->harga, 0, ',', '.') }}</span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">
                                                {{ $property->alamat }}
                                            </span>
                                            <span class="city d-block mb-3">
                                                {{ $property->kota }}
                                            </span>

                                            <a href="/property/{{ $property->id }}"
                                                class="btn btn-primary py-2 px-3">See
                                                details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- .item -->
                        </div>

                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property"
                                tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property"
                                tabindex="-1">Next</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="features-1">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="box-feature">
                        <span class="flaticon-house"></span>
                        <h3 class="mb-3">Our Properties</h3>
                        <p>
                            Properti yang dijual belikan mengacu pada konsep syar'i dan bebas riba.
                        </p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                        <span class="flaticon-building"></span>
                        <h3 class="mb-3">Property for Sale</h3>
                        <p>
                            Properti yang dijual belikan juga tanpa wakalah, jelas serah terima barangnya, tanpa pasal
                            denda, dan tanpa sita.
                        </p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Real Estate Agent</h3>
                        <p>
                            Agen dan Karyawan terbaik yang akan melayani anda dan in syaa Allah akan selalu amanah dalam
                            menjalankan tugasnya.
                        </p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="box-feature">
                        <span class="flaticon-house-1"></span>
                        <h3 class="mb-3">House for Sale</h3>
                        <p>
                            Properti yang dijual belikan adalah properti yang bagus dan terjamin kualitasnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section sec-testimonials">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                        Galeri
                    </h2>
                </div>
                <div class="col-md-6 text-md-end">
                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev">Prev</span>

                        <span class="next" data-controls="next">Next</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4"></div>
            </div>
            <div class="testimonial-slider-wrap">
                <div class="testimonial-slider">

                    @foreach ($documentations as $documentation)
                        <div class="item">
                            <a href="{{ asset('storage/' . $documentation->foto) }}" target="__blank">
                                <img src="{{ asset('storage/' . $documentation->foto) }}"
                                    alt="{{ $documentation->judul }}" class="img-fluid rounded w-full mb-4" />
                            </a>

                            <div>
                                <span class="d-block mb-2 text-black-100">
                                    <strong>
                                        {{ $documentation->judul }}
                                    </strong>
                                </span>

                                <a href="/gallery/{{ $documentation->id }}" class="btn btn-primary py-2 px-3">See
                                    details</a>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="property-slider-wrap">
                        <div class="property-slider">
                            @foreach ($properties as $property)
                                <div class="property-item">
                                    <a href="/property-single" class="img">
                                        <img src="{{ asset('storage/' . $property->foto) }}" alt="Image"
                                            class="img-fluid" width="100%" />
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2"><span>Rp.
                                                {{ number_format($property->harga, 0, ',', '.') }}</span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">
                                                {{ $property->alamat }}
                                            </span>
                                            <span class="city d-block mb-3">
                                                {{ $property->kota }}
                                            </span>

                                            <a href="/property/{{ $property->id }}"
                                                class="btn btn-primary py-2 px-3">See
                                                details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- .item -->
                        </div>

                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property"
                                tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property"
                                tabindex="-1">Next</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="section section-4 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Ayo temukan rumah yang cocok untuk Anda.
                    </h2>
                    <p class="text-black-50">
                        Dapatkan property, rumah idaman, maupun kebun dengan transaksi tanpa riba disini.
                    </p>
                </div>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-home2"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">2M Properties</h3>
                            <p class="text-black-50">
                                Tersedia berbagai macam property berupa lahan perumahan (kaplingan), rumah tempat
                                tinggal, maupun kebun.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-person"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Top Rated Agents</h3>
                            <p class="text-black-50">
                                Agen dan Karyawan terbaik yang akan melayani anda.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-security"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Property Sah dan Terbebas dari Riba</h3>
                            <p class="text-black-50">
                                Akad jual beli yang sesuai dengan tuntunan Sunnah Rasullullah SAW. Tanpa riba, tanpa
                                biaya asuransi, tanpa wakalah, tanpa sita, dan sebagainya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-counter mt-5">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">3298</span></span>
                        <span class="caption text-black-50"># of Buy Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">2181</span></span>
                        <span class="caption text-black-50"># of Sell Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">9316</span></span>
                        <span class="caption text-black-50"># of All Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">7191</span></span>
                        <span class="caption text-black-50"># of Agents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="features-1">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6 text-start">
                    <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                        Poster Dakwah
                    </h2>
                </div>
                {{-- <div class="col-md-6 text-md-end">
                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev">Prev</span>

                        <span class="next" data-controls="next">Next</span>
                    </div>
                </div> --}}
            </div>

            <div class="row">
                <div class="col-lg-"></div>
            </div>
            <div class="testimonial-slider-wrap">
                <div class="testimonial-slider">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="item">
                                <a href="{{ asset('images/articles/dahsyatnya dosa riba.png') }}" target="__blank">
                                    <img src="{{ asset('images/articles/dahsyatnya dosa riba.png') }}" width="300"
                                        alt="Image" class="img-fluid rounded w-full mb-4" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item">
                                <a href="{{ asset('images/articles/hai orang orang beriman.png') }}"
                                    target="__blank">
                                    <img src="{{ asset('images/articles/hai orang orang beriman.png') }}"
                                        width="300" alt="Image" class="img-fluid rounded w-full mb-4" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item">
                                <a href="{{ asset('images/articles/awas kamuflase.png') }}" target="__blank">
                                    <img src="{{ asset('images/articles/awas kamuflase.png') }}" alt="Image"
                                        width="300" class="img-fluid rounded w-full mb-4" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="item">
                                <a href="{{ asset('images/articles/pt abu umar.png') }}" target="__blank">
                                    <img src="{{ asset('images/articles/pt abu umar.png') }}" alt="Image"
                                        width="300" class="img-fluid rounded w-full mb-4" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section">
        <div class="row justify-content-center footer-cta" data-aos="fade-up">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="mb-4">Jadilah bagian nyata dari kami yang sedang berkembang</h2>
                <p>
                    <a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">Hubungi Kami.</a>
                </p>
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="section section-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Our Partner
                    </h2>
                    <p class="text-black-50">
                        In syaa Allah selalu memberikan pelayanan yang terbaik dan amanah.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/gunawan.png') }}" alt="Gunawan Saleh, S.Sos., M.I.Kom"
                            class="img-fluid" width="800" height="800" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Gunawan Saleh, S.Sos., M.I.Kom</a></h2>
                            <span class="meta d-block mb-3">Direktur Utama</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/hadii.png') }}" alt="M. Hadi S.I.Kom" class="img-fluid"
                            width="800" height="800" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">M. Hadi S.I.Kom</a></h2>
                            <span class="meta d-block mb-3">Kepala Cabang Dumai</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/armadi.png') }}" alt="Armadi" class="img-fluid"
                            width="800" height="800" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Armadi</a></h2>
                            <span class="meta d-block mb-3">Kepala Cabang Rokan Hulu</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/arifa.png') }}" alt="Arifa Ramadhan" class="img-fluid"
                            width="800" height="800" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Arifa Ramadhan</a></h2>
                            <span class="meta d-block mb-3">HRD & Data Induk</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/sri.png') }}" alt="Sri Wahyuni" class="img-fluid"
                            width="800" height="800" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Sri Wahyuni</a></h2>
                            <span class="meta d-block mb-3">Administrasi Keuangan</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/doni.png') }}" alt="Doni Tri Kuntoro" class="img-fluid"
                            width="800" height="800" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Doni Tri Kuntoro</a></h2>
                            <span class="meta d-block mb-3">Administrasi Data</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/imam.png') }}" alt="Imam Hidayat" class="img-fluid"
                            width="800" height="800" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Imam Hidayat</a></h2>
                            <span class="meta d-block mb-3">Administrasi Keuangan</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/anwar-harahap.png') }}" alt="Anwar Harahap"
                            width="800" height="800" class="img-fluid" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Anwar Harahap</a></h2>
                            <span class="meta d-block mb-3">Kepala Marketing</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/wagiran.jpg') }}" alt="Anwar Harahap" width="800"
                            height="800" class="img-fluid" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Wagiran</a></h2>
                            <span class="meta d-block mb-3">Marketing</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="{{ asset('images/karyawan/mila_sari.jpg') }}" alt="Anwar Harahap" width="800"
                            height="800" class="img-fluid" />

                        <div class="person-contents">
                            <h2 class="mb-0"><a href="#">Mila Sari</a></h2>
                            <span class="meta d-block mb-3">Administrasi</span>
                            <p>
                                Ramah, cekatan, serta amanah dan pastinya akan membantu proses pendataan lebih cepat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
