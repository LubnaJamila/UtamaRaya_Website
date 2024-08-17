@extends('body')
@section('content')
    <div class="breadcrumbs">
        <div class="page-header-wedding d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 style="font-weight: 1000">Ballroom Wedding</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluif search-box-container">
        <div class="search-box">
            <div class="search-item col-lg-5 col-md-6">
                <i class="fa-solid fa-landmark" style="color: #8b0000;"></i>
                <div class="search-item-text w-200">
                    <label for="menu">Paket</label>
                    <select id="menu" class="form-control select-with-red-arrow">
                        <option value="" disabled selected>---------</option> <!-- Opsi default kosong -->
                        <option value="package-1">Royal Ballroom</option>
                        <option value="package-2">Teras Pantai</option>
                    </select>
                </div>
            </div>

            <div class="search-item col-lg-5 col-md-6">
                <i class="fa-solid fa-calendar-check" style="color: #b80000;"></i>
                <div class="search-item-text">
                    <label for="date">Tanggal</label>
                    <input type="date" id="date" class="form-control select-with-red-arrow">
                </div>
            </div>
            <div class="search-item col-lg-2 col-md-6">
                <button type="button" class="btn btn-search">Search</button>
            </div>
        </div>
    </div>

    <div class="container-fluid services">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title pe-3 ps-3">Paket</h6>
                <h1 class="mb-4">Informasi <span class="text"> Paket Pernikahan</span> Kami!</h1>
            </div>
        </div>
        <div class="card-container">
            <div class="col-lg-4 col-md-4">
                <img src="{{ asset('frontend/assets/img/wedding_page.png') }}"  class="card-image">
            </div>
            <div class="card-item">
                <div class="card-item-content row align-items-center">
                    <div class="card-des col-md-8">
                        <h5 class="card-item-title">Teras Pantai</h5>
                        <p class="card-item-description">Wedding dilakukan diteras pantai Utama Raya. Penyewa mendapatkan
                            free akad nikah di musholla Utama Raya!</p>
                        <div class="d-flex align-items-center mb-2">
                            <div class="time-info">
                                <strong>08:00</strong>
                            </div>
                            <div class="arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="time-info">
                                <strong> 22:00</strong>
                            </div>

                        </div>
                        <div class="icons">
                            <li><i class="fa-solid fa-ruler-combined" style="color: #8b0000;"></i>
                                <span>
                                    500 m2</span>
                            </li>
                            <li><i class="fa-solid fa-user-friends" style="color: #8b0000;"></i><span> +- 400 orang</span>
                            </li>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <p class="price">Rp 20.000.000</p>
                        <a type="button" class="btn btn-detail" href="/service/ballroom/detail">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //default calender
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0'); // Januari adalah 0!
            var year = today.getFullYear();

            var todayDate = year + '-' + month + '-' + day;

            document.getElementById("date").value = todayDate;

            document.getElementById("date").setAttribute('min', todayDate);
        });
    </script>
@endsection
