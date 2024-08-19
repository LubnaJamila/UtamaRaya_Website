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
                        <th>Status Booking</th>
                        <th>Status Pengembalian Dana</th>
                        <th>Total Pengembalian</th>
                        <th>Bukti Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>Hotel Sunset Deluxe</td>
                        <td><span class="btn-status">Dibatalkan</span></td>
                        <td>Diproses</td>
                        <td>100.000</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
