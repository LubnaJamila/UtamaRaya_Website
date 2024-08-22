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
                        <th>No</th>
                        <th>Nama Paket Wedding</th>
                        <th>Harga Paket</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data_wedding as $item)
                <tr>
                <td class="text-center text-primary">{{ $loop->iteration }}</td>
                <td class="text-primary">{{ $item->nama_paket}}</td>
                <td class="text-primary">{{ $item->harga_paket}}</td>
                <td class="text-primary">
                        <img src="{{ asset($item->gambar_paket) }}" alt="Gambar Paket" style="width: 50px; height: auto;">
                    </td>
                <td>
                <a class="btn btn-warning mb-1" style="font-weight: 800" href="{{ route('ballroom.edit', $item->id_wedding) }}"><i class="fas fa-edit ml-2"></i></a>
                <form action="{{ route('hapuswedding', $item->id_wedding) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm icon-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <i class="fas fa-trash-alt"></i>
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
