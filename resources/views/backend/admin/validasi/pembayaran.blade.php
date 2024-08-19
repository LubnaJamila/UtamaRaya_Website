@extends('backend.template')
@section('content')
    <div class="container dashboard-validasi mt-4">
        <h5 class="card-title mb-2">Data Pembayaran</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr class="text-center">
                        <th>Nama </th>
                        <th>Status Booking</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>DP</th>
                        <th>Bukti Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rohayati</td>
                        <td class="text-center"><span class="btn-status">Menunggu Validasi</span></td>
                        <td>03/28/2023</td>
                        <td>03/28/2023</td>
                        <td>300.000</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>
                            <a href="" class="btn btn-info mb-1" style="font-weight: 800">
                                Validasi
                            </a>
                            <a style="font-weight: 800" class="btn btn-warning mb-1">
                                Hub. Wa
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
