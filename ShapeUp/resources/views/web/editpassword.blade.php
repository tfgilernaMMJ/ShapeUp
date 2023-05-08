@extends('web.templates.template')

@section('titulo')
    Cambiar contraseña
@endsection

@section('profile-nav')
    active
@endsection

@section('edit-password-section')
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Perfil de {{Auth::user()->name}}</h2>
                <p> ¡Bienvenido a tu perfil personalizado! Aquí puedes cambiar y actualizar tu información personal, incluyendo tu nombre, edad, peso, altura y otros detalles importantes. Puedes cambiar tu contraseña en cualquier momento. Mantener tus datos actualizados es importante para asegurarte de que tu cuenta sea segura y para recibir una mejor experiencia. ¡Asegúrate de mantener tu perfil actualizado!</p>
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
                        <a type="button" class="mb-3" href="{{route('account.profile')}}">Volver atrás</a>
                        <form action="{{route('account.profile.edit.password')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Contraseña actual" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Contraseña nueva" required>
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="password" name="confirmnewpassword" class="form-control" id="confirmnewpassword" placeholder="Confirmar contraseña nueva" required>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit">Guardar</button>
                            </div>                            
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