@extends('body')
@section('content')
    <!-- Breadcrumbs Start -->
    <div class="breadcrumbs">
        <div class="page-header-watersport d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Rental Sepeda</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/" style="font-weight: 1000">Home</a></li>
                    <li style="font-weight: 1000">Rental Sepeda</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- Breadcrumbs End -->

    <!-- Package Start -->
    <div class="container-fluid rentalbike py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title pe-3 ps-3">Pilihan</h6>
                <h1 class="mb-4">Informasi <span class="text"> Rental Sepeda</span> Kami!</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card-item">
                        <img src="{{ asset('frontend/assets/img/bike_page.png') }}" alt="rentalbike">
                        <h4 class="title">Sepeda Tando Dewasa</h4>
                        <p class="price">Rp. 50.000 /org</p>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="card-item">
                        <img src="{{ asset('frontend/assets/img/bike_page.png') }}" alt="rentalbike">
                        <h4 class="title">Sepeda Tando Dewasa</h4>
                        <p class="price">Rp. 50.000 /org</p>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="card-item">
                        <img src="{{ asset('frontend/assets/img/bike_page.png') }}" alt="rentalbike">
                        <h4 class="title">Sepeda Tando Dewasa</h4>
                        <p class="price">Rp. 50.000 /org</p>
                    </div>
                </div>
            </div>
            <div class="btn-right">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20memesan%20ruangan%20untuk%20tanggal%20xx"
                    target="_blank" class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> Klik Untuk Pesan
                </a>
            </div>
        </div>


        <!-- Package End -->
    @endsection
