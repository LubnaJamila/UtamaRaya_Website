@extends('backend.template')
@section('content')
    <style>
        .card-title {
            font-family: var(--font-second);
            color: var(--color-red);
            font-weight: 700;
        }

        .card label {
            font-family: var(--font-primary);
            color: black;
            font-weight: 700;
        }

        .card {
            border: 1px solid;
            border-color: #8B0000;
        }

        .card input,
        .card textarea {
            border: 1px solid;
            border-color: #8B0000;
        }
    </style>
    <div class="col-xl-8 col-lg-10 mx-auto">
        <h5 class="card-title mb-3">Edit Water Sport</h5>
        <div class="card mb-4">
            <div class="card-body">
            <form action="{{ route('water.update', $data_watersport->id_watersport ?? '') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($data_watersport))
                @method('PUT')
                @endif
                    <div class="form-group mb-3">
                        <label for="namaProduk">Nama Paket Water Sport</label>
                        <input type="text" class="form-control" id="namaProduk" name="nama_watersport" value="{{ $data_watersport->nama_watersport ?? '' }}" required>
                    </div>
                 
                    <div class="form-group mb-3">
                        <label for="hargaProduk">Harga</label>
                        <input type="number" class="form-control" id="hargaProduk" name="harga_watersport" value="{{ $data_watersport->harga_watersport ?? '' }}"required>
                    </div>
                       <div class="form-group mb-3">
                        <label for="deskripsiProduk">Deskripsi</label>
                        <input type="text" class="form-control" id="namaProduk" name="deskripsi" value="{{ $data_watersport->deskripsi ?? '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fotoProduk">Gambar</label>
                        @if(isset($data_watersport) && $data_watersport->gambar_watersport)
                            <div class="mb-2">
                                <img src="{{ asset($data_watersport->gambar_watersport) }}" alt="Gambar Water Sport" width="150" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="fotoProduk" name="gambar_watersport" {{ isset($data_watersport) ? '' : 'required' }}>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-orange">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
