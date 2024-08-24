<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img {
            max-width: 100%;
            height: auto;
        }

        .card-body {
            padding: 20px;
        }

        .header-container {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-img {
            flex-shrink: 0;
            max-width: 300px;
            border-radius: 10px;
        }

        .date-inputs {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 20px;
        }

        .date-inputs input {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row card-container">
            <div class="card-body">
                <div class="header-container">
                    <img src="{{ asset('gambar/kamar.png') }}" class="header-img" alt="Gambar Kamar"
                        style="max-width: 200px">
                    <div>
                        <h5 class="card-title">{{ $tipeKamar->nama_kamar }}</h5>
                        <p class="card-text">Harga Weekdays:
                            Rp{{ number_format($tipeKamar->harga_weekdays, 0, ',', '.') }}</p>
                        <p class="card-text">Harga Weekend:
                            Rp{{ number_format($tipeKamar->harga_weekend, 0, ',', '.') }}</p>
                        <p class="card-text">Jumlah Ruangan: {{ $tipeKamar->jumlah_ruangan }}</p>
                        <p class="card-text">Deskripsi: {{ $tipeKamar->deskripsi }}</p>
                    </div>
                </div>

                <form action="{{ route('check.availability') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $tipeKamar->id_tipe_kamar }}">
                    <div class="date-inputs">
                        <div class="col-sm-4">
                            <label for="checkInDate" class="form-label" style="margin-left: 20px">Tanggal Check-In</label>
                            <input type="date" class="form-control" id="checkInDate" name="check_in_date" required>
                        </div>
                        <div class="col-sm-4" style="margin-left: 20px">
                            <label for="checkOutDate" class="form-label">Tanggal Check-Out</label>
                            <input type="date" class="form-control" id="checkOutDate" name="check_out_date" required>
                        </div>
                        <div class="col-sm d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Cek Ketersediaan Kamar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
