<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&family=Work+Sans:wght@100;300;400;600&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/register.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/login.css') }}">
    </head>

    <body>
        <div class="container-fluid login min-vh-100 d-flex align-items-center justify-content-center ">
            <div class="register">
                <div class="app-brand">
                    <img src="{{ asset('frontend/assets/img/logo-UTR.png') }}" alt="" width="150px">
                </div>
                <div class="text-center mb-1">
                    <h3 class="mb-2">Welcome to Utama Raya</h3>
                    <p class="mb-2">Create Your Account Now!</p>
                </div>
                <div class="form-tabs">
                    <button class="tab-btn active" onclick="showForm('registerBiasa')">Register</button>
                    <button class="tab-btn" onclick="showForm('registerUMKM')">Register UMKM</button>
                </div>
                <div class="form-content">
                    <div id="registerBiasa" class="form-section active">
                        <form method="POST" action="{{ route('register.post') }}">
                            @csrf
                            <div class=" form-group mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    placeholder="Masukkan nama lengkapmu!" required>
                                @error('nama_lengkap')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="example@gmail.com" required>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 form-group mb-3">
                                    <label for="no_hp" class="form-label">No Hp</label>
                                    <input type="no_hp" class="form-control" id="no_hp" name="no_hp" required>
                                    @error('no_hp')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 form-group mb-3">
                                    <label for="password_confirmation" class="form-label"
                                        style="margin-left: 0">Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Min. 3 karakter" required>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 form-group mb-3 mr-0">
                                    <label for="password" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <button class="btn btn-login w-100 mb-0" type="submit">Regsiter</button>
                            @if (session()->has('success'))
                                <div class="alert alert-success mt-2" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                        </form>
                    </div>
                    <div id="registerUMKM" class="form-section">
                        <form action="/umkm/register" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap"
                                            name="nama_lengkap" required>
                                        @error('nama_lengkap')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                                            required>
                                        @error('no_hp')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                        <select  id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="deskripsi_umkm" class="form-label">Deskripsi Usaha</label>
                                        <textarea class="form-control" id="deskripsi_umkm" name="deskripsi_umkm" rows="2" required></textarea>
                                        @error('deskripsi_umkm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat UMKM</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                                        @error('alamat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="harga_terendah" class="form-label">Harga Terendah</label>
                                        <input class="form-control" id="harga_terendah" name="harga_terkecil"
                                            required>
                                        @error('harga_terendah')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="harga_tertinggi" class="form-label">Harga Tertinggi</label>
                                        <input class="form-control" id="harga_tertinggi" name="harga_tertinggi"
                                            required>
                                        @error('harga_tertinggi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
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
                                        <label for="password_confirmation" class="form-label">Konfirmasi
                                            Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-login w-100 mb-0" type="submit">Regsiter UMKM</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
        <script>
            function showForm(formId) {
                const tabs = document.querySelectorAll('.tab-btn');
                const forms = document.querySelectorAll('.form-section');

                tabs.forEach(tab => tab.classList.remove('active'));
                forms.forEach(form => form.classList.remove('active'));

                document.querySelector(`#${formId}`).classList.add('active');
                document.querySelector(`[onclick="showForm('${formId}')"]`).classList.add('active');
            }
        </script>
    </body>

    </html>
