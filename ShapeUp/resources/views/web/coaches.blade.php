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
@endsection