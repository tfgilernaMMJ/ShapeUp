<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="icon">
    <link href="{{ asset('web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('dashboard/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script defer src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('dashboard/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
    <!--   Core JS Files   -->
    <script defer src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script defer src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script defer src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script defer src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
    <script defer src="{{ asset('dashboard/js/material-dashboard.min.js?v=3.1.0') }}"></script>
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
<body>

<!-- PRINCIPAL -->
@yield('dashboard-principal')

<!-- TABLES -->
@yield('dashboard-tables')

</body>
</html>