<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        {{-- Título --}}
        <title>ShapeUp | @yield('titulo')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicons -->
        <link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="icon">
        <link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{ asset('dashboard/assets/css/tailwind.output.css') }}" />
        <link href="{{ asset('web/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('web/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('web/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('web/assets/css/style.css') }}" rel="stylesheet">

    </head>
    <body>

        @yield('navbar')

        {{-- INDEX --}}

        @yield('index-section')
        @yield('imc-section')
        @yield('profile-section')
        @yield('edit-password-section')
        @yield('messaging-section')

        {{-- ABOUT --}}

        @yield('about-section')

        {{-- TRAININGS --}}

        @yield('trainings-section')
        @yield('trainings-exercises-section')

        {{-- EXERCISES --}}

        @yield('exercises-section')

        {{-- DIETS --}}

        @yield('diets-section')
        @yield('diets-ingredients-section')

        {{-- INGREDIENTS --}}

        @yield('ingredients-section')

        {{-- COACHES --}}

        @yield('coaches-section')
        @yield('messagecoach-section')

        {{-- EVENTS --}}

        @yield('events-section')

        {{-- SUBSCRIPTIONS --}}

        @yield('subscriptions-section')
        @yield('confirmsdisable-section')

        {{-- CONTACT --}}

        @yield('contact-section')

        @yield('footer')

        @yield('preloader')

        {{-- SCRIPTS --}}
        <!-- Vendor JS Files -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('web/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('web/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('web/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('web/assets/vendor/php-email-form/validate.js') }}"></script>        

        <!-- Template Main JS File -->
        <script src="{{ asset('web/assets/js/main.js') }}"></script>
        <script>
            const pesoInput = document.getElementById('peso');
            const alturaInput = document.getElementById('altura');
            const calculateBtn = document.getElementById('calculate-btn');
            const counter = document.getElementById('counter');
          
            pesoInput.addEventListener('input', function() {
              if (pesoInput.value && alturaInput.value) {
                calculateBtn.removeAttribute('disabled');
              } else {
                calculateBtn.setAttribute('disabled', true);
              }
            });
          
            alturaInput.addEventListener('input', function() {
              if (pesoInput.value && alturaInput.value) {
                calculateBtn.removeAttribute('disabled');
              } else {
                calculateBtn.setAttribute('disabled', true);
              }
            });

            const bmiText = document.getElementById('bmi-text');

            calculateBtn.addEventListener('click', function(event) {
            event.preventDefault();
            const weight = Number(pesoInput.value);
            const height = Number(alturaInput.value);

            const bmi = weight / ((height / 100) ** 2);
            const roundedBmi = bmi.toFixed(2);

            bmiText.textContent = `Tu índice de masa corporal es ${roundedBmi}`;

            const countsSection = document.getElementById('counts');
            countsSection.style.display = 'block';
            });
          </script>   
    </body>
</html>