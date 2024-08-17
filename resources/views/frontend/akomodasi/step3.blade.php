@extends('body')
@section('content')
    <div class="breadcrumbs">
        <div class="page-header-booking d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Pembayaran Akomodasi</h2>
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
                            <div class="text">Booking</div>
                        </div>
                        <div class="step inactive">
                            <div class="circle">2</div>
                            <div class="text">Payment</div>
                        </div>
                        <div class="step active">
                            <div class="circle">3</div>
                            <div class="text">Waiting Validasi</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Waktu Pembayaran</h5>
                        <div id="countdown-timer" class="text-center mb-4" style="font-size: 1.5rem; font-weight: bold;">
                        </div>

                        <h6 class="mb-3">Nomor BRIVA</h6>
                        <div class="alert alert-info text-center">
                            <strong>1234567890123456</strong>
                        </div>
                        <p class="text-center mb-4">Silakan lakukan pembayaran atau DP sebesar <strong>30%</strong> ke nomor
                            BRIVA di atas.</p>

                        <h6 class="mb-3">Upload Bukti Pembayaran</h6>
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="file" class="form-control" id="payment_proof" name="payment_proof" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Kirim Bukti Pembayaran</button>
                            </div>
                        </form>
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
