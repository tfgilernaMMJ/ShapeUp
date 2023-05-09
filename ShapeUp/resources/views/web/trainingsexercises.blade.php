@extends('web.templates.template')

@section('titulo')
    Ejercicios del entrenamiento
@endsection

@section('trainings-nav')
    active
@endsection

@section('trainings-exercises-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Ejercicios para entrenamiento</h2>
                <p>Explora nuestra selección de ejercicios para mejorar tu entrenamiento y alcanzar tus objetivos de fitness.</p>
            </div>
        </div>

        <section id="events" class="events">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    @foreach ($exercises as $exercise)
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset('web/assets/img/trainingexercise.jpg') }}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="#">{{$exercise->name}}</a></h5>
                                    <p class="fst-italic text-center">Descanso entre series: {{$exercise->duration}} segundos</p>
                                    <p class="fst-italic text-center">Series: {{$exercise->series}}</p>
                                    <p class="fst-italic text-center">Repeticiones: {{$exercise->repetitions}}</p>
                                    <p class="fst-italic text-center">Video explicativo <a href="{{$exercise->explanatory_video}}" target="_blank">aquí</a></p>
                                    {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fdsfidnasfi dsfdsfds asdeasfads gdfgrgtg dsfsdfasf gfgfbfbf fdsgdfsgfdsg gfdfbgfgf</p> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection