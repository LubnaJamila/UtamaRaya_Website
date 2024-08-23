@extends('backend.template')
@section('content')
<!-- Breadcrumbs Start -->
<div class="breadcrumbs">
    <div class="page-header-booking d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Detail Akomodasi</h2>
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
                    <div class="text">Reschedule</div>
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
                            <p><strong>No Kamar:</strong> {{ $booking->NoKamar->no_kamar }}</p>
                            <p><strong>Tipe Kamar:</strong> {{ $booking->NoKamar->Penginapan->nama_kamar }}</p>
                            <p><strong>Tanggal Check-in:</strong> {{ $booking->tanggal_checkin }}</p>
                            <p><strong>Tanggal Check-out:</strong> {{ $booking->tanggal_checkout }}</p>
                        </div>

                        <form action="{{ route('reschedule.checkAvailabilityReschedule') }}" method="POST">
                            @csrf
                            <input type="text" name="id_booking" value="{{ $booking->id_booking }}">
                            <input type="text" name="room_id"
                                value="{{ $booking->NoKamar->Penginapan->id_tipe_kamar }}">
                            <div class="date-inputs row">
                                <div class="col-sm-4">
                                    <label for="checkInDate" class="form-label">Tanggal Check-In Baru</label>
                                    <input type="date" class="form-control" id="checkInDate" name="check_in_date">
                                </div>
                                <div class="col-sm-4">
                                    <label for="checkOutDate" class="form-label">Tanggal Check-Out Baru</label>
                                    <input type="date" class="form-control" id="checkOutDate" name="check_out_date">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-orange w-100">Cek Ketersediaan Kamar</button>
                                </div>
                            </div>
                        </form>

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