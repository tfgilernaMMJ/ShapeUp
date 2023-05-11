@extends('web.templates.template')

@section('titulo')
    Alimentos de la deita
@endsection

@section('diets-nav')
    active
@endsection

@section('diets-ingredients-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Alimentos para la dieta</h2>
                <p>Explora nuestra selección de alimentos para mejorar tu dieta y alcanzar tus objetivos de fitness.</p>
            </div>
        </div>

        <section id="events" class="events">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    @foreach ($ingredients as $ingredient)
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset('web/assets/img/dietingredient.jpg') }}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="#">{{$ingredient->name}}</a></h5>
                                    <p class="fst-italic text-center">Tipo de alimento: {{$ingredient->tag->name}}</p>
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