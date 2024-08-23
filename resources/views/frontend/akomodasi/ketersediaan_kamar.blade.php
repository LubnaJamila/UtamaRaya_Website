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
        <h3>Detail Kamar</h3>

        <p>Nama Kamar: {{ $roomType->nama_kamar }}</p>
        <p>Tanggal Check-In: {{ $checkInDate }}</p>
        <p>Tanggal Check-Out: {{ $checkOutDate }}</p>
        <p>Jumlah Malam Menginap: {{ $numberOfNights }} malam</p>
        <p>Total Harga: Rp{{ number_format($totalPrice, 0, ',', '.') }}</p>

        <h4>Kamar yang Tersedia:</h4>
        @if($availableRooms->isEmpty())
        <p>Tidak ada kamar tersedia untuk tanggal yang dipilih.</p>
        @else
        <form action="{{ route('booking.form') }}" method="GET">
            <input type="text" name="room_type_id" value="{{ $roomType->id_tipe_kamar }}">
            <input type="hidden" name="room_type" value="{{ $roomType->nama_kamar }}">
            <input type="hidden" name="check_in_date" value="{{ $checkInDate }}">
            <input type="hidden" name="check_out_date" value="{{ $checkOutDate }}">
            <input type="hidden" name="number_of_nights" value="{{ $numberOfNights }}">
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">

            <select class="form-select mb-3" name="selected_room" aria-label="Kamar yang Tersedia" required>
                <option value="" disabled selected>Pilih Nomor Kamar</option>
                @foreach ($availableRooms as $room)
                <option value="{{ $room->id_no_kamar }}">Nomor Kamar: {{ $room->no_kamar }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>
        @endif
    </div>
</body>

</html>