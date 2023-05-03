@extends('web.templates.template')

@section('titulo')
    Suscripciones
@endsection

@section('subscriptions-nav')
    active
@endsection

@section('subscriptions-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Suscripciones</h2>
                <p>Ofrecemos planes de suscripción flexibles para adaptarnos a cualquier presupuesto. Desde el plan Gratuito hasta el plan SuperShapeUp con características avanzadas, tenemos algo para todos. ¡Elige el plan que mejor se adapte a tus necesidades y comienza a disfrutar de todos los beneficios de nuestra plataforma!</p>
            </div>
        </div>

        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        @if (Auth::user()->suscription_id == 1)
                        <div class="box">
                            <span class="advanced">Contratada</span>
                        @else
                        <div class="box featured">
                        @endif
                            <h3>Gratuito</h3>
                            <h4><sup>€</sup>0<span> / mes</span></h4>
                            <ul>
                                <li>Ver ejercicios ShapeUp</li>
                                <li>Ver alimentos ShapeUp</li>
                                <li>Calcular IMC</li>
                                <li class="na">Ver entrenamientos ShapeUp</li>
                                <li class="na">Ver dietas ShapeUp</li>
                            </ul>
                            <div class="btn-wrap">
                                @if (Auth::user()->suscription_id == 1)

                                @else
                                <a href="#" class="btn-buy">Volver a Gratuito</a>
                                @endif
                            </div>
                        </div>
                    </div>
          
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        @if (Auth::user()->suscription_id == 2)
                        <div class="box">
                            <span class="advanced">Contratada</span>
                        @else
                        <div class="box featured">
                        @endif
                            <h3>SuperShapeUp</h3>
                            <h4><sup>€</sup>9.99<span> / mes</span></h4>
                            <ul>
                                <li>Ver ejercicios ShapeUp</li>
                                <li>Ver alimentos ShapeUp</li>
                                <li>Calcular IMC</li>
                                <li>Ver entrenamientos ShapeUp</li>
                                <li>Ver dietas ShapeUp</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Contratar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection