@extends('web.templates.template')

@section('titulo')
    Mensajería
@endsection

@section('messaging-nav')
    active
@endsection

@section('messaging-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Mensajería de {{ Auth::user()->name }}</h2>
                <p>¡Bienvenido a tu página de mensajería personalizada! Aquí podrás ver los mensajes que has enviado a los entrenadores y sus respuestas. Es un espacio donde puedes comunicarte y recibir asesoramiento directamente de los entrenadores. Mantener un seguimiento de tus conversaciones te ayudará a tener un registro de tus consultas y obtener una mejor experiencia en el entrenamiento. ¡Explora tus mensajes y mantén una comunicación efectiva con los entrenadores!</p>
            </div>
        </div>

        @if (session('success'))
            <div class="d-flex justify-content-center align-items-center mt-3">
                <div class="alert alert-success alert-dismissible fade show w-75" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row mt-3">
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        @foreach ($mensajes as $mensaje)
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Entrenador</th>
                                <th scope="col">Mensaje</th>
                                <th scope="col">Visto</th>
                                @if ($mensaje->check == 1)
                                <th scope="col"></th>
                                @endif
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{ $mensaje->created_at->format('d-m-Y') }}</td>
                                <th scope="row">{{ $mensaje->coach->name }}</th>
                                <td>{{ $mensaje->message}}</td>
                                @if ($mensaje->check == 0)
                                <td><i class='bx bx-check'></i></td>
                                @else
                                <td><i class='bx bx-check-double' ></i></td>
                                <td><button class="btn-toggle" onclick="toggleAnswer(event)">
                                    <i class='bx bxs-caret-down-circle'></i>
                                </button></td>
                                @endif
                              </tr>
                              <tr>
                                <td class="table-light">...</td>
                              </tr>
                            </tbody>
                          </table>
                        @endforeach
                    </div>                    
                </div>
            </div>
        </section>       
    </main>

    <script>
        function mostrarFiltroTrainer() {
        const iconoFiltro = document.querySelector('#iconofiltertrainer');
        const contactSection = document.querySelector('.contactfiltertrainer');
    
            if (contactSection.style.display === "none") {
                contactSection.style.display = "block";
                iconoFiltro.classList.remove("bi-arrow-down-circle-fill");
                iconoFiltro.classList.add("bi-arrow-up-circle-fill");
            } else {
                contactSection.style.display = "none";
                iconoFiltro.classList.remove("bi-arrow-up-circle-fill");
                iconoFiltro.classList.add("bi-arrow-down-circle-fill");
            }
        }
    
    </script>
@endsection