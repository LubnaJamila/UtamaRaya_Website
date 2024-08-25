@extends('backend.template')
@section('content')
    <style>
        .card-info {
            background-color: #17a2b8;
            color: white;
        }

        .card-warning {
            background-color: #ffc107;
            color: white;
        }

        .card-succes {
            background-color: green;
            color: white
        }

        .card {
            border: none;
        }
    </style>
    <div class="container dashboard-umkm mt-4">
        <h5 class="card-title mb-2">Dashboard Langganan UMKM</h5>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3">
                <a>
                    <div class="card card-warning text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Status Langganan</h5>
                            <hr>
                            @foreach ($statuses as $status)
                                <p class="card-text">{{ $status }}</p>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-3">
                <a>
                    <div class="card card-info text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal Mulai</h5>
                            <hr>
                            @foreach ($startDates as $startDate)
                                <p class="card-text">{{ $startDate }}</p>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a>
                    <div class="card card-succes text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal Akhir</h5>
                            <hr>
                            @foreach ($endDates as $endDate)
                                <p class="card-text">{{ $endDate }}</p>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi Produk</th>
                            <th>Gambar Produk</th>
                        </tr>
                    </thead>
                    @foreach ($data_produk as $item)
                        <tr>
                            <td class="text-center text-primary">{{ $loop->iteration }}</td>
                            <td class="text-primary">{{ $item->nama_produk }}</td>
                            <td class="text-primary">{{ $item->deskripsi_produk }}</td>
                            <td class="text-primary">
                                <img src="{{ asset($item->gambar_produk) }}" alt="Gambar Produk"
                                    style="width: 50px; height: auto;">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
