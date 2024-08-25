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
            @foreach($rentalBikes as $rentalBike)
                    <div class="col-lg-3 col-md-6">
                        <div class="card-item">
                        <img src="{{ asset($rentalBike->gambar_rentalbike) }}" alt="{{ $rentalBike->nama_rentalbike }}">
                            <h4 class="title">{{ $rentalBike->nama_rentalbike }}</h4>
                            <p class="price">Rp. {{ number_format($rentalBike->harga_rentalbike, 0, ',', '.') }} /org</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Package End -->
    @endsection
