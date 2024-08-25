@extends('backend.template')
@section('content')
    <div class="container dashboard-umkm mt-4">
        <h5 class="card-title mb-2">Dashboard Langganan UMKM</h5>
    </div>
    <div class="container mt-5">
    <div class="row">
        <!-- Card for Status -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">Status Langganan</h5>
                    @foreach ($statuses as $status)
                    <p class="card-text">{{ $status }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Card for Tanggal Mulai -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">Tanggal Mulai</h5>
                    @foreach ($startDates as $startDate)
                    <p class="card-text">{{ $startDate }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Card for Tanggal Akhir -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">Tanggal Akhir</h5>
                    @foreach ($endDates as $endDate)
                    <p class="card-text">{{ $endDate }}</p>
                    @endforeach
                </div>
            </div>
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
                <td class="text-primary">{{ $item->nama_produk}}</td>
                <td class="text-primary">{{ $item->deskripsi_produk }}</td>
                <td class="text-primary">
                        <img src="{{ asset($item->gambar_produk) }}" alt="Gambar Produk" style="width: 50px; height: auto;">
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
