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
                    <h1 class="heading" data-aos="fade-up">Properties</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Properties
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-weight-bold text-primary heading">
                        Featured Properties
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">
                            @if ($properties->count())
                                <div class="property-item">
                                    <a href="/property/{{ $properties[0]->id }}" class="img">
                                        <img src="{{ asset('storage/' . $properties[0]->foto) }}" alt="Image"
                                            class="img-fluid" />
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2">
                                            <span>
                                                Rp.
                                                {{ number_format($properties[0]->harga, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">
                                                {{ $properties[0]->alamat }}
                                            </span>
                                            <span class="city d-block mb-3">
                                                {{ $properties[0]->kota }}
                                            </span>

                                            <a href="/property/{{ $properties[0]->id }}"
                                                class="btn btn-primary py-2 px-3">See
                                                details</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="property-item">
                                    <a href="/property/{{ $properties[1]->id }}" class="img">
                                        <img src="{{ asset('storage/' . $properties[1]->foto) }}" alt="Image"
                                            class="img-fluid" />
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2">
                                            <span>
                                                Rp.
                                                {{ number_format($properties[1]->harga, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">
                                                {{ $properties[1]->alamat }}
                                            </span>
                                            <span class="city d-block mb-3">
                                                {{ $properties[1]->kota }}
                                            </span>

                                            <a href="/property/{{ $properties[1]->id }}"
                                                class="btn btn-primary py-2 px-3">See
                                                details</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="property-item">
                                    <a href="/property/{{ $properties[2]->id }}" class="img">
                                        <img src="{{ asset('storage/' . $properties[2]->foto) }}" alt="Image"
                                            class="img-fluid" />
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2">
                                            <span>
                                                Rp.
                                                {{ number_format($properties[2]->harga, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">
                                                {{ $properties[2]->alamat }}
                                            </span>
                                            <span class="city d-block mb-3">
                                                {{ $properties[2]->kota }}
                                            </span>

                                            <a href="/property/{{ $properties[2]->id }}"
                                                class="btn btn-primary py-2 px-3">See
                                                details</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="text-center fs-4">No Property Found</p>
                            @endif
                            <!-- .item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-properties">
        <div class="container">
            <div class="row">

                @foreach ($properties as $property)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="property-item mb-30">
                            <a href="/property/{{ $property->id }}" class="img">
                                <img src="{{ asset('storage/' . $property->foto) }}" alt="Image" class="img-fluid"
                                    height="100" />
                            </a>

                            <div class="property-content">
                                <div class="price mb-2"><span>Rp.
                                        {{ number_format($property->harga, 0, ',', '.') }}</span></div>
                                <div>
                                    <span class="d-block mb-2 text-black-50">{{ $property->alamat }}</span>
                                    <span class="city d-block mb-3">{{ $property->kota }}</span>

                                    <a href="/property/{{ $property->id }}" class="btn btn-primary py-2 px-3">See
                                        details</a>
                                </div>
                            </div>
                        </div>
                        <!-- .item -->
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @include('partials.footer')
