<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Ketersediaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h3>Reschedule Form</h3>

        <p>Nama Kamar: {{  $booking->NoKamar->Penginapan->nama_kamar }}</p>
        <p>Tanggal Check-In: {{ $checkInDate }}</p>
        <p>Tanggal Check-Out: {{ $checkOutDate }}</p>
        <p>Jumlah Malam Menginap: {{ $numberOfNights }} malam</p>
        <p>Total Harga: Rp{{ number_format($totalPrice, 0, ',', '.') }}</p>

        <h4>Kamar yang Tersedia:</h4>
        @if($availableRooms->isEmpty())
        <p>Tidak ada kamar tersedia untuk tanggal yang dipilih.</p>
        @else
        <form action="{{ route('reschedule.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="booking_id" value="{{ $booking->id_booking }}">
            <input type="text" name="check_in_date" value="{{ $checkInDate }}">
            <input type="text" name="check_out_date" value="{{ $checkOutDate }}">
            <input type="text" name="total_price" value="{{ $totalPrice }}">


            <div class="form-group mt-4">
                <label for="availableRooms">Pilih Kamar Tersedia</label>
                <select class="form-select mb-3" name="selected_room_id" aria-label="Kamar yang Tersedia" required>
                    <option value="" disabled selected>Pilih Nomor Kamar</option>
                    @foreach ($availableRooms as $room)
                    <option value="{{ $room->id_no_kamar }}">Nomor Kamar: {{ $room->no_kamar }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-4">Reschedule Booking</button>
        </form>
        @endif
    </div>
</body>


</html>