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
        <h5 class="card-title mb-3">Edit Rental Bike</h5>
        <div class="card mb-4">
            <div class="card-body">
            <form action="{{ route('rental.update', $data_rentalbike->id_rentalbike ?? '') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($data_rentalbike))
                @method('PUT')
                @endif
                    <div class="form-group mb-3">
                        <label for="namaProduk">Nama Paket Rental Bike</label>
                        <input type="text" class="form-control" id="namaProduk" name="nama_rentalbike" value="{{ $data_rentalbike->nama_rentalbike ?? '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="hargaProduk">Harga Paket Rental Bike</label>
                        <input type="number" class="form-control" id="hargaProduk" name="harga_rentalbike" value="{{ $data_rentalbike->harga_rentalbike ?? '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fotoProduk">Foto Rental Bike</label>
                        @if(isset($data_rentalbike) && $data_rentalbike->gambar_rentalbike)
                            <div class="mb-2">
                                <img src="{{ asset($data_rentalbike->gambar_rentalbike) }}" alt="Gambar Rental Bike" width="150" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="fotoProduk" name="gambar_rentalbike" {{ isset($data_rentalbike) ? '' : 'required' }}>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-orange">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
