@extends('body')
@section('content')
    
    <div class="carousel">
        <div class="list">
            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/bg-ur.png') }}');">
                <div class="content">
                    <span class="subheading">Utama Raya Website!</span>
                    <div class="des">Ciptakan momen kebersamaan bersama orang-orang tersayang!Jelajahi setiap destinasi
                        yag disediakan oleh kami. Uang anda habis ,Kami senang.</div>
                    <a class="explore-button" href="#">Jelajahi Sekarang!</a>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/hotel_page.png') }}');">
                <div class="content">
                    <span class="subheading">Akomodasi</span>
                    <div class="des">Anda bisa memesan berbagai akomodasi dengan tipe yang berbeda-beda yaitu mulai dari
                        tipe Hotel,Villa,Cootage bahkan hingga tipe Bungalow!</div>
                    <a class="explore-button" href="#">Jelajahi Sekarang!</a>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/umkm_page.png') }}');">
                <div class="content">
                    <span class="subheading">UMKM</span>
                    <div class="des">Setiap barang memiliki cerita unik, dibuat dengan penuh passion dan ketelatenan
                        oleh
                        tangan-tangan terampil.Setiap pembelian produk mendukung para pengrajin lokal, membantu
                        mempertahankan dan mengembangkan usaha milik mereka.
                    </div>
                    <a class="explore-button" href="#">Jelajahi Sekarang!</a>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/water_page.png') }}');">
                <div class="content">
                    <span class="subheading">Water Sport</span>
                    <div class="des">Kami menawarkan berbagai aktivitas watersport yang mendebarkan dan menyenangkan
                        untuk semua umur dan tingkat keahlian. Rasakan sensasi kecepatan, kebebasan, dan kegembiraan di
                        perairan yang jernih dan memukau!
                    </div>
                    <a class="explore-button" href="#">Jelajahi Sekarang!</a>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/wedding_page.png') }}');">
                <div class="content">
                    <span class="subheading">Ballroom Wedding</span>
                    <div class="des">Rayakan momen istimewa Anda di Utama Raya, tempat yang sempurna untuk mewujudkan
                        pernikahan impian. Kami menawarkan gedung pernikahan serta tempat dipinggir pantai yang elegan dan
                        fasilitas lengkap untuk
                        menjadikan hari bahagia Anda berkesan dan tak terlupakan.
                    </div>
                    <a class="explore-button" href="#">Jelajahi Sekarang!</a>

                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('frontend/assets/img/bike_page.png') }}');">
                <div class="content">
                    <span class="subheading">Rental Sepeda</span>
                    <div class="des">Rasakan keseruan dan kebebasan bersepeda sambil menjelajahi keindahan sekitar
                        Wisata
                        Pantai Utama Raya. Kami menawarkan layanan rental sepeda yang memudahkan Anda untuk menikmati
                        pemandangan menakjubkan dan suasana segar di area wisata kami.
                    </div>
                    <a class="explore-button" href="#">Jelajahi Sekarang!</a>

                </div>
            </div>
        </div>

        <div class="arrows">
            <button class="prev"><i class="fa-solid fa-caret-left"></i></button>
            <button class="next"><i class="fa-solid fa-caret-right"></i></button>
        </div>
        <div class="timeRunning"></div>
    </div>


    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-4">
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
                    <a class="explore-button py-3 px-5 mt-2" href="/about">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service -->
    <div class="container-fluid services py-3">
        <div class="container py-3">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title pe-3 ps-3">Layanan</h6>
                <h1 class="mb-4">Jelajahi Berbagai <span class="text">Layanan Kami</span></h1>
                <p>Nikmati keseruan tak terlupakan dengan berbagai layanan yang kami tawarkan mulai dari layanan
                    akomodasi,rental sepeda,aula pernikahan,penyewaan sepeda hingga berbagai kegiatan olahraga air yang kami
                    tawarkan.</p>
            </div>
            <div class="row d-flex">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 col-lg-4 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img"
                                style="background-image: url(../frontend/assets/img/water_page.png);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-paragliding"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Water Sport</h3>
                                    <p>Mulai dari jet ski, banana boat, hingga parasailing, setiap aktivitas dirancang untuk
                                        memberikan pengalaman adrenalin dan kesenangan maksimal.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url(../frontend/assets/img/bike_page.png);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-route"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Rental Bike</h3>
                                    <p> Anda dapat menjelajahi rute-rute indah dan menemukan sudut-sudut tersembunyi di
                                        sekitar tempat wisata.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img"
                                style="background-image: url(../frontend/assets/img/umkm_page.png);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-tour-guide"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">UMKM</h3>
                                    <p> Selami budaya lokal yang kaya dengan mengeksplorasi produk-produk dari UMKM (Usaha
                                        Mikro, Kecil, dan Menengah) kami.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img"
                                style="background-image: url(../frontend/assets/img/wedding_page.png);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-map"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Ballroom Wedding</h3>
                                    <p>Dengan desain elegan dan fasilitas lengkap, gedung kami adalah tempat yang sempurna
                                        untuk mengadakan pernikahan impian Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url(../frontend/assets/img/hotel_page.png);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-route"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Akomodasi</h3>
                                    <p>Dari kamar standar yang nyaman hingga suite mewah, setiap pilihan akomodasi kami
                                        menawarkan kenyamanan dan kemudahan maksimal untuk memastikan Anda merasa seperti di
                                        rumah.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Akomodasi -->
    <div class="container-fluid akomodation py-3">
        <div class="container py-3">
            <div
                class="d-flex flex-column flex-lg-row justify-content-between align-items-center mb-5 text-center text-lg-start">
                <div class="mb-3 mb-lg-0">
                    <h5 class="section-akomodation-title pe-3">Akomodasi</h5>
                    <h1 class="mb-4">Akomodasi <span class="text">Terlaris</span></h1>
                </div>
                <div>
                    <ul class="nav nav-tabs justify-content-center justify-content-lg-end" role="tablist">
                        <li class="nav-item col d-flex" role="presentation">
                            <button class="nav-link active w-100" id="hotel-tab" data-bs-toggle="tab"
                                data-bs-target="#hotel" type="button" role="tab" aria-controls="hotel"
                                aria-selected="true"> Hotel</button>
                        </li>
                        <li class="nav-item col d-flex" role="presentation">
                            <button class="nav-link w-100" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa"
                                type="button" role="tab" aria-controls="villa" aria-selected="false"> Villa
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
                    <div class="tab-pane fade show active" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                        <div class="properties section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item" style="text-align: left;">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/hotel_page.png') }}"
                                                    alt=""></a>
                                            <span class="category_hotel mb-2">Hotel</span>
                                            <div class="title mb-3"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <h4 style="margin: 0;">Hotel Sunset
                                                    Deluxe</h4>
                                                <div>
                                                    <h6
                                                        style="text-decoration: line-through; color: #a9a9a9; font-size: 14px; margin: 0;">
                                                        Rp. 500.000</h6>
                                                    <h6 style="color: #8b0000; font-size: 18px; margin: 0;">Rp. 400.000
                                                    </h6>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><i class="fa-solid fa-wifi" style="color: #8b0000;"></i><span>
                                                        Wifi</span></li>
                                                <li><i class="fa-solid fa-wind" style="color: #8b0000;"></i><span>
                                                        AC</span></li>
                                                <li><i class="fa-solid fa-utensils" style="color: #8b0000;"></i><span>
                                                        Restaurant</span></li>
                                                <li><i class="fa-solid fa-person-biking"
                                                        style="color: #8b0000;"></i><span> Rental Sepeda</span></li>
                                                <li><i class="fa-solid fa-person-swimming"
                                                        style="color: #8b0000;"></i><span> Water Sport</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="">Booking Sekarang</a>
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
                                        <div class="item" style="text-align: left;">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/hotel_page.png') }}"
                                                    alt=""></a>
                                            <span class="category_villa mb-2">Villa</span>
                                            <div class="title mb-3"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <h4 style="margin: 0;">Villa Deluxe Red Sea</h4>
                                                <div>
                                                    <h6
                                                        style="text-decoration: line-through; color: #a9a9a9; font-size: 14px; margin: 0;">
                                                        Rp. 500.000</h6>
                                                    <h6 style="color: #8b0000; font-size: 18px; margin: 0;">Rp. 400.000
                                                    </h6>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><i class="fa-solid fa-wifi" style="color: #8b0000;"></i><span>
                                                        Wifi</span></li>
                                                <li><i class="fa-solid fa-square-parking"
                                                        style="color: #8b0000;"></i><span> Area Parkir</span></li>
                                                <li><i class="fa-solid fa-utensils" style="color: #8b0000;"></i><span>
                                                        Restaurant</span></li>
                                                <li><i class="fa-solid fa-person-biking"
                                                        style="color: #8b0000;"></i><span> Rental Sepeda</span></li>
                                                <li><i class="fa-solid fa-person-swimming"
                                                        style="color: #8b0000;"></i><span> Water Sport</span></li>
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
                                        <div class="item" style="text-align: left;">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/hotel_page.png') }}"
                                                    alt=""></a>
                                            <span class="category_cootage mb-2">Cootage</span>
                                            <div class="title mb-3"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <h4 style="margin: 0;">Cootage Dreamland Suite</h4>
                                                <div>
                                                    <h6
                                                        style="text-decoration: line-through; color: #a9a9a9; font-size: 14px; margin: 0;">
                                                        Rp. 500.000</h6>
                                                    <h6 style="color: #8b0000; font-size: 18px; margin: 0;">Rp. 400.000
                                                    </h6>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><i class="fa-solid fa-wifi" style="color: #8b0000;"></i><span>
                                                        Wifi</span></li>
                                                <li><i class="fa-solid fa-square-parking"
                                                        style="color: #8b0000;"></i><span> Area Parkir</span></li>
                                                <li><i class="fa-solid fa-utensils" style="color: #8b0000;"></i><span>
                                                        Restaurant</span></li>
                                                <li><i class="fa-solid fa-person-biking"
                                                        style="color: #8b0000;"></i><span> Rental Sepeda</span></li>
                                                <li><i class="fa-solid fa-person-swimming"
                                                        style="color: #8b0000;"></i><span> Water Sport</span></li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="property-details.html">Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="item" style="text-align: left;">
                                            <a href="property-details.html"><img
                                                    src="{{ asset('frontend/assets/img/hotel_page.png') }}"
                                                    alt=""></a>
                                            <span class="category_bungalow mb-2">Bungalow</span>
                                            <div class="title mb-3"
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <h4 style="margin: 0;">Bungalow Grande Suite</h4>
                                                <div>
                                                    <h6
                                                        style="text-decoration: line-through; color: #a9a9a9; font-size: 14px; margin: 0;">
                                                        Rp. 500.000</h6>
                                                    <h6 style="color: #8b0000; font-size: 18px; margin: 0;">Rp. 400.000
                                                    </h6>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><i class="fa-solid fa-wifi" style="color: #8b0000;"></i><span>
                                                        Wifi</span></li>
                                                <li><i class="fa-solid fa-square-parking"
                                                        style="color: #8b0000;"></i><span> Area Parkir</span></li>
                                                <li><i class="fa-solid fa-utensils" style="color: #8b0000;"></i><span>
                                                        Restaurant</span></li>
                                                <li><i class="fa-solid fa-person-biking"
                                                        style="color: #8b0000;"></i><span> Rental Sepeda</span></li>
                                                <li><i class="fa-solid fa-person-swimming"
                                                        style="color: #8b0000;"></i><span> Water Sport</span></li>
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

    <!-- Akomodasi End -->

    <!-- UMKM -->
    <div class="container-fluid umkm py-3">
        <div class="container py-5">
            <div class="text-center">
                <h6 class="section-title pe-3 ps-3">UMKM</h6>
                <h1 class="mb-4">Produk <span class="text">UMKM</span> Sekitar!</h1>
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
                        <img src="{{ asset('frontend/assets/img/umkm_page.png') }}" alt="Product Image"
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
                        <img src="{{ asset('frontend/assets/img/umkm_page.png') }}" alt="Product Image"
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
                        <img src="{{ asset('frontend/assets/img/umkm_page.png') }}" alt="Product Image"
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
    <!-- UMKM End -->

    <!-- Gallery -->
    <div class="container-fluid gallery py-3">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title pe-3 ps-3">Gallery</h6>
                <h1 class="mb-4">Beberapa<span class="text"> Moment </span>Terabadikan!</h1>
                <p>Abadikan momen bersama orang tersayang anda!.</p>
            </div>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="swiper gallery-slider">
                <div class="swiper-wrapper">
                    <!-- Slide-start -->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/gallery_1.png') }}" alt="Gallery">
                        </div>
                    </div>
                    <!-- Slide-end -->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/gallery_2.png') }}" alt="Gallery">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/gallery_3.png') }}" alt="Gallery">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/gallery_4.png') }}" alt="Gallery">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/gallery_5.png') }}" alt="Gallery">
                        </div>
                    </div>
                    <!--Slide-end-->

                    <!--Slide-start-->
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-slide-img">
                            <img src="{{ asset('frontend/assets/img/gallery_6.png') }}" alt="Gallery">
                        </div>
                    </div>
                    <!--Slide-end-->
                </div>

                <div class="gallery-slider-control">
                    <div class="swiper-button-prev slider-arrow">
                        <i class="fa-solid fa-caret-left"></i>
                    </div>
                    <div class="swiper-button-next slider-arrow">
                        <i class="fa-solid fa-caret-right"></i>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->
@endsection
