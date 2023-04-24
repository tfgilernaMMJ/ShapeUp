<!doctype html>
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
</head>

<body>
    <div class="login__container-BlockContainer">
        <div class="login__container-GeneralBox">
            <div class="login__container-FormContainer">
                <div class="logoContainer">
                    <img src="{{ asset('web/assets/img/logo/favicon.png') }}" class="img-fluid rounded-top logo" alt="">
                </div>
                <div class="formBox">
                    <form class="form" action="{{route('register')}}" method='POST'>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                        <section class="emailSection">
                            <label for="emailInput">EMAIL</label>
                            <input type="text" class="form-control" placeholder="example@gmail.com" id="emailInput" name="email">
                        </section>
                        @error('email')
                        <p class="text-light">{{$message}}</p>
                        @enderror
                        <section class="passwordSection">
                            <label for="passwordInput">PASSWORD</label>
                            <input type="password" class="form-control" placeholder="example123" id="passwordInput" name="password">
                        </section>
                        <section class="passwordSection">
                            <label for="passwordInput">CONFIRM PASSWORD</label>
                            <input type="password" class="form-control" placeholder="password_confirmation" id="passwordInput" name="password_confirmation">
                        </section>
                        @error('password')
                        <p class="text-light">{{$message}}</p>
                        @enderror
                        <section class="buttonsSection">
                            <button type="submit" class="login-button active">REGISTRAR</button>
                            <button type="submit" class="createAccount-button">CREATE ACCOUNT</button>
                        </section>
                    </form>
                </div>
            </div>
            <div class="login__container-WelcomeContainer">
                <div class="login__container-WelcomeBox">
                    <div class="green-layer">
                        <!-- <img src="{{ asset('web/assets/img/logo/favicon.png') }}" class="img-fluid rounded-top" alt=""> -->
                    </div>
                    <div class="Welcome-text">
                        <div>
                            <h3>WELCOME TO</h3>
                            <h1>Shape - Up Entrenamientos Customs</h1>
                        </div>
                        <hr>
                        <div>
                            <span>Login to Access Web</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <!-- Vendor JS Files -->
    <script src="{{ asset('web/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/vendor/php-email-form/validate.js') }}"></script>
</body>

</html>