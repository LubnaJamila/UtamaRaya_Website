@extends('backend.template')
@section('content')
    <div class="container dashboard-umkm mt-4">
        <h5 class="card-title mb-2">Produk Anda</h5>
        <a type="button" class="btn btn-info" href="{{ route('produk.create') }}">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskipsi Singkat</th>
                        <th>Foto Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tahu Laut</td>
                        <td>20.000</td>
                        <td>Dibuat denganbebrabgai bumbu dan campuran bahan laut.</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>
                            <a href="{{ route('produk.edit') }}" class="btn btn-warning m-0" style="font-weight: 800">
                                <i class="fas fa-edit ml-2"></i>
                            </a>
                            <button style="font-weight: 800" class="btn btn-danger m-0">
                                <i class="fas fa-trash ml-2"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
