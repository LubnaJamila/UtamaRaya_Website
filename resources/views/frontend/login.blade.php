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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/login.css') }}">
</head>
<style>
    .alert.alert-danger {
        color: #dc3545;
        border-color: #dc3545;
        background-color: #f8d7da;
        padding: 0.75rem 1.25rem;
        border-radius: 5px;
        margin-top: 0.5rem;
        font-size: 14px;
    }

    .alert.alert-danger::before {
        content: '⚠️';
        margin-right: 0.5rem;
    }
</style>

<body>

    <div class="container-fluid login min-vh-100 d-flex align-items-center justify-content-center ">
        <div class="login">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand">
                        <img src="{{ asset('frontend/assets/img/logo-UTR.png') }}" alt="" width="150px">
                    </div>
                    <div class="text-center mb-3">
                        <h3 class="mb-2">Welcome to Utama Raya!</h3>
                        <p class="mb-4">Please sign in to your account to start the adventure</p>
                    </div>
                    @if ($errors->has('loginError'))
                        <div class="alert alert-danger mb-2">
                            {{ $errors->first('loginError') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login.authenticate') }}">
                        @csrf
                        <div class="col-lg-12 col-md-6 mb-3" style="margin-bottom: 15px;">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email or username" autofocus />
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-6 mb-3"style="margin-bottom: 20px;">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="min 3 karakter" aria-describedby="password" />
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-6 mb-3">
                            <button class="btn btn-login w-100" type="submit">Login</button>
                        </div>
                    </form>
                    <div class="text-footer col-12 d-flex justify-content-center">
                        <p class="form-label">Don't have an account? <a href="{{ route('register') }}">Register
                                Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>

</html>
