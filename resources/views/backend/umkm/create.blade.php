@extends('backend.template')
@section('content')
    <style>
        h5 {
            font-family: "Work Sans", sans-serif;
            color: #8B0000;
            font-weight: 800;
            font-size: 23px;
        }

        .card-body label {
            font-weight: 700;
        }

        .card {
            border-color: #8B0000;
        }

        .form-group input,
        .form-group textarea {
            border-color: #8B0000;
        }
    </style>
    <div class="col-xl-8 col-lg-10 mx-auto">
        <h5 class="mb-4" >Tambah Produk</h5>
        <div class="card mb-4">
            <div class="card-body">
            <form action="{{ route('store.produk') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group mb-3">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control" id="namaProduk" name="nama_produk" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="hargaProduk">Harga</label>
                        <input type="number" class="form-control" id="hargaProduk" name="harga_produk" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsiSingkat">Deskripsi Singkat</label>
                        <textarea class="form-control" id="deskripsiSingkat" name="deskripsi_produk" rows="2" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fotoProduk">Foto Produk</label>
                        <input type="file" class="form-control" id="fotoProduk" name="gambar_produk" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-orange">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
