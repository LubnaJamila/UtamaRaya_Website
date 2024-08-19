@extends('backend.template')
@section('content')
    <style>
        .card-info {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #1E90FF;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-warning {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #8B0000;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-succes {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #28a745;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-body {
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
    <div class="container dashboard-validasi mt-4">
        <h5 class="card-title mb-2">Data Langganan UMKM</h5>
        <div class="row mb-3">
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="card card-info text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Menunggu Pengaktifan</h5>
                        <hr>
                         <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="card card-succes text-center shadow-sm">
                    <div class="card-body">
                       <h5 class="card-title-content">Aktif</h5>
                        <hr>
                         <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="card card-warning text-center shadow-sm">
                    <div class="card-body">
                       <h5 class="card-title-content">Non Aktif</h5>
                        <hr>
                         <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr class="text-center">
                        <th>Nama </th>
                        <th>Status</th>
                        <th>Nama Paket</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Bukti Transaksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rohayati</td>
                        <td class="text-center"><span class="btn-status">Menunggu Pengaktifan</span></td>
                        <td>Gold</td>
                        <td>03/28/2023</td>
                        <td>03/28/2023</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>
                            <a href="" class="btn btn-info mb-1" style="font-weight: 800">
                                Aktifkan
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
