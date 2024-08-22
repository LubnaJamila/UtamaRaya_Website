@extends('backend.template')
@section('content')
    <div class="container dashboard-akomodasi mt-4">
        <h5 class="card-title mb-2">Daftar Akomodasi</h5>
        <a type="button" class="btn btn-info" href="{{ route('akomodasi.create') }}">
            <i class="fas fa-plus"></i> Tambah Akomodasi
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kamar</th>
                        <th>Harga Weekdays</th>
                        <th>Harga Weekend</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data_penginapan as $item)
                <tr>
                <td class="text-center text-primary">{{ $loop->iteration }}</td>
                <td class="text-primary">{{ $item->nama_kamar}}</td>
                <td class="text-primary">{{ $item->harga_weekdays}}</td>
                <td class="text-primary">{{ $item->harga_weekend}}</td>
                <td class="text-primary">
                        @php
                            $deskripsiArray = json_decode($item->deskripsi, true);
                        @endphp
                        <ul>
                            @foreach($deskripsiArray as $deskripsi)
                                <li>{{ $deskripsi }}</li>
                            @endforeach
                        </ul>
                    </td>
                <td class="text-primary">
                        <img src="{{ asset($item->gambar_kamar) }}" alt="Gambar Paket" style="width: 50px; height: auto;">
                    </td>
                <td>
                <a class="btn btn-warning mb-1" style="font-weight: 800"
                href="{{ route('akomodasi.edit', $item->id_tipe_kamar) }}"><i class="fas fa-edit ml-2"></i></a>
                <form action="{{ route('hapus.penginapan', $item->id_tipe_kamar) }}" method="POST" style="display:inline;">
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