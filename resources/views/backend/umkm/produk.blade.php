@extends('backend.template')
@section('content')
<div class="container dashboard-umkm mt-4">
        <h5 class="card-title mb-2">Produk Anda</h5>
        @if($product_count >= 3)
            <button type="button" class="btn btn-info" disabled>
                <i class="fas fa-plus"></i> Tambah Produk
            </button>
        @else
            <a type="button" class="btn btn-info" href="{{ route('produk.create') }}">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Deskipsi Produk</th>
                        <th>Gambar Produk</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data_produk as $item)
                <tr>
                <td class="text-center text-primary">{{ $loop->iteration }}</td>
                <td class="text-primary">{{ $item->nama_produk}}</td>
                <td class="text-primary">{{ $item->harga_produk}}</td>
                <td class="text-primary">{{ $item->deskripsi_produk }}</td>
                <td class="text-primary">
                        <img src="{{ asset($item->gambar_produk) }}" alt="Gambar Produk" style="width: 50px; height: auto;">
                    </td>
                <td>
                <a class="btn btn-primary btn-sm icon-btn"
                href="{{ route('produk.edit', $item->id_produk) }}"><i
                class="fas fa-edit"></i></a>
                </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
