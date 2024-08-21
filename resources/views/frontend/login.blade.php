<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/login.css') }}" rel="stylesheet">
    

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <button class="btn-back" onclick="history.back()">
            <i class="fas fa-arrow-left"></i>
        </button>
        <a class="navbar-brand mx-auto" href="#">
            <img src="{{ asset('frontend/assets/img/UR-logo.png') }}" width="50" height="auto" alt="Logo">
        </a>
    </nav>
    <div class="login-container">
        <div class="login-box">
            <h2 class="text-center mb-4">Login</h2>
            <form method="POST" action="{{ route('login.form') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="example@gmail.com" required>
                </div>
                <div class="form-group mb-1">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>
                <div class="form-group text mb-0" style="text-align: right;">
                    <label class="form-label">Forgot Password?</label>
                    <a href="{{ route('forgot_password') }}" class="forgot-password-link">Here</a>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <div class="col-12 mb-1 d-flex justify-content-center">
                    <p class="form-label">Don't have an account? <a href="{{ route('register') }}">Register
                            Now</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
