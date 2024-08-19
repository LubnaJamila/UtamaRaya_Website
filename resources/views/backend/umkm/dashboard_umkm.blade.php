@extends('backend.template')
@section('content')
    <div class="container dashboard-umkm mt-4">
        <h5 class="card-title mb-2">Dashboard Langganan UMKM</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>Nama Paket</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Bukti Transaksi</th>
                        <th>Iklan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Greta</td>
                        <td>Menunggu Pengaktifan</td>
                        <td class="text-center"><span class="btn-package package-platinum">Platinum</span></td>
                        <td>2011/04/25</td>
                        <td>2021/04/25</td>
                        <td>image</td>
                        <td><span class="btn-iklan">Perpanjang</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
