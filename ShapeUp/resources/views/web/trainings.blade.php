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

        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    {{-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Web Development</h4>
                                    <p class="price">$169</p>
                                </div>

                                <h3><a href="course-details.html">Website Design</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                        <span>Antonio</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;50
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;65
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    @foreach ($trainings as $training)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-3">
                            <div class="course-item">
                                <img src="{{ asset('web/assets/img/trainings.jpg') }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Nivel: {{$training->level}}</h4>
                                    </div>

                                    <h6><a href="course-details.html">{{$training->title}}</a></h6>
                                    <p>{{$training->description}}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                            <span>{{ $training->coach->name }}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            {{-- <i class="bx bx-user"></i>&nbsp;35
                                            &nbsp;&nbsp; --}}
                                            <i class="bx bx-heart"></i>&nbsp;42
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