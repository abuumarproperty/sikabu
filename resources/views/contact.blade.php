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

    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Contact Us</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Contact
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-2">
                            <i class="icon-room"></i>
                            <h4 class="mb-2">Location:</h4>
                            <p class="mb-2" style="text-align: justify">
                                <strong>Kantor Pusat : </strong>Jl. Melati Indah, No. 9, Kelurahan Delima, Kec. Tampan,
                                kota Pekanbaru
                            </p>
                            <p style="text-align: justify">
                                <strong>Kantor Cabang : </strong>Jl. Syekh Ismail Simpang Tangun, Pasir Pengaraian, Kec.
                                Rambah, Kab. Rokan Hulu
                            </p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="icon-clock-o"></i>
                            <h4 class="mb-2">Open Hours:</h4>
                            <p>
                                Senin-Minggu:<br />
                                08:00 AM - 17:00 PM
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>abuumarproperty85@gmail.com</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-2">Call:</h4>
                            <p>+62-852-1035-1600</p>
                        </div>

                        <div class="bank mt-4">
                            <i class="icon-bank"></i>
                            <h4 class="mb-2">Account Number:</h4>
                            <p>730 1120 208 an. PT. Abu Umar Property</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.8395244862888!2d101.40112853832969!3d0.4787328819973359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a91d795edc4d%3A0x6efb720eb7aa6d47!2sJl.%20Melati%20Indah%20No.9%2C%20Delima%2C%20Kec.%20Tampan%2C%20Kota%20Pekanbaru%2C%20Riau%2028292%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1719980016768!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                    <form action="mailto:didiriwanda02@gmail" method="get">
                        {{-- <form action="/contact" method="post"> --}}
                        @csrf

                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" name="name" />
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" class="form-control" placeholder="Your Email" name="email" />
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Subject" name="subject" />
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="body" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>

                            <div class="col-12">
                                {{-- <input type="submit" value="Send Message" class="btn btn-primary" /> --}}
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.untree_co-section -->

    @include('partials.footer')
