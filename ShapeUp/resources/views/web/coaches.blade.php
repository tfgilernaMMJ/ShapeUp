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

        <section id="counts" class="counts section-bg">
            <div class="container">
                <div class="row counters">
                    <div class="col-lg-12 col-12 text-center">
                        <p>Número de entrenadores actuales en ShapeUp: </p>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $numCoaches }}" data-purecounter-duration="1" class="purecounter"></span>
                    </div>
                </div>
            </div>
        </section>

        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
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
                                    <p>
                                        {{ $coach->biography }}
                                    </p>
                                    <div class="social">
                                        @if(count(DB::table('user_follow_coaches')->where('user_id', Auth::user()->id)->where('coach_id', $coach->id)->get()) > 0)
                                            <a href="{{ route('account.coaches.follow', ['action', 'unfollow', 'coach_id', $coach->id]) }}"><i class="bi bi-heart-fill"></i></a>
                                            <a href="{{ route('account.imc') }}"><i class="bi bi-chat-left-dots-fill"></i></a>
                                        @else       
                                            <a href="{{ route('account.coaches.follow', ['action', 'follow', 'coach_id', $coach->id]) }}"><i class="bi bi-heart"></i></a>
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
@endsection