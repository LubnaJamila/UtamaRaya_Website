@extends('body')
@section('content')
    <style>
        .lihatpaket .card-container {
            display: flex;
            justify-content: space-around;
        }

        .lihatpaket .card {
            width: 30%;
            height: 400px;
            display: flex;
            flex-direction: column;
            border: 1px solid #712626;
            border-radius: 5px;
            overflow: hidden;
            margin: 10px;
        }

        .lihatpaket .card-header,
        .lihatpaket .card-footer {
            background-color: #f5f5f5;
            padding: 10px;
        }

        .lihatpaket .card-body {
            flex-grow: 1;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
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
                <div class="dropdown">
                    <a href="#" class="btn-umkm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Promosi UMKM Anda?
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#lihatPaketModal">Lihat Paket</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#umkmModal">Daftar Sekarang</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="lihatPaketModal" tabindex="-1" aria-labelledby="lihatPaketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 50%; max-height: 80vh;">
            <div class="modal-content lihatpaket">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatPaketModalLabel">Lihat Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-container">
                        <div class="card card-top">
                            <div class="card-header">Nama Paket</div>
                            <div class="card-body">
                                <p class="card-text text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Eveniet non enim officiis quaerat labore amet sit! Saepe non sequi architecto ipsa,
                                    perferendis suscipit aliquid in! Eaque soluta id minima dolores!</p>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                        <div class="card card-bottom card-bottom-left">
                            <div class="card-header">Nama Paket</div>
                            <div class="card-body">
                                <p class="card-text text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Eveniet non enim officiis quaerat labore amet sit! Saepe non sequi architecto ipsa,
                                    perferendis suscipit aliquid in! Eaque soluta id minima dolores!</p>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                        <div class="card card-bottom card-bottom-right">
                            <div class="card-header">Nama Paket</div>
                            <div class="card-body">
                                <p class="card-text text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Eveniet non enim officiis quaerat labore amet sit! Saepe non sequi architecto ipsa,
                                    perferendis suscipit aliquid in! Eaque soluta id minima dolores!</p>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="umkmModal" tabindex="-1" aria-labelledby="umkmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="umkmModalLabel">Daftar UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/umkm/register" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        required>
                                    @error('nama_lengkap')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                    @error('no_hp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="nama_usaha" class="form-label">Nama Usaha UMKM</label>
                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                                        required>
                                    @error('nama_usaha')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                        @foreach ($jenisKelamin as $id => $jenis_kelamin)
                                            <option value="{{ $id }}">{{ $jenis_kelamin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_umkm" class="form-label">Deskripsi Usaha</label>
                                    <textarea class="form-control" id="deskripsi_umkm" name="deskripsi_umkm" rows="4" required></textarea>
                                    @error('deskripsi_umkm')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat UMKM</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
                                    @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Min. 3 karakter" required>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
