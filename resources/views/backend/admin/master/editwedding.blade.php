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
        <h5 class="card-title mb-3">Edit Paket Wedding</h5>
        <div class="card mb-4">
            <div class="card-body">
            <form action="{{ route('wedding.update', $data_wedding->id_wedding ?? '') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($data_wedding))
                @method('PUT')
                @endif
                    <div class="form-group mb-3">
                        <label for="namaPaket">Nama Paket Wedding</label>
                        <input type="text" class="form-control" id="namaPaket" name="nama_paket" value="{{ $data_wedding->nama_paket ?? '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="hargaProduk">Harga Paket</label>
                        <input type="number" class="form-control" id="hargaProduk" name="harga_paket"value="{{ $data_wedding->harga_paket ?? '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fotoProduk">Foto</label>
                        @if(isset($data_wedding) && $data_wedding->gambar_paket)
                            <div class="mb-2">
                                <img src="{{ asset($data_wedding->gambar_paket) }}" alt="Gambar Wedding" width="150" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="fotoProduk" name="gambar_paket" {{ isset($data_wedding) ? '' : 'required' }}>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-orange">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
