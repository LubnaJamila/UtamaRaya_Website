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
                        <th>No</th>
                        <th>Nama Rental Bike</th>
                        <th>Harga Rental Bike</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_rentalbike as $item)
                    <tr>
                    <td class="text-center text-primary">{{ $loop->iteration }}</td>
                    <td class="text-primary">{{ $item->nama_rentalbike}}</td>
                    <td class="text-primary">{{ $item->harga_rentalbike}}</td>
                    <td class="text-primary">
                            <img src="{{ asset($item->gambar_rentalbike) }}" alt="Gambar Produk" style="width: 50px; height: auto;">
                        </td>
                        <td>
                            <a href="{{ route('rental.edit', $item->id_rentalbike) }}" class="btn btn-warning mb-1" style="font-weight: 800">
                                <i class="fas fa-edit ml-2"></i>
                            </a>
                        <form action="{{ route('hapusrental', $item->id_rentalbike) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="font-weight: 800" class="btn btn-danger m-0" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <i class="fas fa-trash ml-2"></i>
                        </button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
