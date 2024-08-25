@extends('backend.template')
@section('content')
    <style>
        .form-group label {
            color: black;
            font-weight: 700;
        }
    </style>
    <!-- Breadcrumbs Start -->
    <div class="breadcrumbs">
        <div class="page-header-booking d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h5 class="card-title mb-3">Reschedule</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container akomodasidetail mb-5">
        <div class="container card-container">
            <div class="card">
                <div class="stepper">
                    <div class="step  inactive">
                        <div class="circle">1</div>
                        <div class="text">Cek Ketersediaan</div>
                    </div>
                    <div class="step">
                        <div class="circle">2</div>
                        <div class="text">Reschedule</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title-detail mb-3">
                            <div class="card-body-title">
                                <h5 class="card-title">Detail <span class="text">Penginapan Pesanan</span> Anda</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="card-detail mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Reschedule Form</h5>
                                <hr>
                                <p><strong>Nama Kamar:</strong> {{ $booking->NoKamar->Penginapan->nama_kamar }}</p>
                                <p><strong>Tanggal Check-In:</strong> {{ $checkInDate }}</p>
                                <p><strong>Tanggal Check-Out:</strong> {{ $checkOutDate }}</p>
                                <p><strong>Jumlah Malam Menginap:</strong> {{ $numberOfNights }} malam</p>
                                <p><strong>Total Harga:</strong> Rp{{ number_format($totalPrice, 0, ',', '.') }}</p>
                                <h5 class="card-title">Kamar Yang Tersedia</h5>
                                <hr>
                                @if ($availableRooms->isEmpty())
                                    <p>Tidak ada kamar tersedia untuk tanggal yang dipilih.</p>
                                @else
                                    <form action="{{ route('reschedule.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input style="display: none" type="text" name="booking_id"
                                            value="{{ $booking->id_booking }}">
                                        <input style="display: none" type="text" name="check_in_date"
                                            value="{{ $checkInDate }}">
                                        <input style="display: none" type="text" name="check_out_date"
                                            value="{{ $checkOutDate }}">
                                        <input style="display: none" type="text" name="total_price"
                                            value="{{ $totalPrice }}">


                                        <div class="form-group mt-4">
                                            <label for="availableRooms">Pilih Kamar Tersedia</label>
                                            <select class="form-select mb-3" name="selected_room_id"
                                                aria-label="Kamar yang Tersedia" required>
                                                <option value="" disabled selected>Pilih Nomor Kamar</option>
                                                @foreach ($availableRooms as $room)
                                                    <option value="{{ $room->id_no_kamar }}">Nomor Kamar:
                                                        {{ $room->no_kamar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success mt-4">Reschedule Booking</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
