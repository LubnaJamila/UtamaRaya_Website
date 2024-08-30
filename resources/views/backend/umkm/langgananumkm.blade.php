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
        align-items: center;
        justify-content: center;
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

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
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

    .content-container {
        padding-top: 20px;

    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="me-2 d-none d-lg-inline"
                        style="font-weight: 700; color:black">{{ Auth::user()->nama_lengkap }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('backend/assets/img/undraw_profile.svg') }}"
                        alt="Profile">
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard_umkm') }}">
                        <i class="fas fa-tachometer-alt fa-sm fa-fw me-2"></i>
                        Dashboard
                    </a>
                    <a class="dropdown-item" href="{{route('logout')}}" data-bs-toggle="modal"
                        data-bs-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2" style="font-weight: 700 padding-right:10px"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    @include('backend.sidebar')
    <div class="container content-container mt-5">
        <div class="container dashboard-umkm mt-4 text-center">
            <h2 class="card-title mb-2">Langganan UMKM</h5>
                <p>Nikmati fitur UMKM dengan pilih paket berlangganan terlebih dahulu!</p>
        </div>
        <hr>
        <div class="container text-center align-items-center">
            <div class="row card-container">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Paket Langganan</h5>
                            <p class="card-text">{{ $langganan->deskripsi }}</p>
                            <h6 class="card-subtitle mb-2 text-muted">Harga:
                                {{ number_format($langganan->harga_langganan, 0, ',', '.') }}<span>/bulan</span>
                            </h6>
                            <a href="{{ route('umkm.berlangganan') }}" class="btn btn-primary">Berlangganan</a>
                        </div>
                    </div>
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