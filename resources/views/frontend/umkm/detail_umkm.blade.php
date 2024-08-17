@extends('body')
@section('content')
    <div class="breadcrumbs">
        <div class="page-header-umkmdetail d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Toko Hj Suyet</h2>
                        <p class="umkm-card-description">Berbagai aneka macam tas dapat anda temui di toko kami. Kami
                            menyediakan
                            berbagai macam desain tas dan banyak lagi produk lainnya...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid umkm py-3">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="umkm-card-detail">
                        <img src="{{ asset('frontend/assets/img/umkm_page.png') }}" alt="Product Image"
                            class="img-fluid rounded">
                        <div class="card-body mt-2">
                            <h5 class="umkm-card-title">Tas Rajut Luna</h5>
                            <div class="umkm-card-price">Rp 50.000</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="btn-right">
                <a href="#" class="btn-umkmdetail">
                    Beli Sekarang
                </a>
            </div>
        </div>
    </div>
@endsection
