@extends('web.templates.template')

@section('titulo')
    Entrenadores
@endsection

@section('coaches-nav')
    active
@endsection

@section('coaches-section')
    <main id="main" data-aos="fade-in">
        <div class="breadcrumbs">
            <div class="container">
                <h2>Entrenadores</h2>
                <p>Es posible que no podamos evitar algunas dificultades para elegir lo que nos hace feliz. Pero debemos buscar la felicidad y el placer en nuestras elecciones. Debemos perseverar a pesar de las dificultades y trabajar duro para lograr nuestros objetivos. Todo esfuerzo vale la pena y nos acerca a nuestras metas. Conócenos y realiza tu ShapeUp.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="d-flex justify-content-center align-items-center mt-3">
                <div class="alert alert-success alert-dismissible fade show w-75" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="d-flex justify-content-center align-items-center mt-3">
                <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="container" data-aos="zoom-out">
                    <div class="section-title">
                        <h2>Entrenadores</h2>
                        <p>
                            Filtros
                            <a type="button" onclick="mostrarFiltroTrainer()">
                                <i id="iconofiltertrainer" class="bi bi-arrow-down-circle-fill"></i>
                            </a>                              
                        </p>
                    </div>
                </div>
                <section id="contact" class="contact contactfiltertrainer" style="display:none">
                    <div class="container" data-aos="fade-up">
                        <div class="row mt-1">
                            <div class="col-lg-12 mt-2 mt-lg-0">
                                <form action="{{route('account.profile.edit')}}" method="post" role="form" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?? Auth::user()->name }}" required>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label for="username">Nombre de usuario</label>
                                            <input type="text" name="username" id="username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') ?? Auth::user()->username }}" required>                              
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <label for="email">Correo electrónico</label>
                                            <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ?? Auth::user()->email }}" required>                              
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group mt-3 mt-md-0">
                                            <label for="age" class="">Edad</label>
                                            <input type="number" name="age" id="age" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" value="{{ old('age') ?? Auth::user()->age }}" required>                              
                                            @if ($errors->has('age'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('age') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group mt-3 mt-md-0">
                                            <label for="weight" class="">Peso (en kg)</label>
                                            <input type="number" name="weight" id="weight" class="form-control {{ $errors->has('weight') ? ' is-invalid' : '' }}" value="{{ old('weight') ?? Auth::user()->weight }}" required>                              
                                            @if ($errors->has('weight'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('weight') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group mt-3 mt-md-0">
                                            <label for="height" class="">Altura (en cm)</label>
                                            <input type="number" name="height" id="height" class="form-control {{ $errors->has('height') ? ' is-invalid' : '' }}" value="{{ old('height') ?? Auth::user()->height }}" required>                              
                                            @if ($errors->has('height'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('height') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit">Guardar</button>
                                    </div>                            
                                </form>
                            </div>                    
                        </div>
                    </div>
                </section>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">  
                    @foreach ($coaches as $coach)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <img src="{{ asset('web/assets/img/coaches/'. $coach->photo) }}" class="img-fluid" alt="">
                                <div class="member-content">
                                    <h4>{{ $coach->name }}</h4>
                                    <span>País: {{ $coach->country }}</span>
                                    <span>Edad: {{ $coach->age }}</span>
                                    <span>Experiencia: {{ $coach->experience }}</span>
                                    <span>Seguidores: {{ count(DB::table('user_follow_coaches')->where('user_coach_id', $coach->id)->get()) }}</span>
                                    <p>
                                        {{ $coach->biography }}
                                    </p>
                                    <div class="social">
                                        @if(count(DB::table('user_follow_coaches')->where('user_id', Auth::user()->id)->where('user_coach_id', $coach->id)->get()) > 0)
                                            <a href="{{ route('account.coaches.follow', ['action' => 'unfollow', 'coach_id' => $coach->id]) }}"><i class="bi bi-heart-fill"></i></a>
                                            @if (Auth::user()->suscription_id == 2)       
                                                <a href="{{ route('account.coaches.message', ['coach_id' => $coach->id]) }}"><i class="bi bi-chat-left-dots-fill"></i></a>
                                            @endif
                                        @else       
                                            <a href="{{ route('account.coaches.follow', ['action' => 'follow', 'coach_id' => $coach->id]) }}"><i class="bi bi-heart"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

<script>
    function mostrarFiltroTrainer() {
    const iconoFiltro = document.querySelector('#iconofiltertrainer');
    const contactSection = document.querySelector('.contactfiltertrainer');

        if (contactSection.style.display === "none") {
            contactSection.style.display = "block";
            iconoFiltro.classList.remove("bi-arrow-down-circle-fill");
            iconoFiltro.classList.add("bi-arrow-up-circle-fill");
        } else {
            contactSection.style.display = "none";
            iconoFiltro.classList.remove("bi-arrow-up-circle-fill");
            iconoFiltro.classList.add("bi-arrow-down-circle-fill");
        }
    }

</script>
@endsection