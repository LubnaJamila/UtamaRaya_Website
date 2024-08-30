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
    <h5 class="card-title mb-3">Tambah Produk</h5>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('store.penginapan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="namaProduk">Nama Kamar</label>
                    <input type="text" class="form-control" id="namaProduk" name="nama_kamar" required>
                </div>
                <div class="form-group mb-3">
                    <label for="hargaProduk">Harga Weekdays</label>
                    <input type="number" class="form-control" id="hargaProduk" name="harga_weekdays" required>
                </div>
                <div class="form-group mb-3">
                    <label for="hargaProduk">Harga Weekend</label>
                    <input type="number" class="form-control" id="hargaProduk" name="harga_weekend" required>
                </div>
                <div>
                    <label for="jumlah_ruangan">Jumlah Ruangan Tiap Kamar:</label>
                    <input type="number" class="form-control" id="jumlah_ruangan" name="jumlah_ruangan" required>
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsiSingkat">Deskripsi Singkat</label>
                    <textarea class="form-control" id="deskripsiSingkat" name="deskripsi"
                        placeholder="Gunakan tanda (,) antar kalimat. ex: AC, TV, Kulkas dst" rows="2"
                        required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="fotoProduk">Foto Produk</label>
                    <input type="file" class="form-control" id="fotoProduk" name="gambar_kamar" required>
                </div>
                <div class="form-group mb-3">
                    <label for="hargaProduk">Jumlah Nomor Kamar</label>
                    <input type="number" class="form-control" id="hargaProduk" name="jumlah_no_kamar" required>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-orange">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection