<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Perpustakaan11</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Favicons -->
    <link href="{{ asset('assets/admin') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('assets/admin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/admin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/admin') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('assets/admin') }}/assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Perpustakaan11</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-50">

                            <div class="card-body">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                            <p class="text-center small">Enter your username & password to login</p>
                                        </div>

                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="col-12">
                                                <label for="username" class="form-label">{{ __('Username') }}</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="username"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        id="username" required>

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="invalid-feedback">Please enter your username.</div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <label for="email"
                                                    class="form-label">{{ __('Email Address') }}</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="invalid-feedback">Please enter your email.</div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                               
                                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                                <div class="input-group has-validation">
                                                    <input type="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                        required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="invalid-feedback">Please enter your password.</div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        {{ old('remember') ? 'checked' : '' }} id="remember">
                                                    <label class="form-check-label"
                                                        for="remember">{{ __('Remember Me') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100"
                                                    type="submit">{{ __('Login') }}</button> 
                                                @if (Route::has('password.request'))
                                                  <br> <p class="small mn-0"> <a href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a></p>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <p class="small mb-0">Don't have account? <a
                                                        href="{{ route('register') }}">Create an account</a></p>
                                            </div>
                                            {{-- <div class="col-12">
                                                <p class="small mb-0">Don't have account? <a
                                                        href="{{ route('register') }}">{{ __('Register') }}">Create
                                                        an
                                                        account</a></p>
                                            </div> --}}
                                        </form>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

        </section>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('assets/admin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/admin') }}/assets/vendor/chart.js/chart.umd.js"></script>
        <script src="{{ asset('assets/admin') }}/assets/vendor/echarts/echarts.min.js"></script>
        <script src="{{ asset('assets/admin') }}/assets/vendor/quill/quill.js"></script>
        <script src="{{ asset('assets/admin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="{{ asset('assets/admin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="{{ asset('assets/admin') }}/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets/admin') }}/assets/js/main.js"></script>
</body>
{{-- <div class="row justify-content-center">

            login auth
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        required autocomplete="current-username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
</div>
