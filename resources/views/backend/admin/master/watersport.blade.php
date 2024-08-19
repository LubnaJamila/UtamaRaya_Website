@extends('backend.template')
@section('content')
    <div class="container dashboard-rental_bike mt-4">
        <h5 class="card-title mb-2">Daftar Water Sport</h5>
        <a type="button" class="btn btn-info" href="{{ route('water.create') }}">
            <i class="fas fa-plus"></i> Tambah Data Water Sport

        </a>
        <a type="button" class="btn btn-warning" href="{{ route('water.create') }}">
            <i class="fas fa-plus"></i> Tambah Data Cuaca
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama Water Sport</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Banan Boat</td>
                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore nulla commodi vel. At
                            laboriosam natus accusantium sint nam, porro eos molestiae odit amet corrupti hic fugit
                            cupiditate magnam tempora ullam.</td>
                        <td>20.000</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>
                            <a href="{{ route('rental.edit') }}" class="btn btn-warning mb-1" style="font-weight: 800">
                                <i class="fas fa-edit ml-2"></i>
                            </a>
                            <a style="font-weight: 800" class="btn btn-danger m-0">
                                <i class="fas fa-trash ml-2"></i>
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
