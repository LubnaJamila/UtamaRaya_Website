@extends('backend.template')
@section('content')

<div class="container dashboard-umkm mt-4">
    <h5 class="card-title mb-2">Pembatalan</h5>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table table-striped" width="100%">
            <thead>
                <tr class="text-center">
                    <th>Nama Akomodasi</th>
                    <th>Nomor Kamar</th>
                    <th>Tanggal Check In</th>
                    <th>Tanggal Check Out</th>
                    <th>Status Booking</th>
                    <th>Bukti Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr class="text-center">
                    <td>{{ $booking->NoKamar->Penginapan->nama_kamar }}</td>
                    <td>{{ $booking->NoKamar->no_kamar }}</td>
                    <td>{{ $booking->tanggal_checkin }}</td>
                    <td>{{ $booking->tanggal_checkout }}</td>
                    <td><span class="btn-status">{{ $booking->status_booking }}</span></td>
                    <td><a href="{{ asset($booking->bukti_tf) }}" target="_blank">
                            @if($booking->bukti_pengembalian)
                            <img src="{{ asset($booking->bukti_pengembalian) }}" alt="Bukti Transfer"
                                class="img-thumbnail" style="max-width: 150px">
                            @else
                            <span>Pengembalian sedang diproses</span>
                            @endif
                        </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection