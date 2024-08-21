@extends('backend.template')
@section('content')
    <style>
        h5 {
            font-family: "Work Sans", sans-serif;
            color: #8B0000;
            font-weight: 800;
            font-size: 23px;
        }
    </style>
    <div class="col-xl-8 col-lg-10 mx-auto">
        <h5 class="mb-4">Edit Produk</h5>
        <div class="card mb-4">
            <div class="card-body">
            <form action="{{ route('produk.update', $data_produk->id_produk) }}" method="post" enctype="multipart/form-data">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                @method('PUT')
                    <div class="form-group mb-3">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{ old('nama_produk', $data_produk->nama_produk) }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="hargaProduk">Harga</label>
                        <input type="number" name="harga_produk" class="form-control" id="hargaProduk" value="{{ old('harga_produk', $data_produk->harga_produk) }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsiSingkat">Deskripsi Singkat</label>
                        <textarea class="form-control" id="deskripsiSingkat" name="deskripsi_produk" rows="2" required>{{ $data_produk->deskripsi_produk ?? '' }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fotoProduk">Foto Produk</label>
                        @if(isset($data_produk) && $data_produk->gambar_produk)
                            <div class="mb-2">
                                <img src="{{ asset($data_produk->gambar_produk) }}" alt="Gambar Produk" width="150" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="fotoProduk" name="gambar_produk" {{ isset($data_produk) ? '' : 'required' }}>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-orange">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
