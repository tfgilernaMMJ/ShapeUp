@extends('web.templates.template')

@section('titulo')
    Mensaje a entrenador
@endsection

@section('coaches-nav')
    active
@endsection

@section('contact-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Contacta con tu entrenador</h2>
                <p>En ShapeUp sabemos que la comunicación con tu entrenador es fundamental para alcanzar tus objetivos de fitness. Por eso, ofrecemos una manera fácil y directa de ponerte en contacto con tu entrenador personal. Si tienes alguna duda sobre tu plan de entrenamiento, quieres hacerle una sugerencia o simplemente necesitas motivación extra, no dudes en contactar con tu entrenador. Estamos aquí para ayudarte en todo lo que necesites y asegurarnos de que alcanzas tus metas.</p>
            </div>
        </div>

        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">
                <div class="section-title">
                    <h2>Mensaje para</h2>
                    <p>{{$coach->name}}</p>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row mt-5">                 
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Cargando</div>
                                <div class="error-message"></div>
                                <div class="sent-message">¡Tu mensaje ha sido enviado. Gracias!</div>
                            </div>
                            <div class="text-center"><button type="submit">Enviar mensaje</button></div>
                        </form>
                    </div>                    
                </div>
            </div>
        </section>
    </main>
@endsection