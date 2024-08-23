@extends('backend.template')
@section('content')
<div class="container dashboard-validasi mt-4">
    <h5 class="card-title mb-2">Data Pembayaran</h5>
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{route('pembayaran')}}">
                <div class="card card-info text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Pengajuan Booking</h5>
                        <hr>
                        <h1 class="card-content">{{$jumlahPengajuanBooking,}}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class=" col-md-3 mb-3">
            <a href="{{route('pembayaran.booking')}}">
                <div class="card card-warning text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Booking</h5>
                        <hr>
                        <h1 class="card-content">{{$jumlahBooking}}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{route('pembayaran.checkin')}}">
                <div class="card card-info text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Check In</h5>
                        <hr>
                        <h1 class="card-content">{{$jumlahCheckin}}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{route('pembayaran.checkout')}}">
                <div class="card card-warning text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Checkout</h5>
                        <hr>
                        <h1 class="card-content">{{$jumlahCheckout}}</h1>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
<div class="card-body">
    <h5 class="card-title mb-2">Data Booking</h5>
    <div class="table-responsive">
        <table id="example" class="table table-striped" width="100%">
            <thead>
                <tr class="text-center">
                    <th>Nama </th>
                    <th>Nama Kamar</th>
                    <th>No Kamar</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Total Harga</th>
                    <th>Bukti Transfer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{$booking->User->nama_lengkap}}</td>
                    <td class="text-center"><span
                            class="btn-status">{{$booking->NoKamar->Penginapan->nama_kamar}}</span>
                    </td>
                    <td class="text-center"><span class="btn-status">{{$booking->NoKamar->no_kamar}}</span>
                    </td>
                    <td>{{$booking->tanggal_checkin}}</td>
                    <td>{{$booking->tanggal_checkout}}</td>
                    <td>Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                    <td><a href="{{ asset($booking->bukti_tf) }}" target="_blank">
                            <img src="{{ asset($booking->bukti_tf) }}" alt="Bukti Transfer" class="img-thumbnail"
                                style="max-width: 150px">
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('validasi.checkin', $booking->id_booking) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-info mb-1" style="font-weight: 800">
                                Checkin
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection