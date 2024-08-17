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
                        <div class="step active">
                            <div class="circle">2</div>
                            <div class="text">Payment</div>
                        </div>
                        <div class="step inactive">
                            <div class="circle">3</div>
                            <div class="text">Waiting Validasi</div>
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
                                    <h5 class="card-title">Metode Pembayaran</h5>
                                    <hr>
                                    <div class="card-body">
                                        <!-- Ringkasan Pesanan -->
                                        <div class="order-summary mb-4">
                                            <h6 class="mb-3">Ringkasan Pesanan</h6>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <strong>Hotel Sunset Deluxe</strong>
                                                <span>Rp 400.000</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <strong>Extra Spring Bed</strong>
                                                <span>Rp 400.000</span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <strong>Total Pembayaran:</strong>
                                                <strong>Rp 800.000</strong>
                                            </div>
                                        </div>

                                        <!-- Metode Pembayaran -->
                                        <form method="" action="{{ route('step3') }}">
                                            @csrf
                                            <h6 class="mb-3">Pilih Metode Pembayaran</h6>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="bank_transfer" value="bank_transfer" checked
                                                    onclick="togglePaymentForms()">
                                                <label class="form-check-label" for="bank_transfer">
                                                    Transfer Bank
                                                </label>
                                            </div>
                                            <div id="bank-options" class="mb-3 d-none">
                                                <select class="form-select mb-3" id="bank-select"
                                                    onchange="toggleBankForm()">
                                                    <option value="">Pilih Bank</option>
                                                    <option value="mandiri">Mandiri</option>
                                                    <option value="bca">BCA</option>
                                                    <option value="bri">BRI</option>
                                                    <option value="other">Transfer Bank Lain</option>
                                                </select>
                                                <div id="bank-form-mandiri" class="d-none">
                                                    <label for="rekening-mandiri" class="form-label">Masukkan Nomor Rekening
                                                        Mandiri</label>
                                                    <input type="text" class="form-control" id="rekening-mandiri"
                                                        name="rekening_mandiri" placeholder="Nomor Rekening Mandiri">
                                                </div>
                                                <div id="bank-form-bca" class="d-none">
                                                    <label for="rekening-bca" class="form-label">Masukkan Nomor Rekening
                                                        BCA</label>
                                                    <input type="text" class="form-control" id="rekening-bca"
                                                        name="rekening_bca" placeholder="Nomor Rekening BCA">
                                                </div>
                                                <div id="bank-form-bri" class="d-none">
                                                    <label for="rekening-bri" class="form-label">Masukkan Nomor Rekening
                                                        BRI</label>
                                                    <input type="text" class="form-control" id="rekening-bri"
                                                        name="rekening_bri" placeholder="Nomor Rekening BRI">
                                                </div>
                                                <div id="bank-form-other" class="d-none">
                                                    <label for="bank-name" class="form-label">Masukkan Nama Bank</label>
                                                    <input type="text" class="form-control mb-3" id="bank-name"
                                                        name="bank_name" placeholder="Nama Bank">
                                                    <label for="rekening-other" class="form-label">Masukkan Nomor
                                                        Rekening</label>
                                                    <input type="text" class="form-control" id="rekening-other"
                                                        name="rekening_other" placeholder="Nomor Rekening">
                                                </div>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="ewallet" value="ewallet" onclick="togglePaymentForms()">
                                                <label class="form-check-label" for="ewallet">
                                                    E-Wallet (OVO, GoPay, dll)
                                                </label>
                                            </div>
                                            <div id="ewallet-options" class="mb-3 d-none">
                                                <select class="form-select mb-3" id="ewallet-select"
                                                    onchange="toggleEwalletForm()">
                                                    <option value="">Pilih E-Wallet</option>
                                                    <option value="gopay">GoPay</option>
                                                    <option value="dana">DANA</option>
                                                    <option value="shopeepay">ShopeePay</option>
                                                    <option value="other">E-Wallet Lainnya</option>
                                                </select>
                                                <div id="ewallet-form-gopay" class="d-none">
                                                    <label for="ewallet-number-gopay" class="form-label">Masukkan Nomor
                                                        GoPay</label>
                                                    <input type="text" class="form-control" id="ewallet-number-gopay"
                                                        name="ewallet_number_gopay" placeholder="Nomor GoPay">
                                                </div>
                                                <div id="ewallet-form-dana" class="d-none">
                                                    <label for="ewallet-number-dana" class="form-label">Masukkan Nomor
                                                        DANA</label>
                                                    <input type="text" class="form-control" id="ewallet-number-dana"
                                                        name="ewallet_number_dana" placeholder="Nomor DANA">
                                                </div>
                                                <div id="ewallet-form-shopeepay" class="d-none">
                                                    <label for="ewallet-number-shopeepay" class="form-label">Masukkan
                                                        Nomor ShopeePay</label>
                                                    <input type="text" class="form-control"
                                                        id="ewallet-number-shopeepay" name="ewallet_number_shopeepay"
                                                        placeholder="Nomor ShopeePay">
                                                </div>
                                                <div id="ewallet-form-other" class="d-none">
                                                    <label for="ewallet-name" class="form-label">Masukkan Nama
                                                        E-Wallet</label>
                                                    <input type="text" class="form-control mb-3" id="ewallet-name"
                                                        name="ewallet_name" placeholder="Nama E-Wallet">
                                                    <label for="ewallet-number-other" class="form-label">Masukkan Nomor
                                                        E-Wallet</label>
                                                    <input type="text" class="form-control" id="ewallet-number-other"
                                                        name="ewallet_number_other" placeholder="Nomor E-Wallet">
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success w-100">Lanjutkan
                                                    Pembayaran</button>
                                            </div>
                                        </form>
                                    </div>
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
