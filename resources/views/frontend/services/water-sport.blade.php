@extends('body')
@section('content')
    <!-- Breadcrumbs Start -->
    <div class="breadcrumbs">
        <div class="page-header-watersport d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <i class="fa-solid fa-water" style="font-size: 2rem; color: #ffffff;"></i>
                        <h2>Water Sport</h2>
                        <p>Cuaca Pantai Hari ini <span class="text"> Sedang Berombak! </span>Tidak
                            disarankan bagi anda jika ombak sedang tinggi!</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/" style="font-weight: 1000">Home</a></li>
                    <li style="font-weight: 1000">Water Sport</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- Breadcrumbs End -->

    <!-- Package Start -->
    <div class="container-fluid watersport py-5">
        
    <div class="container">
            <div class="row">
            @foreach($watersport as $watersports)
                    <div class="col-lg-3 col-md-6">
                        <div class="card-item">
                        <img src="{{ asset($watersports->gambar_watersport) }}" alt="{{ $watersports->nama_watersport }}">
                            <h4 class="title">{{ $watersports->nama_watersport }}</h4>
                            <p class="price">Rp. {{ number_format($watersports->harga_watersport, 0, ',', '.') }} /org</p>
                            <p class="title">{{ $watersports->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Package End -->
    @endsection
