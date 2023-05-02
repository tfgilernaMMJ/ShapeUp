@extends('web.templates.template')

@section('titulo')
    Inicio
@endsection

@section('index-nav')
    active
@endsection

@section('index-section')

    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Haz que tu cuerpo sea el mejor Shape Up:<br>Entrenamientos y dieta personalizados</h1>
            <h2>Somos un equipo de expertos en fitness y nutrición, diseñando planes personalizados para transformar tu cuerpo y mejorar tu salud</h2>
            <a href="courses.html" class="btn-get-started">Suscribete ahora</a>
        </div>
    </section>

    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('web/assets/img/ab.jpg') }}" class="img-fluid" alt="Imagen Acerca de">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>¡Bienvenido a ShapeUp!</h3>
                        <p class="fst-italic">
                            Creemos en proporcionar planes de entrenamiento y dietas personalizados que ayuden a nuestros usuarios a alcanzar sus objetivos de fitness.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Nuestro equipo de entrenadores experimentados crea planes de entrenamiento adaptados a tu tipo de cuerpo y nivel de fitness.</li>
                            <li><i class="bi bi-check-circle"></i> Nuestros entrenadores diseñan planes de dieta que son saludables y deliciosos, para ayudarte a mantener tu régimen de fitness.</li>
                            {{-- <li><i class="bi bi-check-circle"></i> Ofrecemos sesiones de entrenamiento en línea y consultas virtuales, lo que hace que sea fácil para ti mantener el ritmo, sin importar dónde te encuentres.</li> --}}
                        </ul>
                        <p>
                            En ShapeUp, estamos comprometidos a ayudarte a llevar una vida más saludable y feliz. ¡Únete a nosotros hoy y comienza tu camino hacia un cuerpo más saludable!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="counts" class="counts section-bg">
            <div class="container">
                <div class="row counters">
                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Usuarios</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Entrenamientos</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Dietas</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Entrenadores</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why Choose Mentor?</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
                            </p>
                            <div class="text-center">
                                <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Corporis voluptates sit</h4>
                                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>Ullamco laboris ladore pan</h4>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-images"></i>
                                        <h4>Labore consequatur</h4>
                                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">
                <div class="section-title">
                    <h2>Gimnasios</h2>
                    <p>¿Dónde puedo llevar a cabo mis entrenamientos ShapeUp?</p>
                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/altairsport.jpg') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/gofit.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/inacua.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/mcfit.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/metropolitan.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/o2centrowellness.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/gyms/satosport.png') }}" class="img-fluid" alt=""></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Entrenamientos</h2>
                    <p>Entrenamientos más populares</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
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
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="course-item">
                            <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Marketing</h4>
                                    <p class="price">$250</p>
                                </div>

                                <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                        <span>Lana</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;35
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;42
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="course-item">
                            <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Content</h4>
                                    <p class="price">$180</p>
                                </div>

                                <h3><a href="course-details.html">Copywriting</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                                        <span>Brandon</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;20
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;85
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">
                <div class="section-title">
                    <h2>Supermercados</h2>
                    <p>¿Dónde comprar los ingredientes de mis dietas ShapeUp?</p>
                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/aldi.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/carrefour.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/corte-ingles.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/coviran.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/dia.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/lidl.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/mas.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/mercadona.png') }}" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('web/assets/img/supermarkets/supersol.png') }}" class="img-fluid" alt=""></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Dietas</h2>
                    <p>Dietas más populares</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
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
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="course-item">
                            <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Marketing</h4>
                                    <p class="price">$250</p>
                                </div>

                                <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                                        <span>Lana</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;35
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;42
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="course-item">
                            <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Content</h4>
                                    <p class="price">$180</p>
                                </div>

                                <h3><a href="course-details.html">Copywriting</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                                        <span>Brandon</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;20
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;85
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>Walter White</h4>
                                <span>Web Development</span>
                                <p>
                                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>Sarah Jhinson</h4>
                                <span>Marketing</span>
                                <p>
                                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>William Anderson</h4>
                                <span>Content</span>
                                <p>
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>
@endsection