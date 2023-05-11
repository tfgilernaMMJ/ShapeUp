@extends('web.templates.template')

@section('titulo')
    Inicio
@endsection

@section('index-nav')
    active
@endsection

@section('index-section')

    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Haz que tu cuerpo sea el mejor Shape Up:<br>Entrenamientos y dieta personalizados</h1>
            <h2>Somos un equipo de expertos en fitness y nutrición, diseñando planes personalizados para transformar tu cuerpo y mejorar tu salud</h2>
            @if (Auth::user()->suscription_id == 1) 
                <a href="{{ route('account.subscriptions')}}" class="btn-get-started">Suscribete ahora</a>
            @endif
        </div>
    </section>

    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('web/assets/img/ab.jpg') }}" class="img-fluid" alt="Imagen Acerca de">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>¡Bienvenido a ShapeUp!</h3>
                        <p class="fst-italic">
                            Creemos en proporcionar planes de entrenamiento y dietas personalizados que ayuden a nuestros usuarios a alcanzar sus objetivos de fitness.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Nuestro equipo de entrenadores experimentados crea planes de entrenamiento adaptados a tu tipo de cuerpo y nivel de fitness.</li>
                            <li><i class="bi bi-check-circle"></i> Nuestros entrenadores diseñan planes de dieta que son saludables y deliciosos, para ayudarte a mantener tu régimen de fitness.</li>
                            {{-- <li><i class="bi bi-check-circle"></i> Ofrecemos sesiones de entrenamiento en línea y consultas virtuales, lo que hace que sea fácil para ti mantener el ritmo, sin importar dónde te encuentres.</li> --}}
                        </ul>
                        <p>
                            En ShapeUp, estamos comprometidos a ayudarte a llevar una vida más saludable y feliz. ¡Únete a nosotros hoy y comienza tu camino hacia un cuerpo más saludable!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="counts" class="counts section-bg">
            <div class="container">
                <div class="row counters">
                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{$numUsers}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Usuarios</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{$numTrainings}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Entrenamientos</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{$numDiets}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Dietas</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{$numCoaches}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Entrenadores</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-right-arrow-alt"></i>
                                        <h4>Introduce tu peso</h4>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-right-arrow-alt"></i>
                                        <h4>Introduce tu altura</h4>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-party"></i>
                                        <h4>¡Cónoce tu IMC!</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>¿Quieres calcular tu IMC?</h3>
                            <p>
                                ¿Te interesa conocer tu Índice de Masa Corporal (IMC)? En nuestra plataforma, puedes calcularlo fácilmente y de manera gratuita. El IMC es una medida que se utiliza para evaluar si una persona tiene un peso saludable en relación con su altura. Conocer tu IMC te puede ayudar a entender tu estado de salud y a tomar decisiones informadas sobre tu estilo de vida. Para calcular tu IMC, solo necesitas ingresar tu altura y peso en nuestra calculadora en línea. ¡Pruébala ahora y conoce tu IMC!
                            </p>
                            <div class="text-center">
                                <a href="{{ route('account.imc') }}" class="more-btn">Calcula tu IMC<i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">
                <div class="section-title">
                    <h2>Gimnasios</h2>
                    <p>¿Dónde puedo llevar a cabo mis entrenamientos ShapeUp?</p>
                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($gyms as $gym)
                            <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/'. $gym->logo) }}" class="img-fluid" alt=""></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @if(Auth::user()->suscription_id == 2)

        <section id="entrenamientos-populares" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Entrenamientos</h2>
                    <p>Entrenamientos más populares</p>
                </div>

                @if (session('successTraining'))
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="alert alert-success alert-dismissible fade show w-75" role="alert">
                            {{ session('successTraining') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session('errorTraining'))
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                            {{ session('errorTraining') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($trainings as $training)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-3">
                            <div class="course-item">
                                <img src="{{ asset('web/assets/img/trainings.jpg') }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Nivel: {{$training->level}}</h4>
                                    </div>

                                    <h6><a href="{{route('account.trainings.exercises', ['training_id' => $training->id])}}">{{$training->title}}</a></h6>
                                    <p>{{$training->description}}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                            <span>{{ $training->coach->name }}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            @if(count(DB::table('user_follow_trainings')->where('user_id', Auth::user()->id)->where('training_id', $training->id)->get()) > 0)
                                                <a href="{{ route('account.trainings.follow', ['action' => 'unfollow', 'view' => 'index' , 'training_id' => $training->id]) }}"><i class="bi bi-heart-fill"></i></a>&nbsp;{{ count(DB::table('user_follow_trainings')->where('training_id', $training->id)->get()) }}
                                            @else       
                                                <a href="{{ route('account.trainings.follow', ['action' => 'follow', 'view' => 'index' , 'training_id' => $training->id]) }}"><i class="bi bi-heart"></i></a>&nbsp;{{ count(DB::table('user_follow_trainings')->where('training_id', $training->id)->get()) }}
                                            @endif
                                            {{-- <a href=""></a><i class="bx bx-heart"></i>&nbsp;42 --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @endif

        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">
                <div class="section-title">
                    <h2>Supermercados</h2>
                    <p>¿Dónde comprar los ingredientes de mis dietas ShapeUp?</p>
                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($supermarkets as $supermarket)
                            <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/'. $supermarket->logo) }}" class="img-fluid" alt=""></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @if (Auth::user()->suscription_id == 2)

        <section id="dietas-populares" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Dietas</h2>
                    <p>Dietas más populares</p>
                </div>

                @if (session('successDiet'))
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="alert alert-success alert-dismissible fade show w-75" role="alert">
                            {{ session('successDiet') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session('errorDiet'))
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                            {{ session('errorDiet') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($diets as $diet)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-3">
                            <div class="course-item">
                                <img src="{{ asset('web/assets/img/diets.jpg') }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Nivel: {{$training->level}}</h4>
                                    </div> --}}

                                    <h6><a href="{{route('account.diets.ingredients', ['diet_id' => $diet->id])}}">{{$diet->title}}</a></h6>
                                    <p>{{$diet->description}}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                            <span>{{ $diet->coach->name }}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            @if(count(DB::table('user_follow_diets')->where('user_id', Auth::user()->id)->where('diet_id', $diet->id)->get()) > 0)
                                                <a href="{{ route('account.diets.follow', ['action' => 'unfollow', 'view' => 'index' , 'diet_id' => $diet->id]) }}"><i class="bi bi-heart-fill"></i></a>&nbsp;{{ count(DB::table('user_follow_diets')->where('diet_id', $diet->id)->get()) }}
                                            @else       
                                                <a href="{{ route('account.diets.follow', ['action' => 'follow', 'view' => 'index' , 'diet_id' => $diet->id]) }}"><i class="bi bi-heart"></i></a>&nbsp;{{ count(DB::table('user_follow_diets')->where('diet_id', $diet->id)->get()) }}
                                            @endif
                                            {{-- <a href=""></a><i class="bx bx-heart"></i>&nbsp;42 --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @endif
    </main>
@endsection