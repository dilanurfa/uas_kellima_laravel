<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Studio Musik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 20px;
            background: #f6f9fc;
        }
        .account-block {
            padding: 0;
            background-image: url('https://pinterplan.com/wp-content/uploads/2021/10/SEMERU-MUSIC-STUDIO-BOGOR-2015-2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            position: relative;
            border-radius: 0 0.5rem 0.5rem 0;
        }
        .account-block .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 0 0.5rem 0.5rem 0;
        }
        .account-block .account-testimonial {
            text-align: center;
            color: #fff;
            position: absolute;
            bottom: 3rem;
            left: 0;
            right: 0;
            padding: 0 1.75rem;
        }
        .text-theme {
            color: #343a40 !important; /* abu gelap elegan */
        }
        .btn-theme {
            background-color: #343a40;
            border-color: #343a40;
            color: #fff;
        }
        .btn-theme:hover {
            background-color: #23272b;
            border-color: #23272b;
            color: #fff;
        }
    </style>
</head>
<body>

<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0 shadow mt-5">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email and password to access your account.</p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            id="email" name="email" 
                                            value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <div class="invalid-feedback mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            id="password" name="password" required>
                                        @error('password')
                                            <div class="invalid-feedback mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-theme btn-block">Login</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="mb-4">The Sound Project, tempat nyaman bikin musik.</h4>
                                    <p class="lead">"Bikin musik di sini kayak di rumah sendiri. Mau ngopi atau butuh bantuan alat? Kasih tau aja ya!"</p>
                                    <p>– Admin The Sound Project</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- card-body -->
            </div> <!-- card -->

            <p class="text-muted text-center mt-3 mb-0">
                Don't have an account? <a href="{{ route('register') }}" class="text-theme ml-1">Register</a>
            </p>
        </div> <!-- col -->
    </div> <!-- row -->
</div> <!-- container -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
