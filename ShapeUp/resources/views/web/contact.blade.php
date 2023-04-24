@extends('web.templates.template')

@section('titulo')
    Contacto
@endsection

@section('contact-nav')
    active
@endsection

@section('contact-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Contacto</h2>
                <p>¡Bienvenido a la página de contacto de ShapeUp! Si necesitas ponerte en contacto con nosotros para cualquier consulta, duda o sugerencia, estás en el lugar adecuado. Nos encanta escuchar a nuestros usuarios y estamos aquí para ayudarte en todo lo que necesites.</p>
            </div>
        </div>

        <section id="contact" class="contact">
            <div data-aos="fade-up">
                {{-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> --}}
                <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.932583749691!2d-6.013061924202613!3d37.39142657208455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126c71c0eda5f3%3A0x6f8db9ee73f3c556!2sTorre%20Sevilla%2C%2041092%20Sevilla!5e0!3m2!1ses!2ses!4v1682373615311!5m2!1ses!2ses" frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container" data-aos="fade-up">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Localización:</h4>
                                <p>Torre Sevilla, 41092, Sevilla, España</p>
                            </div>
                    
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Correo electrónico:</h4>
                                <p>info@shapeup.es</p>
                            </div>
                    
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Teléfono:</h4>
                                <p>+34 910 111 222</p>
                            </div>
                        </div>
                    </div>                    

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo electrónico" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
                            </div>
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