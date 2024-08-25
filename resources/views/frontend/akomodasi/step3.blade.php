@extends('body')
@section('content')
    <style>
        .akomodasidetail label {
            font-weight: 700;
        }
    </style>

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
                        <div class="step inactive">
                            <div class="circle">2</div>
                            <div class="text">Kamar</div>
                        </div>
                        <div class="step">
                            <div class="circle">3</div>
                            <div class="text">Pembayaran</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-title-detail mb-3">
                                <div class="card-body-title">
                                    <h5 class="card-title">Form <span class="text">Booking</span> Pesanan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card-detail mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <p><b>Nama Kamar: </b>{{ $request->room_type }}</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p><b>Jumlah Malam Menginap: </b>{{ $request->number_of_nights }} malam</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p><b>Tanggal Check-In: </b>{{ $request->check_in_date }}</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p><b>Tanggal Check-Out: </b>{{ $request->check_out_date }}</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p><b>Nomor Kamar: </b>{{ $selectedRoom->no_kamar }}</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p><b>Total Harga: </b>Rp{{ number_format($request->total_price, 0, ',', '.') }}
                                            </p>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <p><b>Uang Muka (50%):
                                                </b>Rp{{ number_format($request->total_price * 0.5, 0, ',', '.') }}</p>
                                        </div>
                                    </div>


                                    <form id="bookingForm" action="{{ route('booking.submit') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div style="display: none;">
                                            <input type="text" name="id_user"
                                                value="{{ Auth::check() ? Auth::user()->id : '' }}">
                                            <input type="text" name="tanggal_checkin"
                                                value="{{ $request->check_in_date }}">
                                            <input type="text" name="tanggal_checkout"
                                                value="{{ $request->check_out_date }}">
                                            <input type="text" name="total_harga" value="{{ $request->total_price }}">
                                            <input type="text" name="min_dp" value="{{ $request->total_price * 0.5 }}">
                                            <input type="text" name="id_no_kamar"
                                                value="{{ $selectedRoom->id_no_kamar }}">
                                        </div>
                                        <hr>
                                        <div class="mb-3">
                                            <label for="id_rek" class="form-label">Metode Pembayaran</label>
                                            <select class="form-select" id="id_rek" name="id_rek" required>
                                                <option value="">Pilih Metode Pembayaran</option>
                                                @foreach ($rekPembayaran as $rek)
                                                    <option value="{{ $rek->id_rek }}">{{ $rek->nama_bank }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div id="paymentDetails" class="mb-3" style="display: none;">
                                            <p><b>Nama Pemilik Rekening: </b><span id="namaPemilik"></span></p>
                                            <p><b>Nomor Rekening: </b><span id="noRek"></span></p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bukti_tf" class="form-label">Bukti Transfer</label>
                                            <input type="file" class="form-control" id="bukti_tf" name="bukti_tf"
                                                required>
                                        </div>

                                        <p class="text-center mb-4">Silakan lakukan pembayaran atau DP sebesar
                                            <strong>30%</strong> ke
                                            nomor
                                            BRIVA di atas.
                                        </p>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="timeout-alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-0 w-100 d-none"
        role="alert" style="z-index: 1051; animation: slideDown 0.5s;">
        <strong>Waktu Habis!</strong> Waktu pembayaran Anda telah habis. Silakan lakukan pemesanan ulang.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const rekPembayaranData = @json($rekPembayaran);
            console.log('Data Rek Pembayaran:', rekPembayaranData);

            function updatePaymentDetails() {
                const selectedRekId = document.getElementById('id_rek').value;
                console.log('Selected Rek ID:', selectedRekId);
                const paymentDetails = rekPembayaranData.find(rek => rek.id_rek == selectedRekId);

                if (paymentDetails) {
                    console.log('Payment Details:', paymentDetails);
                    document.getElementById('namaPemilik').textContent = paymentDetails.nama_pemilik;
                    document.getElementById('noRek').textContent = paymentDetails.no_rek;
                    document.getElementById('paymentDetails').style.display = 'block';
                } else {
                    document.getElementById('paymentDetails').style.display = 'none';
                }
            }

            document.getElementById('id_rek').addEventListener('change', updatePaymentDetails);

            // Tambahkan SweetAlert jika user tidak login
            const bookingForm = document.getElementById('bookingForm');
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
                        window.location.href = "{{ route('home') }}"; // Arahkan ke halaman login
                    });
                }
            });
        });

        const countdownElement = document.getElementById('countdown-timer');
        const savedEndTime = localStorage.getItem('paymentEndTime');
        let endTime;

        if (savedEndTime) {
            endTime = new Date(savedEndTime).getTime();
        } else {
            endTime = new Date().getTime() + (60 * 60 * 1000); // 1 hour from now
            localStorage.setItem('paymentEndTime', new Date(endTime).toISOString());
        }

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = endTime - now;

            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = `${hours} : ${minutes} : ${seconds}`;

            if (distance < 0) {
                clearInterval(countdownInterval);
                countdownElement.innerHTML = "Waktu Habis";
                showTimeoutAlert();
                localStorage.removeItem('paymentEndTime'); // Clear the saved end time
            }
        }

        const countdownInterval = setInterval(updateCountdown, 1000);

        function showTimeoutAlert() {
            const alertElement = document.getElementById('timeout-alert');
            alertElement.classList.remove('d-none');
        }

        document.head.insertAdjacentHTML('beforeend', `
            <style>
                @keyframes slideDown {
                    from { top: -100px; }
                    to { top: 0; }
                }
            </style>
        `);
    </script>
@endsection
