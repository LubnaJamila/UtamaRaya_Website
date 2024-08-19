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
        <h5 class="card-title mb-3">Edit Produk</h5>
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
