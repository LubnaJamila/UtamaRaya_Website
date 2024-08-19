@extends('body')
@section('content')
    <!-- Breadcrumbs Start -->
    <div class="breadcrumbs">
        <div class="page-header-wedding d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 style="font-weight: 1000">Akomodasi Type Hotel</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Search Start -->
    <div class="container-fluid search-box-container">
        <div class="search-box-akomodasi">
            <div class="col-lg-3 col-md-6 search-item " style="margin-right:20px">
                <i class="fa-solid fa-calendar-check" style="color: #8b0000;"></i>
                <div class="search-item-text">
                    <label for="checkin">Check In</label>
                    <input type="date" id="checkin" class="form-control select-with-red-arrow">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 search-item ">
                <i class="fa-solid fa-landmark" style="color: #8b0000;"></i>
                <div class="search-item-text w-100">
                    <label for="duration">Durasi</label>
                    <select id="duration" class="form-control select-with-red-arrow">
                        <option value="" disabled selected>---------</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 search-item ">
                <i class="fa-solid fa-calendar-check" style="color: #8b0000;"></i>
                <div class="search-item-text">
                    <label for="checkout">Check Out</label>
                    <input type="date" id="checkout" class="form-control" readonly>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 search-item" style="width: 120px">
                <button type="button" class="btn btn-search">Search</button>
            </div>
        </div>
    </div>
    <!-- Search End -->


    <!-- Package Start -->
    <div class="container-fluid akomodasi">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item" style="text-align: left;">
                        <div id="carouselExampleControls" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('frontend/assets/img/water_page.png') }}" class="d-block w-100"
                                        alt="Hotel Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/assets/img/umkm_page.png') }}" class="d-block w-100"
                                        alt="Hotel Image 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/assets/img/hotel_page.png') }}" class="d-block w-100"
                                        alt="Hotel Image 3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <i class="fa-solid fa-caret-left"></i>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <i class="fa-solid fa-caret-right"></i>
                            </button>
                        </div>
                        <span class="category_cootage mb-2">Cootage</span>
                        <div class="title mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                            <h4 style="margin: 0;">Hotel Sunset Deluxe</h4>
                            <div>
                                <h6 style="text-decoration: line-through; color: #a9a9a9; font-size: 14px; margin: 0;">Rp.
                                    500.000</h6>
                                <h6 style="color: #8b0000; font-size: 18px; margin: 0;">Rp. 400.000</h6>
                            </div>
                        </div>
                        <ul>
                            <li><i class="fa-solid fa-wifi" style="color: #8b0000;"></i><span> Wifi</span></li>
                            <li><i class="fa-solid fa-wind" style="color: #8b0000;"></i><span> AC</span></li>
                            <li><i class="fa-solid fa-utensils" style="color: #8b0000;"></i><span> Restaurant</span></li>
                            <li><i class="fa-solid fa-person-biking" style="color: #8b0000;"></i><span> Rental Sepeda</span>
                            </li>
                            <li><i class="fa-solid fa-person-swimming" style="color: #8b0000;"></i><span> Water Sport</span>
                            </li>
                        </ul>
                        <div class="button-container">
                            <button type="button" class="btn btn-detail" data-bs-toggle="modal"
                                data-bs-target="#detailModal">Lihat Detail</button>
                            <a href="/akomodasi/booking" class="btn-pilih">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Hotel Sunset Delux</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid detail">
                        <div class="container">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-detail-1">
                                            <div class="card-body">
                                                <h5 class="card-title">Waktu Penggunaan</h5>
                                                <div class="custom-hr"></div>
                                                <p class="card-text">Jam 08.00 - 22.00</p>
                                                <p class="card-text">Penyewa diberi kesempatan untuk persiapan 3 jam
                                                    sebelum acara dimulai dengan penerangan terbatas.</p>
                                                <p class="card-text">Penyewa diberi waktu 1 jam setelah acara untuk
                                                    membereskan peralatan.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card-detail-2">
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Spesifikasi Ruangan</h5>
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
                                                            <p class="card-text">Meja Bundar + Cover 10 buah dan 60 buah
                                                            </p>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Package End -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        //default calender check in
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            const checkinInput = document.getElementById('checkin');

            checkinInput.value = today;

            checkinInput.setAttribute('min', today);

            const durationSelect = document.getElementById('duration');

            for (let i = 1; i <= 30; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.text = `${i} Hari`;
                durationSelect.appendChild(option);
            }
        });


        document.getElementById('checkin').addEventListener('change', calculateCheckout);
        document.getElementById('duration').addEventListener('change', calculateCheckout);

        function calculateCheckout() {
            const checkinDate = document.getElementById('checkin').value;
            const duration = document.getElementById('duration').value;

            if (checkinDate && duration) {
                const checkin = new Date(checkinDate);
                checkin.setDate(checkin.getDate() + parseInt(duration));

                const checkoutDate = checkin.toISOString().split('T')[0];
                document.getElementById('checkout').value = checkoutDate;
            }
        }

        let currentIndex = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-item');
            const totalSlides = slides.length;

            if (index >= totalSlides) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalSlides - 1;
            } else {
                currentIndex = index;
            }

            // Update carousel position
            const offset = -currentIndex * 100;
            document.querySelector('.carousel').style.transform = `translateX(${offset}%)`;
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }
    </script>
@endsection
