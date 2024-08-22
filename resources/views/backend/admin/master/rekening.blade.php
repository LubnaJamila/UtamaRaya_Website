@extends('backend.template')
@section('content')
    <div class="container dashboard-validasi mt-4">
        <h5 class="card-title mb-2">Data Rekening</h5>
        <a type="button" class="btn btn-info" href="{{ route('rekening.create') }}">
            <i class="fas fa-plus"></i> Tambah Rekening
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>Nama Bank</th>
                        <th>No Rekening</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($banks as $item)
                <tr>
                <td class="text-center text-primary">{{ $loop->iteration }}</td>
                <td class="text-primary">{{ $item->nama_pemilik}}</td>
                <td class="text-primary">{{ $item->nama_bank}}</td>
                <td class="text-primary">{{ $item->no_rek}}</td>
                <td>
                <form action="{{ route('hapus.rekening', $item->id_rek) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-1" style="font-weight: 800" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
