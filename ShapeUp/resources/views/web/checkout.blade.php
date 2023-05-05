@extends('web.templates.template')

@section('titulo')
    Método de pago
@endsection

@section('subscriptions-nav')
    active
@endsection

@section('contact-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Método de pago</h2>
                <p>En ShapeUp ofrecemos un método de pago seguro y confiable para nuestros usuarios. Puedes estar seguro de que tu información personal y financiera está protegida y que no te arrepentirás de obtener una suscripción. ¡Únete hoy mismo!</p>
            </div>
        </div>

        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class='bx bxs-credit-card' ></i>
                                        <h4>Tarjeta de crédito</h4>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class='bx bxl-paypal'></i>
                                        <h4>PayPal</h4>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class='bx bxs-message-square-add' ></i>
                                        <h4>Proximamente añadiremos más métodos de pago</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>¿Qué método de pago desea utilizar?</h3>
                            <div class="text-center">
                                <a href="{{ route('account.creditcard') }}" class="more-btn">Pagar con tarjeta de crédito<i class="bx bx-chevron-right"></i></a>
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="{{ route('account.paypal') }}" class="more-btn">Pagar con PayPal<i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection