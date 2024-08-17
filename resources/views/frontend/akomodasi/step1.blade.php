@extends('body')
@section('content')
    <!-- Breadcrumbs Start -->
    <div class="breadcrumbs">
        <div class="page-header-booking d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Detail Akomodasi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs End -->
    <div class="container akomodasidetail mb-5">
        <div class="container card-container">
            <div class="card">
                <div class="stepper">
                    <div class="step">
                        <div class="circle">1</div>
                        <div class="text">Booking</div>
                    </div>
                    <div class="step inactive">
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
                    <div class="col-lg-7 col-md-6">
                        <div class="card-detail mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Detail Kontak (Pemesan)</h5>
                                <hr>
                                <form>
                                    <div class="form-group col-lg-12 mb-2">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap"
                                            placeholder="Greta Wahyu DM" required>
                                        <small class="form-text text-muted">sesuai nama KTP/Pasport Anda!</small>
                                    </div>

                                    <div class="form-group col-lg-12 mb-2">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="example@gmail.com" required>
                                    </div>

                                    <div class="form-group col-lg-12 mb-2">
                                        <label for="no_telp">No Telp/No HP</label>
                                        <input type="text" class="form-control" id="no_telp" placeholder="81915673067"
                                            required>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="custom-control custom-radio mb-1">
                                            <input type="radio" id="guest" name="bookingType"
                                                class="custom-control-input" checked>
                                            <label class="custom-control-label" for="guest">Untuk Diri
                                                Sendiri</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" id="bookingForAnother" name="bookingType"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="bookingForAnother">Memesan Untuk
                                                Orang
                                                Lain</label>
                                        </div>
                                    </div>

                                    <div class="form-group" id="recipientNameField" style="display: none;">
                                        <label for="recipientName">Nama Pennerima Lain</label>
                                        <input type="text" class="form-control" id="recipientName"
                                            placeholder="Masukkan nama penerima sesuai KTP">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="card-detail mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Hotel Sunset Deluxe</h5>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="date-card text-center">
                                        <p class="mb-1">Check-in</p>
                                        <h6 class="mb-0">Mon, 12 Aug 2024</h6>
                                        <small>From 15:00</small>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="divider-line"></div>
                                        <p class="mb-0 mx-2">1 night</p>
                                        <div class="divider-line"></div>
                                    </div>

                                    <div class="date-card text-center">
                                        <p class="mb-1">Check-out</p>
                                        <h6 class="mb-0">Tue, 13 Aug 2024</h6>
                                        <small>Before 12:00</small>
                                    </div>
                                </div>

                                <div class="request-section mb-3">
                                    <h6>Beberapa Tambahan Yang Mungkin Anda Suka</h6>
                                    <p class="text-muted">Kamu bisa menambahkan item dibawah ini!.</p>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check d-flex align-items-center justify-content-between">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label" for="extraBed">Extra Bed
                                                        Spon</label>
                                                </div>
                                                <div>
                                                    <span style="font-size: 12px; text-decoration: line-through;">Rp
                                                        300.000</span>
                                                    <br>
                                                    <span style="font-size: 16px; color: red;">Rp 250.000</span>
                                                </div>
                                            </div>
                                            <div class="form-check d-flex align-items-center justify-content-between">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label" for="extraSpring">Extra Spring
                                                        Bed</label>
                                                </div>
                                                <div>
                                                    <span style="font-size: 12px; text-decoration: line-through;">Rp
                                                        450.000</span>
                                                    <br>
                                                    <span style="font-size: 16px; color: red;">Rp 400.000</span>
                                                </div>
                                            </div>
                                            <div class="form-check d-flex align-items-center justify-content-between">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label" for="karpet">Karpet
                                                        Hambal</label>
                                                </div>
                                                <div>
                                                    <span style="font-size: 12px; text-decoration: line-through;">Rp
                                                        200.000</span>
                                                    <br>
                                                    <span style="font-size: 16px; color: red;">Rp 150.000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="request-section">
                                    <h6>Detail Pembayaran</h6>
                                    <p class="text-muted">Pembatalan masih dapat berlaku h-1 minggu dari tanggal
                                        check-in!
                                    </p>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <strong>Hotel Sunset Deluxe</strong>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span>Rp 400.00</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>Extra Spring Bed</strong>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span>Rp 400.00</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <strong>Total Pembayaran:</strong>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span id="total-payment">Rp 800.000</span>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-orange w-100"
                                            onclick="window.location.href='{{ route('step2') }}'">Lanjutkan
                                            Pembayaran</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            const guestRadio = document.getElementById('guest');
            const bookingForAnotherRadio = document.getElementById('bookingForAnother');
            const recipientNameField = document.getElementById('recipientNameField');

            guestRadio.addEventListener('change', function() {
                if (guestRadio.checked) {
                    recipientNameField.style.display = 'none';
                }
            });

            bookingForAnotherRadio.addEventListener('change', function() {
                if (bookingForAnotherRadio.checked) {
                    recipientNameField.style.display = 'block';
                }
            });
        });
    </script>
@endsection
