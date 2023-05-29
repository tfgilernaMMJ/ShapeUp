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

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
              <div class="row mt-3">
                <div class="col-lg-12 mt-5 mt-lg-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Entrenador</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Visto</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($mensajes as $index => $mensaje)
                        <tr>
                          <td>{{ $mensaje->created_at->format('d-m-Y') }}</td>
                          <td>{{ $mensaje->coach->name }}</td>
                          <td>{{ $mensaje->message }}</td>
                          <td>
                            @if ($mensaje->check == 0)
                              <i class="bx bx-check"></i>
                            @elseif ($mensaje->check == 1 && $mensaje->answerQuestion->check == 0)
                              <i class="bx bx-check-double"></i>
                              <a type="button" onclick="mostrarRespuesta({{ $mensaje->id }})">
                                <i id="icono" class="bi bi-arrow-down-circle-fill"></i>
                              </a>
                            @else
                              <i class='bx bxs-user-check'></i>
                              <a type="button" onclick="mostrarRespuesta({{ $mensaje->id }})">
                                <i id="icono" class="bi bi-arrow-down-circle-fill"></i>
                              </a>
                            @endif
                          </td>
                        </tr>
                        @if ($mensaje->answerQuestion)
                          <tr>
                            <td colspan="4" style="padding: 0; margin: 0;">
                              <div class="table-responsive" style="margin: 0; padding: 0;">
                                <table class="table table-bordered" style="margin: 0; padding: 0;">
                                  <tbody>
                                    <tr>
                                      <td class="table-light" colspan="4" id="respuesta{{ $mensaje->id }}" style="display: none;">
                                        <strong>Respuesta:</strong> {{ $mensaje->answerQuestion->answer_message }}
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </section>
    </main>
          
          <script>
            function mostrarRespuesta(idMensaje) {
              console.log("Mostrar respuesta: " + idMensaje);
              const respuesta = document.querySelector(`#respuesta${idMensaje}`);
              const icono = document.querySelector('#icono');
          
              if (respuesta.style.display === "none") {
                respuesta.style.display = "block";
                respuesta.style.width = "100%";
                icono.classList.remove("bi-arrow-down-circle-fill");
                icono.classList.add("bi-arrow-up-circle-fill");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route("account.messaging.check") }}',
                    type: 'POST',
                    data: { mensajeId: idMensaje },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            } else {
                respuesta.style.display = "none";
                icono.classList.remove("bi-arrow-up-circle-fill");
            icono.classList.add("bi-arrow-down-circle-fill");
            }

            }
          </script>          
@endsection