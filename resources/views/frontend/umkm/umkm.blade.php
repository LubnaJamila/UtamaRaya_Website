@extends('body')
@section('content')
    <div class="breadcrumbs">
        <div class="page-header-umkm d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>UMKM</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/" style="font-weight: 1000">Home</a></li>
                    <li style="font-weight: 1000">UMKM</li>
                </ol>
            </div>
        </nav>
    </div>

    <div class="container-fluid umkm py-3">
        <div class="container py-5">
            <div class="text-center">
                <h6 class="section-title pe-3 ps-3">UMKM</h6>
                <h1 class="mb-4">Produk <span class="text">UMKM</span> Sekitar!</h1>
                <p>Selamat datang di bagian khusus kami yang didedikasikan untuk produk-produk unggulan dari UMKM
                    lokal di sekitar kita. Di sini, Anda akan menemukan berbagai macam barang yang tidak hanya unik dan
                    berkualitas, tetapi juga mencerminkan kearifan lokal dan kreativitas dari para pengrajin dan produsen
                    kecil.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="umkm-card">
                        <img src="{{ asset('frontend/assets/img/umkm_page.png') }}" alt="Product Image"
                            class="img-fluid rounded">
                        <div class="card-body mt-2">
                            <h5 class="umkm-card-title">Toko Aksesoris Luna</h5>
                            <p class="umkm-card-description">Berbagai aneka macam tas dapat anda temui di toko kami. Kami
                                menyediakan
                                berbagai macam desain tas dan banyak lagi produk lainnya...</p>
                            <div class="umkm-card-price">Rp 50.000 - 150.000</div>
                            <div class="d-flex justify-content-end">
                                <a href="/umkm/detail" type="button" class="umkm-card-link-button">Lihat Toko</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="btn-right">
                <a href="#" class="btn-umkm" data-bs-toggle="modal" data-bs-target="#umkmModal">
                    Promosi Produk Anda?
                </a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="umkmModal" tabindex="-1" aria-labelledby="umkmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="umkmModalLabel">Daftar UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/register/umkm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama UMKM</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Min. 5 karakter" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
