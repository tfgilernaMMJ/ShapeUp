<!-- <!doctype html>
<html lang="en">

<head>

    <!-- Favicons -->
<link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="icon">
<link href="{{ asset('web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<title>ShapeUp | Login</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Vendor CSS Files -->
<link href="{{ asset('web/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('web/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('web/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('web/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('web/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('web/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Custom CSS File -->
<link href="{{ asset('web/assets/css/login.css') }}" rel="stylesheet">
<!-- Custom JS File -->
<script defer src="{{ asset('web/assets/js/login.js') }}"></script>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{ asset('web/assets/img/logo/favicon.png') }}" class="logo" alt="logo">
                                    </div>

                                    <form action="{{route('login')}}" method="POST">
                                        @csrf
                                        <p>Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <input id="input1" type="text" class="form-control" placeholder="example@gmail.com" id="emailInput" name="email">
                                            <label class="form-label" for="form2Example11">Email</label>
                                        </div>
                                        @error('email')

                                        <p>{{$message}}</p>

                                        @enderror
                                        <div class="form-outline mb-4">
                                            <input id="input2" type="password" class="form-control" placeholder="example123" id="passwordInput" name="password">
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        @error('password')

                                        <p>{{$message}}</p>

                                        @enderror
                                        <div class="form-outline mb-4">
                                            <input id="input3" type="password" class="form-control" placeholder="password_confirmation" id="passwordInput" name="password_confirmation">
                                            <label class="form-label" for="form2Example22">Confirm Password</label>
                                        </div>
                                        @error('password_confirmation')

                                        <p>{{$message}}</p>

                                        @enderror
                                        <div class="text-center pt-1 mb-5 pb-2">
                                            <button class="loginButton" type="submit">Log
                                                in</button>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="{{route('signup')}}" type="button" class="btn createButton">Create new</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center loginImg">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Welcome To</h4>
                                    <h4 class="mb-4">Shape Up</h4>
                                    <p class="small mb-0">ENTRENAMIENTOS PERSONALIZADOS</p>
                                    <hr>
                                    <p class="small mb-0">Login to access web</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- SCRIPTS --}}
    <!-- Vendor JS Files -->
    <script src="{{ asset('web/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/php-email-form/validate.js') }}"></script>
</body>

</html>