@extends('web.templates.template')

@section('titulo')
    Cancelar suscripción
@endsection

@section('subscriptions-nav')
    active
@endsection

@section('confirmsdisable-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>¿Estás seguro de que quieres cancelar tu suscripción SuperShapeUp?</h2>
                <p>Al cancelar su suscripción a SuperShapeUp, perderá todos los privilegios y beneficios que ofrecía la suscripción. Si está seguro de que desea cancelar su suscripción, haga clic en el botón 'Cancelar suscripción y volver a gratuito' de abajo.</p>
            </div>
        </div>         
        
        <section id="pricing" class="pricing">
            <div class="container mb-4" data-aos="fade-up">
                <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        <div class="text-center">
                            <div class="d-inline-block"><a href="{{ route('account.subscriptions')}}" class="get-started-btn">Volver atrás</a></div>
                            <div class="d-inline-block"><a href="{{ route('account.payment.disable', ['action' => 'gratuito'])}}" class="get-started-btn">Cancelar suscripción y volver a gratuito</a></div>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="box">
                            <h3>Gratuito</h3>
                            <h4><sup>€</sup>0<span> / mes</span></h4>
                            <ul>
                                <li>Ver ejercicios ShapeUp</li>
                                <li>Ver alimentos ShapeUp</li>
                                <li>Calcular IMC</li>
                                <li class="na">Ver entrenamientos ShapeUp</li>
                                <li class="na">Ver dietas ShapeUp</li>
                            </ul>
                        </div>
                    </div>
          
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box featured">
                            <h3>SuperShapeUp</h3>
                            <h4><sup>€</sup>9.99<span> / mes</span></h4>
                            <ul>
                                <li>Ver ejercicios ShapeUp</li>
                                <li>Ver alimentos ShapeUp</li>
                                <li>Calcular IMC</li>
                                <li>Ver entrenamientos ShapeUp</li>
                                <li>Ver dietas ShapeUp</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection