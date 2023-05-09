@extends('web.templates.template')

@section('titulo')
    Entrenamientos
@endsection

@section('trainings-nav')
    active
@endsection

@section('trainings-section')
    <main id="main" data-aos="fade-in">
        <div class="breadcrumbs">
            <div class="container">
                <h2>Entrenamientos</h2>
                <p>Bienvenido a nuestra página de entrenamientos. Ofrecemos una amplia variedad de programas de ejercicios diseñados para satisfacer las necesidades de todos los niveles, desde principiantes hasta avanzados. Nuestros entrenadores altamente capacitados han creado planes de entrenamiento cuidadosamente estructurados que te ayudarán a alcanzar tus objetivos de fitness y a llevar una vida saludable.</p>
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

        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
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
                                                <a href="{{ route('account.trainings.follow', ['action' => 'unfollow', 'training_id' => $training->id]) }}"><i class="bi bi-heart-fill"></i></a>&nbsp;{{ count(DB::table('user_follow_trainings')->where('training_id', $training->id)->get()) }}
                                            @else       
                                                <a href="{{ route('account.trainings.follow', ['action' => 'follow', 'training_id' => $training->id]) }}"><i class="bi bi-heart"></i></a>&nbsp;{{ count(DB::table('user_follow_trainings')->where('training_id', $training->id)->get()) }}
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
    </main>
@endsection