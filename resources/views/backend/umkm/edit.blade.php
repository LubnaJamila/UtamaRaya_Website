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
                <form>
                    <div class="form-group mb-3">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="hargaProduk">Harga</label>
                        <input type="number" class="form-control" id="hargaProduk" name="hargaProduk" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsiSingkat">Deskripsi Singkat</label>
                        <textarea class="form-control" id="deskripsiSingkat" name="deskripsiSingkat" rows="2" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fotoProduk">Foto Produk</label>
                        <input type="file" class="form-control" id="fotoProduk" name="fotoProduk" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-orange">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
