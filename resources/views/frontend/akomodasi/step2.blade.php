@extends('body')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<div class="breadcrumbs">
    <div class="page-header-booking d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Pembayaran Penginapan</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container akomodasidetail py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="stepper">
                    <div class="step inactive">
                        <div class="circle">1</div>
                        <div class="text">Cek Ketersediaan</div>
                    </div>
                    <div class="step">
                        <div class="circle">2</div>
                        <div class="text">Kamar</div>
                    </div>
                    <div class="step inactive">
                        <div class="circle">3</div>
                        <div class="text">Pembayaran</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title-detail mb-3">
                            <div class="card-body-title">
                                <h5 class="card-title">Detail <span class="text">Akomodasi Pesanan</span> Anda</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="card-detail mb-4">
                            <div class="card-body">
                                <form id="KamarTersedia" action="{{ route('booking.form') }}" method="GET">
                                    <h5 class="card-title">{{ $roomType->nama_kamar }}</h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="date-card text-center">
                                            <p class="mb-1">Check-in</p>
                                            <h6 class="mb-0">{{ $checkInDate }}</h6>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="divider-line"></div>
                                            <p class="mb-0 mx-2">{{ $numberOfNights }} night</p>
                                            <div class="divider-line"></div>
                                        </div>

                                        <div class="date-card text-center">
                                            <p class="mb-1">Check-out</p>
                                            <h6 class="mb-0">{{ $checkOutDate }}</h6>
                                        </div>
                                    </div>
                                    <h5>Kamar yang Tersedia</h5>
                                    @if ($availableRooms->isEmpty())
                                    <p>Tidak ada kamar tersedia untuk tanggal yang dipilih.</p>
                                    @else
                                    <input type="hidden" name="id_user"
                                        value="{{ Auth::check() ? Auth::user()->id : '' }}">
                                    <input type="hidden" name="room_type_id" value="{{ $roomType->id_tipe_kamar }}">
                                    <input type="hidden" name="room_type" value="{{ $roomType->nama_kamar }}">
                                    <input type="hidden" name="check_in_date" value="{{ $checkInDate }}">
                                    <input type="hidden" name="check_out_date" value="{{ $checkOutDate }}">
                                    <input type="hidden" name="number_of_nights" value="{{ $numberOfNights }}">
                                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                                    <select class="form-select mb-3" name="selected_room"
                                        aria-label="Kamar yang Tersedia" required>
                                        <option value="" disabled selected>Pilih Nomor Kamar</option>
                                        @foreach ($availableRooms as $room)
                                        <option value="{{ $room->id_no_kamar }}">Nomor Kamar:
                                            {{ $room->no_kamar }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @endif
                                    <div class="request-section">
                                        <h5>Detail Pembayaran</h5>
                                        <p class="text-muted">Pembatalan masih dapat berlaku h-1 minggu dari tanggal
                                            check-in!
                                        </p>
                                        <hr>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <h5>Total Pembayaran :</h5>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span style="font-weight: 700; font-size:18px"
                                                    id="total-payment">{{ number_format($totalPrice, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePaymentForms() {
    const bankTransfer = document.getElementById('bank_transfer').checked;
    const ewallet = document.getElementById('ewallet').checked;

    document.getElementById('bank-options').classList.toggle('d-none', !bankTransfer);
    document.getElementById('ewallet-options').classList.toggle('d-none', !ewallet);

    if (bankTransfer) {
        resetBankForms();
    } else if (ewallet) {
        resetEwalletForms();
    }
}

const bookingForm = document.getElementById('KamarTersedia');
bookingForm.addEventListener('submit', function(event) {
    const userIdInput = document.querySelector('input[name="id_user"]').value;
    if (!userIdInput) {
        event.preventDefault();
        Swal.fire({
            title: 'Silakan Login',
            text: 'Anda harus login terlebih dahulu untuk melakukan booking.',
            icon: 'warning',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = "{{ route('login') }}";
        });
    }
});

function toggleBankForm() {
    const selectedBank = document.getElementById('bank-select').value;
    resetBankForms();

    if (selectedBank === 'mandiri') {
        document.getElementById('bank-form-mandiri').classList.remove('d-none');
    } else if (selectedBank === 'bca') {
        document.getElementById('bank-form-bca').classList.remove('d-none');
    } else if (selectedBank === 'bri') {
        document.getElementById('bank-form-bri').classList.remove('d-none');
    } else if (selectedBank === 'other') {
        document.getElementById('bank-form-other').classList.remove('d-none');
    }
}

function toggleEwalletForm() {
    const selectedEwallet = document.getElementById('ewallet-select').value;
    resetEwalletForms();

    if (selectedEwallet === 'gopay') {
        document.getElementById('ewallet-form-gopay').classList.remove('d-none');
    } else if (selectedEwallet === 'dana') {
        document.getElementById('ewallet-form-dana').classList.remove('d-none');
    } else if (selectedEwallet === 'shopeepay') {
        document.getElementById('ewallet-form-shopeepay').classList.remove('d-none');
    } else if (selectedEwallet === 'other') {
        document.getElementById('ewallet-form-other').classList.remove('d-none');
    }
}

function resetBankForms() {
    document.getElementById('bank-form-mandiri').classList.add('d-none');
    document.getElementById('bank-form-bca').classList.add('d-none');
    document.getElementById('bank-form-bri').classList.add('d-none');
    document.getElementById('bank-form-other').classList.add('d-none');
}

function resetEwalletForms() {
    document.getElementById('ewallet-form-gopay').classList.add('d-none');
    document.getElementById('ewallet-form-dana').classList.add('d-none');
    document.getElementById('ewallet-form-shopeepay').classList.add('d-none');
    document.getElementById('ewallet-form-other').classList.add('d-none');
}
</script>
@endsection