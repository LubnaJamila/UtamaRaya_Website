@extends('body')
@section('content')
<style>
.card-detail img.header-img {
    display: block;
    margin: 0 auto;
    width: 50%;
    max-width: 500px;
    height: auto;
}

.date-inputs label {
    color: #8b0000;
    font-weight: 700;
    font-size: 18px;
}
</style>
<!-- Breadcrumbs Start -->
<div class="breadcrumbs">
    <div class="page-header-booking d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Detail Penginapan</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumbs End -->
<div class="container akomodasidetail mb-5">
    <div class="container card-container">
        <div class="card">
            <div class="stepper">
                <div class="step">
                    <div class="circle">1</div>
                    <div class="text">Cek Ketersediaan</div>
                </div>
                <div class="step inactive">
                    <div class="circle">2</div>
                    <div class="text">Kamar</div>
                </div>
                <div class="step inactive">
                    <div class="circle">3</div>
                    <div class="text">Pembayaran</div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-title-detail mb-3">
                        <div class="card-body-title">
                            <h5 class="card-title">Detail <span class="text">Akomodasi Pesanan</span> Anda</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card-detail mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Detail Kamar</h5>
                            <hr>
                            <img src="{{ asset($tipeKamar->gambar_kamar) }}" class="header-img" alt="Gambar Kamar">
                            <div>
                                <div class="title mb-3"
                                    style="display: flex; justify-content: space-between; align-items: center;">
                                    <h4 style="margin: 0; color: #8b0000; font-weight:700">{{ $tipeKamar->nama_kamar }}
                                    </h4>
                                    <div>
                                        <h6 style="color: #8b0000; font-size: 18px; margin: 0;">Weekends:
                                            Rp{{ number_format($tipeKamar->harga_weekend, 0, ',', '.') }}</h6>
                                        <h6 style="color: #8b0000; font-size: 18px; margin: 0;">Weekdays:
                                            Rp{{ number_format($tipeKamar->harga_weekdays, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                                <ul>
                                    <i class="fa-solid fa-door-closed" style="color: #8b0000;"></i><span>Jumlah
                                        Ruangan:
                                        {{ $tipeKamar->jumlah_ruangan }}</span>
                                </ul>
                                <h5 style="color: #8b0000; font-size: 18px;">Deskripsi</h5>
                                @php
                                $deskripsiArray = json_decode($tipeKamar->deskripsi, true);
                                @endphp

                                @foreach ($deskripsiArray as $deskripsi)
                                <li>{{ $deskripsi }}</li>
                                @endforeach
                            </div>
                            <form action="{{ route('check.availability') }}" method="POST">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $tipeKamar->id_tipe_kamar }}">
                                <div class="date-inputs">
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-sm-4">
                                            <label for="checkInDate" class="form-label">Tanggal Check-In</label>
                                            <input type="date" class="form-control" id="checkInDate"
                                                name="check_in_date" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-4">
                                            <label for="checkOutDate" class="form-label">Tanggal Check-Out</label>
                                            <input type="date" class="form-control" id="checkOutDate"
                                                name="check_out_date" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-orange w-100">Cek Sekarang</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const guestRadio = document.getElementById('guest');
    const bookingForAnotherRadio = document.getElementById('bookingForAnother');
    const recipientNameField = document.getElementById('recipientNameField');

    guestRadio.addEventListener('change', function() {
        if (guestRadio.checked) {
            recipientNameField.style.display = 'none';
        }
    });

    bookingForAnotherRadio.addEventListener('change', function() {
        if (bookingForAnotherRadio.checked) {
            recipientNameField.style.display = 'block';
        }
    });
});
</script>
@endsection