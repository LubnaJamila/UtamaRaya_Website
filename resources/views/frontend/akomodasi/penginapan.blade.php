@extends('body')
@section('content')
<style>
.container-fluid.akomodasi {
    overflow-x: auto;
    white-space: nowrap;
    padding: 0;
}

.item {
    display: inline-block;
    width: calc(33.333% - 5px);
    margin-right: 5px;
    vertical-align: top;
}

.item:last-child {
    margin-right: 0;

}

.container {
    padding-left: 0;
    padding-right: 0;
}
</style>

<div class="breadcrumbs">
    <div class="page-header-booking d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 style="font-weight: 1000">Daftar Penginapan</h2>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <ol>
                <li><a href="/" style="font-weight: 1000">Home</a></li>
                <li style="font-weight: 1000">Penginapan</li>
            </ol>
        </div>
    </nav>
</div>

@if ($tipeKamar->isEmpty())
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-12 text-center">
            <p style="color: #8b0000; font-weight:700; font-size:20px">Tidak ada data penginapan tersedia.......</p>
        </div>
    </div>
</div>
@else
<div class="container-fluid akomodasi mt-4">
    <div class="container">
        <div class="row">
            @foreach ($tipeKamar as $type)
            <div class="item">
                <div class="card" style="text-align: left;">
                    <div id="carouselExampleControls" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset($type->gambar_kamar) }}" class="d-block" style="max-height:150px"
                                    alt="Hotel Image 1">
                            </div>
                        </div>
                    </div>
                    <div class="title mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                        <h4 style="margin: 0;">{{ $type->nama_kamar }}</h4>

                    </div>
                    <ul>
                        <li><i class="fa-solid fa-door-closed" style="color: #8b0000;"></i><span>Jumlah Ruangan:
                                {{ $type->jumlah_ruangan }}</span></li>
                    </ul>

                    <h5 style="color: #8b0000; font-size: 18px; font-weight:700px; margin-top: 0">Deskripsi</h5>
                    @php
                    $deskripsiArray = json_decode($type->deskripsi, true);
                    @endphp

                    @foreach ($deskripsiArray as $deskripsi)
                    <li>{{ $deskripsi }}</li>
                    @endforeach
                    <hr>
                    <div>
                        <h6 style="color: #8b0000; font-size: 15px; margin: 0;">Weekends:
                            Rp{{ number_format($type->harga_weekend, 0, ',', '.') }}</h6>
                        <h6 style="color: #8b0000; font-size: 15px; margin: 0;">Weekdays:
                            Rp{{ number_format($type->harga_weekdays, 0, ',', '.') }}</h6>
                    </div>
                    <div class="button-container">
                        <a href="{{ route('kamar.show', ['id_tipe_kamar' => $type->id_tipe_kamar]) }}"
                            class="btn-pilih">Cek Ketersediaan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

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