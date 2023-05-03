@extends('web.templates.template')

@section('titulo')
    IMC
@endsection

@section('index-nav')
    active
@endsection

@section('imc-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Suscripciones</h2>
                <p>Ofrecemos planes de suscripción flexibles para adaptarnos a cualquier presupuesto. Desde el plan Gratuito hasta el plan SuperShapeUp con características avanzadas, tenemos algo para todos. ¡Elige el plan que mejor se adapte a tus necesidades y comienza a disfrutar de todos los beneficios de nuestra plataforma!</p>
            </div>
        </div>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        <form action="#" method="post" role="form" class="php-email-form">
                            <div class="row">
                              <div class="col-md-6 form-group">
                                <input type="number" name="peso" class="form-control" id="peso" placeholder="Introduce tu peso en kg" required>
                              </div>
                              <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="number" class="form-control" name="altura" id="altura" placeholder="Introduce tu altura en cm" required>
                              </div>
                            </div>
                            <div class="my-3">
                              <div class="loading">Cargando</div>
                              <div class="error-message"></div>
                              <div class="sent-message">¡Tu mensaje ha sido enviado. Gracias!</div>
                            </div>
                            <div class="text-center"><button type="submit" id="calculate-btn" disabled>Calcular IMC</button></div>
                        </form>
                    </div>                    
                </div>
            </div>
        </section>
        <section id="counts" class="counts section-bg" style="display: none;">
            <div class="container">
              <div class="row counters">
                <div class="col-lg-12 text-center">
                    <h3 id="bmi-text"></h3>
                </div>
              </div>
            </div>
          </section>             
    </main>
@endsection