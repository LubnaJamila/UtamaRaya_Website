<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="logo">
    <title>Rekening</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/new.css') }}">
</head>

<body>
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
            padding: 1.5rem;
        }

        .card input,
        .card textarea {
            border: 1px solid;
            border-color: #8B0000;
        }

        .error-message {
            color: red;
            display: none;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .input-container {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 0.5rem;

        }

        .form-control {
            grid-column: 1;
        }

        .btn {
            grid-column: 2;
            white-space: nowrap;
        }


        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            z-index: 1000;
            display: none;
        }

        .loading-overlay .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border-left-color: #09f;
            animation: spin 1s ease infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="wrapper d-flex">

        <div class="content-wrapper">
            @include('backend.navbarr')
            <div class="container mt-4">
                <div class="col-xl-8 col-lg-10 mx-auto">
                    <h5 class="card-title mb-3">Tambah Rekening</h5>
                    <div class="card mb-4">
                        <div class="form-group mb-3">
                            <form id="cancelBookingForm" action="{{ route('store.rekening') }}" method="POST">
                                @csrf
                                <label for="bank" class="form-label">Pilih Bank:</label>
                                <select class="form-select same-height" id="bank" name="bank"
                                    onchange="setBankName()">
                                    <option selected>Pilih Bank</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank['kodeBank'] }}"
                                            data-nama-bank="{{ $bank['namaBank'] }}">
                                            {{ $bank['namaBank'] }}
                                        </option>
                                    @endforeach
                                </select>
                                <input class="d-none" type="text" id="nama_bank" name="nama_bank">

                        </div>
                        <div class="form-group mb-3">
                            <label for="accountNumber" class="form-label">Nomor Rekening:</label>
                            <div class="input-container">
                                <input type="text" id="accountNumber" name="no_rek" class="form-control" required>
                                <button type="button" id="searchButton" class="btn btn-primary">Cari Rekening</button>
                            </div>
                            <div class="error-message" id="accountNumberError">Gagal mengambil detail rekening</div>
                        </div>

                        <div id="detail-rekening" class="mt-3">
                            <label for="accountHolder" class="form-label">Nama Pemilik:</label>
                            <input type="text" id="accountHolder" name="nama_pemilik" class="form-control" required>

                        </div>
                        <button type="submit" class="btn btn-danger mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loading-overlay">
        <div class="spinner"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 on the bank select element
            $('#bank').select2();

            // Function to show loading overlay
            function showLoadingOverlay() {
                $('#loading-overlay').show();
            }

            // Function to hide loading overlay
            function hideLoadingOverlay() {
                $('#loading-overlay').hide();
            }

            // Function to get bank details
            function getBankDetails() {
                const accountNumber = $('#accountNumber').val();
                const bankCode = $('#bank').val();

                if (!accountNumber) {
                    $('#accountNumberError').show().text('Harap isikan nomor rekening terlebih dahulu.');
                    return;
                }

                if (accountNumber && bankCode) {
                    showLoadingOverlay();
                    $.ajax({
                        url: "{{ route('get.bank.details') }}",
                        method: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            bank: bankCode,
                            accountNumber: accountNumber
                        },
                        success: function(response) {
                            hideLoadingOverlay();
                            if (response.error) {
                                $('#accountNumberError').show().text(response.error);
                            } else {
                                $('#accountNumberError').hide();
                                $('#accountHolder').val(response.accountHolder);
                            }
                        },
                        error: function() {
                            hideLoadingOverlay();
                            $('#accountNumberError').show().text(
                                'No Rek Tidak Ditemukan Harap Periksa Kembali Nama Bank dan No Rek Ulang.'
                            );
                        }
                    });
                }
            }

            $('#searchButton').on('click', function() {
                console.log('Tombol Cari Rekening diklik');
                getBankDetails();
            });
        });

        function setBankName() {
            var select = document.getElementById('bank');
            var selectedOption = select.options[select.selectedIndex];
            var bankName = selectedOption.getAttribute('data-nama-bank');
            document.getElementById('nama_bank').value = bankName;
        }
    </script>

</body>

</html>
