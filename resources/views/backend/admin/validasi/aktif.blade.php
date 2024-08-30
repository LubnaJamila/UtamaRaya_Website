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
    <h5 class="card-title mb-2">Data Langganan UMKM Aktif</h5>
    <div class="row mb-3">
        <div class="col-lg-4 col-md-4 mb-3">
            <a href="{{route('validasi.umkm')}}">
                <div class="card card-info text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Menunggu Pengaktifan</h5>
                        <hr>
                        <h1 class="card-content">{{$jumlahMenunggu}}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 mb-3">
            <a href="{{route('validasi.umkm_aktif')}}">
                <div class="card card-succes text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Aktif</h5>
                        <hr>
                        <h1 class="card-content">{{$jumlahAktif}}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 mb-3">
            <a href="{{route('validasi.umkm_nonaktif')}}">
                <div class="card card-warning text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Non Aktif</h5>
                        <hr>
                        <h1 class="card-content">{{$jumlahNonAktif}}</h1>
                    </div>
                </div>
            </a>
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
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Bukti Transaksi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($langganan as $item)
                <tr>
                    <td>{{ $item->User->nama_lengkap }}</td>
                    <td class="text-center"><span class="btn-status">{{ $item->status_langganan }}</span></td>
                    <td>{{ $item->tanggal_mulai }}</td>
                    <td>{{ $item->tanggal_berakhir }}</td>
                    <td><img src="{{ asset($item->bukti_tf) }}" alt="Foto Produk" class="img-thumbnail"
                            style="max-width: 150px"></td>
                    <td>
                        <form action="{{ route('validasi.nonaktif', $item->id_langganan) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-info mb-1"
                                style="font-weight: 800">Non-Aktifkan</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection