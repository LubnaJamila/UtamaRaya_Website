@extends('body')
@section('content')
    <!-- Breadcrumbs Start-->
    <div class="breadcrumbs mb-3">
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 style="font-weight: 1000">Detail Package</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/" style="font-weight: 1000">Home</a></li>
                    <li style="font-weight: 1000">Detail</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- Breadcrumbs End  -->


    <!-- Detail Start -->
    <div class="container-fluid gallery py-2">
        <div class="container-detail">
            <div class="text-center">
                <h6 class="section-title pe-3 ps-3">Detail Package</h6>
                <h1 class="mb-4">Moment<span class="text"> Pernikahan </span>!</h1>
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

    <div class="container-fluid detail">
        <div class="container">

            <div class="text-center mt-lg-4">
                <h1 class="mb-4">Informasi<span class="text"> Teras Pantai </span> Paket!</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-detail-1">
                            <div class="card-body">
                                <h5 class="card-title">Waktu Penggunaan</h5>
                                <div class="custom-hr"></div>
                                <p class="card-text">Jam 08.00 - 22.00</p>
                                <p class="card-text">Penyewa diberi kesempatan untuk perisapan 3 jam sebelum acara dimulai
                                    dengan penerangan terbatas.</p>
                                <p class="card-text">Penyewa diberi waktu 1 jam setelah acara untuk membereskan peralatan.
                                </p>
                                <p class="price">Rp. 20.000.000</p>
                                <div class="btn-right">
                                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20memesan%20ruangan%20untuk%20tanggal%20xx"
                                        target="_blank" class="btn-whatsapp">
                                        <i class="fa-brands fa-whatsapp"></i> Klik Untuk Pesan
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card-detail-2">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Sepesifikasi Ruangan</h5>
                                            <div class="custom-hr"></div>
                                            <p class="card-text">
                                                <i class="fa-solid fa-ruler-combined"
                                                    style="color: #8b0000; margin-right:10px"></i>
                                                Luas: <span>500 m²</span>

                                                <i class="fa-solid fa-user-friends"
                                                    style="color: #8b0000; margin-left:10px"></i>
                                                Kapasitas: <span>± 400 orang</span>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Fasilitas</h5>
                                            <div class="custom-hr"></div>
                                            <p class="card-text">Free Akad Nikah di Musholla Utama Raya</p>
                                            <p class="card-text">Sound System + 2 microphone</p>
                                            <p class="card-text">2 buah meja penerima tamu & kursi</p>
                                            <p class="card-text">400 buah kursi outdoor</p>
                                            <p class="card-text">Meja Bundar + Cover 10 buah dan 60 buah</p>
                                            <p class="card-text">Free Ticket</p>
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



    <!-- Detail End -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        //default calender
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var year = today.getFullYear();

            var todayDate = year + '-' + month + '-' + day;

            document.getElementById("date").value = todayDate;

            document.getElementById("date").setAttribute('min', todayDate);
        });

        var totalSlides = document.querySelectorAll('.gallery-slider .swiper-slide').length;
        var middleSlide = Math.floor(totalSlides / 2);

        var totalSlides = document.querySelectorAll('.gallery-slider .swiper-slide').length;
        var middleSlide = Math.floor(totalSlides / 2);

        var GallerySlider = new Swiper(".gallery-slider", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: "auto",
            initialSlide: middleSlide,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1.5,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                init: function() {
                    this.updateSlides();
                    this.slideToLoop(middleSlide, 0, false);
                },
                resize: function() {
                    this.updateSlides();
                },
                slideChange: function() {
                    this.updateSlides();
                }
            }
        });
    </script>
@endsection
