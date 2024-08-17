<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Title</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Quicksand:wght@300..700&family=Work+Sans:ital@0;1&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Quicksand:wght@300..700&family=Work+Sans:ital@0;1&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>

<body>
    @include('navbar')
    <div class="hero-wrap js-fullheight">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7">
                    <span class="subheading">Selamat Datang di Website Utama Raya</span>
                    <h1 class="mb-4">
                        <span id="typing-text"></span>
                    </h1>
                    <p class="caps">Ciptakan momen kebersamaan bersama orang-orang tersayang!</p>
                    <a class="explore-button" href="#">explore now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe Start -->
    <div class="container-fluid subscribe py-5">
        <div class="container text-center py-5">
            <div class="mx-auto text-center" style="max-width: 900px;">
                <h5 class="subscribe-title px-3">Subscribe</h5>
                <h1 class="text-white mb-4">Our Newsletter</h1>
                <p class="text-white mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam,
                    architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium
                    fugiat
                    corrupti eum cum repellat a laborum quasi.
                </p>
                <div class="position-relative mx-auto">
                    <input class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->
    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <img src="{{ asset('frontend/assets/img/bgabout.png') }}" class="img-fluid w-100 h-100"
                        alt="">
                </div>
                <div class="col-lg-7"
                    style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                    <h5 class="section-about-title pe-3">About Us</h5>
                    <h1 class="mb-4">Welcome to <span class="text">Utama Raya</span></h1>
                    <p class="mb-4">Website Utama Raya menyediakan berbagai informasi menarik yang anda butuhkan
                        mulai
                        dari informasi mengenai akomodasi yang tersedai hingga penyewaan aula untuk
                        pernikahan anda!</p>
                    <p class="mb-4">Berbagai informasi kami sediakan untuk anda didalam website ini,anda bisa
                        melihat
                        & memesan akomodasi yang tersedia pada tanggal yang anda inginkan!</p>
                    <a class="explore-button py-3 px-5 mt-2" href="">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <section class="ftco-section services-section">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                <h1 class="mb-4">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                    live
                    the blind texts. Separated they live in haul bagus Bookmarksgrove right at the coast of the
                    Semantics, a large
                    language ocean.</p>
            </div>
            <div class="row d-flex">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 col-lg-4 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img"
                                style="background-image: url(images/services-1.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-paragliding"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Activities</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url(images/services-2.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-route"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Travel Arrangements</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img"
                                style="background-image: url(images/services-3.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-tour-guide"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Private Guide</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img"
                                style="background-image: url(images/services-4.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-map"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Location Manager</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img"
                                style="background-image: url(images/services-4.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-map"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Location Manager</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the
                                        necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <div class="container-fluid akomodation py-5">
        <div class="container py-5">
            <div
                class="d-flex flex-column flex-lg-row justify-content-between align-items-center mb-5 text-center text-lg-start">
                <div class="mb-3 mb-lg-0">
                    <h5 class="section-akomodation-title pe-3">Akomodasi</h5>
                    <h1 class="title">Akomodasi Terlaris</h1>
                </div>
                <div>
                    <ul class="nav nav-tabs justify-content-center justify-content-lg-end" role="tablist">
                        <li class="nav-item col d-flex" role="presentation">
                            <button class="nav-link active w-100" id="hotel-tab" data-bs-toggle="tab"
                                data-bs-target="#hotel" type="button" role="tab" aria-controls="hotel"
                                aria-selected="true"> Hotel</button>
                        </li>
                        <li class="nav-item col d-flex" role="presentation">
                            <button class="nav-link w-100" id="villa-tab" data-bs-toggle="tab"
                                data-bs-target="#villa" type="button" role="tab" aria-controls="villa"
                                aria-selected="false"> Villa
                            </button>
                        </li>
                        <li class="nav-item col d-flex" role="presentation">
                            <button class="nav-link w-100" id="cottage-tab" data-bs-toggle="tab"
                                data-bs-target="#cottage" type="button" role="tab" aria-controls="cottage"
                                aria-selected="false"> Cottage</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tabs-content center">
                <div class="tab-content" id="myTabContent">
                    <!-- Tab 1 -->
                    <div class="tab-pane fade show active" id="hotel" role="tabpanel"
                        aria-labelledby="hotel-tab">
                        <div class="properties section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$2.264.000</h6>
                                            <h4><a href="property-details.html">18 New Street Miami, OR 97219</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>8</span></li>
                                                <li>Bathrooms: <span>8</span></li>
                                                <li>Area: <span>545m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>6 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$1.180.000</h6>
                                            <h4><a href="property-details.html">54 Mid Street Florida, OR 27001</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>6</span></li>
                                                <li>Bathrooms: <span>5</span></li>
                                                <li>Area: <span>450m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>8 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$1.460.000</h6>
                                            <h4><a href="property-details.html">26 Old Street Miami, OR 38540</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>5</span></li>
                                                <li>Bathrooms: <span>4</span></li>
                                                <li>Area: <span>225m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>10 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Tab 2 -->
                    <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                        <div class="properties section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$2.264.000</h6>
                                            <h4><a href="property-details.html">18 New Street Miami, OR 97219</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>8</span></li>
                                                <li>Bathrooms: <span>8</span></li>
                                                <li>Area: <span>545m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>6 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$1.180.000</h6>
                                            <h4><a href="property-details.html">54 Mid Street Florida, OR 27001</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>6</span></li>
                                                <li>Bathrooms: <span>5</span></li>
                                                <li>Area: <span>450m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>8 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$1.460.000</h6>
                                            <h4><a href="property-details.html">26 Old Street Miami, OR 38540</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>5</span></li>
                                                <li>Bathrooms: <span>4</span></li>
                                                <li>Area: <span>225m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>10 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Tab 3 -->
                    <div class="tab-pane fade" id="cottage" role="tabpanel" aria-labelledby="cottage-tab">
                        <div class="properties section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$2.264.000</h6>
                                            <h4><a href="property-details.html">18 New Street Miami, OR 97219</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>8</span></li>
                                                <li>Bathrooms: <span>8</span></li>
                                                <li>Area: <span>545m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>6 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$1.180.000</h6>
                                            <h4><a href="property-details.html">54 Mid Street Florida, OR 27001</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>6</span></li>
                                                <li>Bathrooms: <span>5</span></li>
                                                <li>Area: <span>450m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>8 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/property-02.jpg') }}"
                                                    alt=""></a>
                                            <span class="category">Luxury Villa</span>
                                            <h6>$1.460.000</h6>
                                            <h4><a href="property-details.html">26 Old Street Miami, OR 38540</a>
                                            </h4>
                                            <ul>
                                                <li>Bedrooms: <span>5</span></li>
                                                <li>Bathrooms: <span>4</span></li>
                                                <li>Area: <span>225m2</span></li>
                                                <li>Floor: <span>3</span></li>
                                                <li>Parking: <span>10 spots</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Water Sport Section -->
    <div class="container-fluid umkm py-5"
        style="background: url('../public/frontend/assets/img/services-4.jpg') no-repeat center center; background-size: cover;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Water Sport</h6>
                <h1 class="mb-4">Cuaca Hari ini <span class="text-primary text-uppercase">Cerah!</span></h1>
                <p>Anda Dapat Bermain Wisata Water Sport Yang Kami Tawarkan Mulai Dari Jet Ski Hingga Snorkeling,
                    Temukan Petualangan Air Yang Menyegarkan Dan Penuh Adrenalin..</p>
            </div>

            <!-- Swiper Carousel Section -->
            <div class="swiper mySwiper position-relative">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="../frontend/assets/img/services-4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="path/to/image2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="path/to/image3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 3</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="path/to/image4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 4</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more cards as needed -->
                </div>

                <!-- Navigation Buttons -->
                <button class="btn prev-button"><i class="fas fa-arrow-left"></i></button>
                <button class="btn next-button"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>



    <!-- UMKM Section -->
    <div class="umkm-container py-5">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title text-center text-primary text-uppercase">UMKM</h6>
                <h1 class="mb-4">Produk<span class="text-primary text-uppercase"> UMKM </span>Sekitar!</h1>
                <p>Selamat datang di bagian khusus kami yang didedikasikan untuk produk-produk unggulan dari UMKM
                    lokal
                    di sekitar kita. Di sini, Anda akan menemukan berbagai macam barang yang tidak hanya unik dan
                    berkualitas, tetapi juga mencerminkan kearifan lokal dan kreativitas dari para pengrajin dan
                    produsen kecil.
                    ditawarkan.</p>
            </div>

            <div class="swiper-container umkm-swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide umkm-swiper-slide">
                        <img src="{{ asset('frontend/assets/img/umkm.png') }}" alt="Product Image"
                            class="umkm-product-image">
                        <div class="umkm-card">
                            <div class="umkm-card-content">
                                <h5 class="umkm-card-title">Tas Serut dari Serat Kerang</h5>
                                <p class="umkm-card-description">Berbagai aneka macam tas dapat anda temui ditoko
                                    kami.
                                    Kami menyediakan berbagai macam design tas selain itu tidak tau apa lagi...</p>
                                <a href="#" class="umkm-card-link">Lihat Selengkapnya</a>
                                <div class="umkm-card-price">Rp 50.000 - 150.000</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide umkm-swiper-slide">
                        <img src="{{ asset('frontend/assets/img/umkm.png') }}" alt="Product Image"
                            class="umkm-product-image">
                        <div class="umkm-card">
                            <div class="umkm-card-content">
                                <h5 class="umkm-card-title">Tas Serut dari Serat Kerang</h5>
                                <p class="umkm-card-description">Berbagai aneka macam tas dapat anda temui ditoko
                                    kami.
                                    Kami menyediakan berbagai macam design tas selain itu tidak tau apa lagi...</p>
                                <a href="#" class="umkm-card-link">Lihat Selengkapnya</a>
                                <div class="umkm-card-price">Rp 50.000 - 150.000</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide umkm-swiper-slide">
                        <img src="{{ asset('frontend/assets/img/umkm.png') }}" alt="Product Image"
                            class="umkm-product-image">
                        <div class="umkm-card">
                            <div class="umkm-card-content">
                                <h5 class="umkm-card-title">Tas Serut dari Serat Kerang</h5>
                                <p class="umkm-card-description">Berbagai aneka macam tas dapat anda temui ditoko
                                    kami.
                                    Kami menyediakan berbagai macam design tas selain itu tidak tau apa lagi...</p>
                                <a href="#" class="umkm-card-link">Lihat Selengkapnya</a>
                                <div class="umkm-card-price">Rp 50.000 - 150.000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->


    <section id="gallery">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <span style="font-weight: 1000;">Gallery</span>
                <h2 style="font-weight: 1000;">Gallery</h2>
            </div>

        </div>
        <div class="container" data-aos="fade-up">
            <div class="swiper gallery-slider">
                <div class="swiper-wrapper">
                    <!-- Slide-start -->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/ballroomwedding.png') }}" alt="Gallery">
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/ballroomwedding.png') }}" alt="">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/ballroomwedding.png') }}" alt="">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/ballroomwedding.png') }}" alt="">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/ballroomwedding.png') }}" alt="">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/ballroomwedding.png') }}" alt="">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/features-3.jpg') }}" alt="">
                        </div>
                    </div>
                    <!--Slide-end-->
                </div>

                <div class="gallery-slider-control">
                    <div class="swiper-button-prev slider-arrow">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </div>
                    <div class="swiper-button-next slider-arrow">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')







    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script>
        var GallerySlider = new Swiper(".gallery-slider", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 2.5,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        //typing gerak 
        document.addEventListener('DOMContentLoaded', function() {
            const text = "Temukan Keseruan Bersama Kami";
            const typingTextElement = document.getElementById('typing-text');
            let index = 0;
            const speed = 100; // typing speed in milliseconds

            function type() {
                if (index < text.length) {
                    typingTextElement.innerHTML += text.charAt(index);
                    index++;
                    setTimeout(type, speed);
                }
            }

            type();
        });


        var swiper = new Swiper('.umkm-swiper-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.next-button',
                prevEl: '.prev-button',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
            },
            loop: true,
        });

        //slider card

        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.mySwiper', {
                loop: true,
                slidesPerView: 3,
                spaceBetween: 30,
                autoplay: {
                    delay: 3000,
                },
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var navbar = document.querySelector(".navbar");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 50) {
                    navbar.classList.remove("navbar-transparent");
                    navbar.classList.add("navbar-scrolled");
                } else {
                    navbar.classList.remove("navbar-scrolled");
                    navbar.classList.add("navbar-transparent");
                }
            });

            // Set initial state based on current scroll position
            if (window.scrollY > 50) {
                navbar.classList.remove("navbar-transparent");
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.add("navbar-transparent");
            }
        });

        var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function() {
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>



</body>

</html>
