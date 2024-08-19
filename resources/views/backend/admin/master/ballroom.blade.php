@extends('backend.template')
@section('content')
    <div class="container dashboard-akomodasi mt-4">
        <h5 class="card-title mb-2">Daftar Ballroom Wedding</h5>
        <a type="button" class="btn btn-info" href="{{ route('ballroom.create') }}">
            <i class="fas fa-plus"></i> Tambah Paket Ballroom
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama Paket Wedding</th>
                        <th>Harga Paket</th>
                        <th>Deskripsi Paket</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Wedding Teras Pantai</td>
                        <td>20.000.000</td>
                        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A neque repellendus in perspiciatis
                            similique atque ad amet architecto aut ab! Cum ab alias similique, placeat rerum perferendis sed
                            delectus non.</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>
                            <a href="{{ route('ballroom.edit') }}" class="btn btn-warning mb-1" style="font-weight: 800">
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
