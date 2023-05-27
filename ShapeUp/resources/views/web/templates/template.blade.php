@extends('web.templates.general')

@section('navbar')
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">ShapeUp</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="@yield('index-nav')" href="{{ route('account.index') }}">Inicio</a></li>
                <li><a class="@yield('coaches-nav')" href="{{ route('account.coaches') }}">Entrenadores</a></li>

                @if (Auth::user()->suscription_id == 1)
                    <li><a class="@yield('exercises-nav')" href="{{ route('account.exercises') }}">Ejercicios</a></li>
                @else
                    <li class="dropdown"><a class="@yield('trainings-nav')@yield('exercises-nav')" href="#"><span>Entrenamientos</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="@yield('trainings-nav')" href="{{ route('account.trainings') }}">Entrenamientos</a></li>
                            <li><a class="@yield('exercises-nav')" href="{{ route('account.exercises') }}">Ejercicios</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->suscription_id == 1)
                    <li><a href="{{ route('account.ingredients') }}">Alimentos</a></li>
                @else
                    <li class="dropdown"><a class="@yield('diets-nav')@yield('ingredients-nav')" href="#"><span>Dietas</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="@yield('diets-nav')" href="{{ route('account.diets') }}">Dietas</a></li>
                            <li><a class="@yield('ingredients-nav')" href="{{ route('account.ingredients') }}">Alimentos</a></li>
                        </ul>
                    </li>
                @endif
                <li><a class="@yield('subscriptions-nav')" href="{{ route('account.subscriptions') }}">Suscripciones</a></li>

                {{-- <li class="dropdown"><a class="@yield('home')" href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li> --}}
                <li><a class="@yield('contact-nav')" href="{{ route('account.contact') }}">Contacto</a></li>
                @if (Auth::user())
                    @if (Auth::user()->suscription_id == 1 && Auth::user()->status == 'User') 
                        <li class="dropdown"><a class="active" href="#"><span><i class="bx bxs-user"></i>&nbsp{{ Auth::user()->username }}</span> <i class="bi bi-chevron-down"></i></a>
                    @elseif (Auth::user()->suscription_id == 2 && Auth::user()->status == 'User')
                        <li class="dropdown"><a class="active" href="#"><span><i class="bx bxs-star"></i>&nbsp{{ Auth::user()->username }}</span> <i class="bi bi-chevron-down"></i></a>
                    @elseif (Auth::user()->status == 'Admin')
                        <li class="dropdown"><a class="active" href="#"><span><i class='bx bxs-crown'></i>&nbsp{{ Auth::user()->username }}</span> <i class="bi bi-chevron-down"></i></a>
                    @elseif (Auth::user()->status == 'Coach')
                        <li class="dropdown"><a class="active" href="#"><span><i class='bx bx-dumbbell'></i></i>&nbsp{{ Auth::user()->username }}</span> <i class="bi bi-chevron-down"></i></a>
                    @endif
                        <ul>
                            @if (Auth::user()->status == 'User')     
                                <li><a href="{{ route('account.profile') }}" class="@yield('profile-nav')">Perfil</a></li>
                            @endif
                            @if (Auth::user()->suscription_id == 2 && Auth::user()->status == 'User')
                                <li><a href="{{ route('account.messaging') }}" class="@yield('messaging-nav')">Mensajería</a></li>
                            @endif
                            @if (Auth::user()->status == 'Admin')   
                                <li><a href="{{ route('admin') }}">Administración</a></li>
                            @elseif (Auth::user()->status == 'Coach')
                                <li><a href="{{ route('coach') }}">Administración</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a></li></li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>  
                @endif
            </ul>
            
            <i class="bi bi-list mobile-nav-toggle"></i>

        </nav>
        @if (Auth::user()->suscription_id == 1) 
            <a href="{{ route('account.subscriptions')}}" class="get-started-btn">Suscribete</a>
        @endif
    </div>
</header>
@endsection

@section('footer')
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>ShapeUp</h3>
                    <p>
                        Torre Sevilla<br>
                        41092, Sevilla<br>
                        España<br><br>
                        <strong>Teléfono:</strong> +34 910 111 222<br>
                        <strong>Correo electrónico:</strong> infocontact.shapeup@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Enlaces útiles</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.index')}}">Inicio</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.coaches')}}">Entrenadores</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.subscriptions')}}">Suscripciones</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.contact')}}">Contacto</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.imc')}}">IMC</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Nuestros servicios</h4>
                    @if(Auth::user()->suscription_id == 2)
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.trainings')}}">Entrenamientos</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.diets')}}">Dietas</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.exercises')}}">Ejercicios</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.ingredients')}}">Alimentos</a></li>
                    </ul>
                    @else
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.exercises')}}">Ejercicios</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('account.ingredients')}}">Alimentos</a></li>
                    </ul>
                    @endif
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>¡Únete ahora a ShapeUp!</h4>
                    {{-- <p>Si estás interesado en unirte a nuestro equipo de entrenadores, por favor envíanos tu CV y te contactaremos.</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Enviar">
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>ShapeUp</span></strong>. Todos los derechos reservados.
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a> --}}
            <a href="https://github.com/tfgilernaMMJ/ShapeUp" target="_blank" class="google-plus"><i class="bx bxl-github"></i></a>
            {{-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
        </div>
    </div>
</footer>
@endsection

@section('preloader')
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection