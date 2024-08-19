<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama Raya | Langganan</title>
      <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="logo">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backend/assets/new.css') }}">
    <style>
        .card-container {
            margin-top: 30px;
        }

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

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .card-title {
            font-family: var(--font-second);
            color: var(--color-red);
            font-weight: 700;
        }

        .card-subtitle span {
            font-family: var(--font-second);
            color: black;
            font-weight: 700;
        }

        .modal-content {
            border-radius: 8px;
        }

        .modal-title {
            font-weight: 700;
            font-family: var(--font-second);
            color: #8B0000
        }

        .btn-warning {
            background-color: #FFC107;
            color: #000;
        }

        .modal-content label {
            font-weight: 700;
            font-family: var(--font-primary);
            color: #000
        }

        .modal-content select,
        .modal-content textarea,
        .modal-content input {
            border-color: #8B0000
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container dashboard-umkm mt-4 text-center">
        <h2 class="card-title mb-2">Dashboard Langganan UMKM</h5>
            <p>Nikmati fitur UMKM dengan pilih paket berlangganan terlebih dahulu!</p>
    </div>
    <hr>
    <div class="container">
        <div class="row card-container">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Paket Langganan 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut molestias
                            consequatur natus sit error modi ipsa tenetur eos odio qui quas harum distinctio minima sint
                            quidem, rem quasi, omnis neque.</p>
                        <h6 class="card-subtitle mb-2 text-muted">Harga: 100.000 <span>/bulan</span></h6>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#subscriptionModal" data-package="Paket Langganan 1"
                            data-price="100.000">Berlangganan</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Paket Langganan 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque inventore,
                            eveniet asperiores reprehenderit aut aspernatur placeat aliquid eos, repellat cupiditate
                            omnis sed ab dolorum illo amet nihil quos obcaecati ipsa.</p>
                        <h6 class="card-subtitle mb-2 text-muted">Harga: 200.000<span>/bulan</span></h6>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#subscriptionModal" data-package="Paket Langganan 2"
                            data-price="200.000">Berlangganan</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Paket Langganan 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nisi molestias
                            nihil natus! Dolore accusamus est ad minus dicta consequuntur quod, non pariatur similique
                            itaque eius facere asperiores soluta sequi.</p>
                        <h6 class="card-subtitle mb-2 text-muted">Harga: 300.000<span>/bulan</span></h6>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#subscriptionModal" data-package="Paket Langganan 3"
                            data-price="300.000">Berlangganan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subscriptionModalLabel">Form Langganan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="subscriptionForm">
                        <div class="mb-3">
                            <label for="packageName" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="packageName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="packagePrice" class="form-label">Harga Paket</label>
                            <input type="text" class="form-control" id="packagePrice" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="bankName" class="form-label">Nama Bank</label>
                            <select class="form-select" id="bankName">
                                <option value="bri">BRI</option>
                                <option value="mandiri">Mandiri</option>
                                <option value="bca">BCA</option>
                                <option value="other">Bank Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="accountNumber" class="form-label">No Rekening</label>
                            <input type="text" class="form-control" id="accountNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="accountName" class="form-label">Nama Pemilik Rekening</label>
                            <input type="text" class="form-control" id="accountName" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentProof" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" class="form-control" id="paymentProof" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-orange">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend/assets/script.js') }}"></script>
</body>

</html>
