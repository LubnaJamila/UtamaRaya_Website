@extends('backend.template')
@section('content')
    <div class="container dashboard-rental_bike mt-4">
        <h5 class="card-title mb-2">Daftar Rental Bike</h5>
        <a type="button" class="btn btn-info" href="{{ route('rental.create') }}">
            <i class="fas fa-plus"></i> Tambah Data Rental
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama Sepeda</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>Sepeda tandem dewasa (2orang)</td>
                        <td>20.000</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>

                            <a href="{{ route('rental.edit') }}" class="btn btn-warning m-0">
                                <i class="fas fa-edit "></i>
                            </a>
                            <a class="btn btn-danger m-0">
                                <i class="fas fa-trash "></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
