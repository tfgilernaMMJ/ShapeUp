@extends('web.templates.template')

@section('titulo')
    Perfil
@endsection

@section('profile-nav')
    active
@endsection

@section('profile-section')
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
                        <a type="button" class="mb-3" href="#">Cambiar contraseña</a>
                        <form action="{{route('account.profile.edit')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?? Auth::user()->name }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="username">Nombre de usuario</label>
                                    <input type="text" name="username" id="username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') ?? Auth::user()->username }}" required>                              
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ?? Auth::user()->email }}" required>                              
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="country" class="">País</label>
                                    <select type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"" name="country">
                                        <option {{ Auth::user()->country == 'Afganistán' ? 'selected' : ''}} value="Afganistán">Afganistán</option>
                                        <option {{ Auth::user()->country == 'Albania' ? 'selected' : ''}} value="Albania">Albania</option>
                                        <option {{ Auth::user()->country == 'Alemania' ? 'selected' : ''}} value="Alemania">Alemania</option>
                                        <option {{ Auth::user()->country == 'Andorra' ? 'selected' : ''}} value="Andorra">Andorra</option>
                                        <option {{ Auth::user()->country == 'Angola' ? 'selected' : ''}} value="Angola">Angola</option>
                                        <option {{ Auth::user()->country == 'Anguilla' ? 'selected' : ''}} value="Anguilla">Anguilla</option>
                                        <option {{ Auth::user()->country == 'Antártida' ? 'selected' : ''}} value="Antártida">Antártida</option>
                                        <option {{ Auth::user()->country == 'Antigua y Barbuda' ? 'selected' : ''}} value="Antigua y Barbuda">Antigua y Barbuda</option>
                                        <option {{ Auth::user()->country == 'Antillas Holandesas' ? 'selected' : ''}} value="Antillas Holandesas">Antillas Holandesas</option>
                                        <option {{ Auth::user()->country == 'Arabia Saudí' ? 'selected' : ''}} value="Arabia Saudí">Arabia Saudí</option>
                                        <option {{ Auth::user()->country == 'Argelia' ? 'selected' : ''}} value="Argelia">Argelia</option>
                                        <option {{ Auth::user()->country == 'Argentina' ? 'selected' : ''}} value="Argentina">Argentina</option>
                                        <option {{ Auth::user()->country == 'Armenia' ? 'selected' : ''}} value="Armenia">Armenia</option>
                                        <option {{ Auth::user()->country == 'Aruba' ? 'selected' : ''}} value="Aruba">Aruba</option>
                                        <option {{ Auth::user()->country == 'Australia' ? 'selected' : ''}} value="Australia">Australia</option>
                                        <option {{ Auth::user()->country == 'Austria' ? 'selected' : ''}} value="Austria">Austria</option>
                                        <option {{ Auth::user()->country == 'Azerbaiyán' ? 'selected' : ''}} value="Azerbaiyán">Azerbaiyán</option>
                                        <option {{ Auth::user()->country == 'Bahamas' ? 'selected' : ''}} value="Bahamas">Bahamas</option>
                                        <option {{ Auth::user()->country == 'Bahrein' ? 'selected' : ''}} value="Bahrein">Bahrein</option>
                                        <option {{ Auth::user()->country == 'Bangladesh' ? 'selected' : ''}} value="Bangladesh">Bangladesh</option>
                                        <option {{ Auth::user()->country == 'Barbados' ? 'selected' : ''}} value="Barbados">Barbados</option>
                                        <option {{ Auth::user()->country == 'Bélgica' ? 'selected' : ''}} value="Bélgica">Bélgica</option>
                                        <option {{ Auth::user()->country == 'Belice' ? 'selected' : ''}} value="Belice">Belice</option>
                                        <option {{ Auth::user()->country == 'Benin' ? 'selected' : ''}} value="Benin">Benin</option>
                                        <option {{ Auth::user()->country == 'Bermudas' ? 'selected' : ''}} value="Bermudas">Bermudas</option>
                                        <option {{ Auth::user()->country == 'Bielorrusia' ? 'selected' : ''}} value="Bielorrusia">Bielorrusia</option>
                                        <option {{ Auth::user()->country == 'Birmania' ? 'selected' : ''}} value="Birmania">Birmania</option>
                                        <option {{ Auth::user()->country == 'Bolivia' ? 'selected' : ''}} value="Bolivia">Bolivia</option>
                                        <option {{ Auth::user()->country == 'Bosnia y Herzegovina' ? 'selected' : ''}} value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
                                        <option {{ Auth::user()->country == 'Botswana' ? 'selected' : ''}} value="Botswana">Botswana</option>
                                        <option {{ Auth::user()->country == 'Brasil' ? 'selected' : ''}} value="Brasil">Brasil</option>
                                        <option {{ Auth::user()->country == 'Brunei' ? 'selected' : ''}} value="Brunei">Brunei</option>
                                        <option {{ Auth::user()->country == 'Bulgaria' ? 'selected' : ''}} value="Bulgaria">Bulgaria</option>
                                        <option {{ Auth::user()->country == 'Burkina Faso' ? 'selected' : ''}} value="Burkina Faso">Burkina Faso</option>
                                        <option {{ Auth::user()->country == 'Burundi' ? 'selected' : ''}} value="Burundi">Burundi</option>
                                        <option {{ Auth::user()->country == 'Bután' ? 'selected' : ''}} value="Bután">Bután</option>
                                        <option {{ Auth::user()->country == 'Cabo Verde' ? 'selected' : ''}} value="Cabo Verde">Cabo Verde</option>
                                        <option {{ Auth::user()->country == 'Camboya' ? 'selected' : ''}} value="Camboya">Camboya</option>
                                        <option {{ Auth::user()->country == 'Camerún' ? 'selected' : ''}} value="Camerún">Camerún</option>
                                        <option {{ Auth::user()->country == 'Canadá' ? 'selected' : ''}} value="Canadá">Canadá</option>
                                        <option {{ Auth::user()->country == 'Chad' ? 'selected' : ''}} value="Chad">Chad</option>
                                        <option {{ Auth::user()->country == 'Chile' ? 'selected' : ''}} value="Chile">Chile</option>
                                        <option {{ Auth::user()->country == 'China' ? 'selected' : ''}} value="China">China</option>
                                        <option {{ Auth::user()->country == 'Chipre' ? 'selected' : ''}} value="Chipre">Chipre</option>
                                        <option {{ Auth::user()->country == 'Ciudad del Vaticano (Santa Sede)' ? 'selected' : ''}} value="Ciudad del Vaticano (Santa Sede)">Ciudad del Vaticano (Santa Sede)</option>
                                        <option {{ Auth::user()->country == 'Colombia' ? 'selected' : ''}} value="Colombia">Colombia</option>
                                        <option {{ Auth::user()->country == 'Comores' ? 'selected' : ''}} value="Comores">Comores</option>
                                        <option {{ Auth::user()->country == 'Congo' ? 'selected' : ''}} value="Congo">Congo</option>
                                        <option {{ Auth::user()->country == 'República Democrática del Congo' ? 'selected' : ''}} value="República Democrática del Congo">Congo, República Democrática del</option>
                                        <option {{ Auth::user()->country == 'Corea del Sur' ? 'selected' : ''}} value="Corea del Sur">Corea del Sur</option>
                                        <option {{ Auth::user()->country == 'Corea del Norte' ? 'selected' : ''}} value="Corea del Norte">Corea del Norte</option>
                                        <option {{ Auth::user()->country == 'Costa de Marfíl' ? 'selected' : ''}} value="Costa de Marfíl">Costa de Marfíl</option>
                                        <option {{ Auth::user()->country == 'Costa Rica' ? 'selected' : ''}} value="Costa Rica">Costa Rica</option>
                                        <option {{ Auth::user()->country == 'Croacia' ? 'selected' : ''}} value="Croacia">Croacia</option>
                                        <option {{ Auth::user()->country == 'Cuba' ? 'selected' : ''}} value="Cuba">Cuba</option>
                                        <option {{ Auth::user()->country == 'Dinamarca' ? 'selected' : ''}} value="Dinamarca">Dinamarca</option>
                                        <option {{ Auth::user()->country == 'Djibouti' ? 'selected' : ''}} value="Djibouti">Djibouti</option>
                                        <option {{ Auth::user()->country == 'Dominica' ? 'selected' : ''}} value="Dominica">Dominica</option>
                                        <option {{ Auth::user()->country == 'Ecuador' ? 'selected' : ''}} value="Ecuador">Ecuador</option>
                                        <option {{ Auth::user()->country == 'Egipto' ? 'selected' : ''}} value="Egipto">Egipto</option>
                                        <option {{ Auth::user()->country == 'El Salvador' ? 'selected' : ''}} value="El Salvador">El Salvador</option>
                                        <option {{ Auth::user()->country == 'Emiratos Árabes Unidos' ? 'selected' : ''}} value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
                                        <option {{ Auth::user()->country == 'Eritrea' ? 'selected' : ''}} value="Eritrea">Eritrea</option>
                                        <option {{ Auth::user()->country == 'Eslovenia' ? 'selected' : ''}} value="Eslovenia">Eslovenia</option>
                                        <option {{ Auth::user()->country == 'España' ? 'selected' : ''}} value="España">España</option>
                                        <option {{ Auth::user()->country == 'Estados Unidos' ? 'selected' : ''}} value="Estados Unidos">Estados Unidos</option>
                                        <option {{ Auth::user()->country == 'Estonia' ? 'selected' : ''}} value="Estonia">Estonia</option>
                                        <option {{ Auth::user()->country == 'Etiopía' ? 'selected' : ''}} value="Etiopía">Etiopía</option>
                                        <option {{ Auth::user()->country == 'Fiji' ? 'selected' : ''}} value="Fiji">Fiji</option>
                                        <option {{ Auth::user()->country == 'Filipinas' ? 'selected' : ''}} value="Filipinas">Filipinas</option>
                                        <option {{ Auth::user()->country == 'Finlandia' ? 'selected' : ''}} value="Finlandia">Finlandia</option>
                                        <option {{ Auth::user()->country == 'Francia' ? 'selected' : ''}} value="Francia">Francia</option>
                                        <option {{ Auth::user()->country == 'Gabón' ? 'selected' : ''}} value="Gabón">Gabón</option>
                                        <option {{ Auth::user()->country == 'Gambia' ? 'selected' : ''}} value="Gambia">Gambia</option>
                                        <option {{ Auth::user()->country == 'Georgia' ? 'selected' : ''}} value="Georgia">Georgia</option>
                                        <option {{ Auth::user()->country == 'Ghana' ? 'selected' : ''}} value="Ghana">Ghana</option>
                                        <option {{ Auth::user()->country == 'Gibraltar' ? 'selected' : ''}} value="Gibraltar">Gibraltar</option>
                                        <option {{ Auth::user()->country == 'Granada' ? 'selected' : ''}} value="Granada">Granada</option>
                                        <option {{ Auth::user()->country == 'Gran Bretaña' ? 'selected' : ''}} value="Gran Bretaña">Gran Bretaña</option>
                                        <option {{ Auth::user()->country == 'Grecia' ? 'selected' : ''}} value="Grecia">Grecia</option>
                                        <option {{ Auth::user()->country == 'Groenlandia' ? 'selected' : ''}} value="Groenlandia">Groenlandia</option>
                                        <option {{ Auth::user()->country == 'Guadalupe' ? 'selected' : ''}} value="Guadalupe">Guadalupe</option>
                                        <option {{ Auth::user()->country == 'Guam' ? 'selected' : ''}} value="Guam">Guam</option>
                                        <option {{ Auth::user()->country == 'Guatemala' ? 'selected' : ''}} value="Guatemala">Guatemala</option>
                                        <option {{ Auth::user()->country == 'Guayana' ? 'selected' : ''}} value="Guayana">Guayana</option>
                                        <option {{ Auth::user()->country == 'Guayana Francesa' ? 'selected' : ''}} value="Guayana Francesa">Guayana Francesa</option>
                                        <option {{ Auth::user()->country == 'Guinea' ? 'selected' : ''}} value="Guinea">Guinea</option>
                                        <option {{ Auth::user()->country == 'Guinea Ecuatorial' ? 'selected' : ''}} value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                                        <option {{ Auth::user()->country == 'Guinea-Bissau' ? 'selected' : ''}} value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option {{ Auth::user()->country == 'Haití' ? 'selected' : ''}} value="Haití">Haití</option>
                                        <option {{ Auth::user()->country == 'Honduras' ? 'selected' : ''}} value="Honduras">Honduras</option>
                                        <option {{ Auth::user()->country == 'Hungría' ? 'selected' : ''}} value="Hungría">Hungría</option>
                                        <option {{ Auth::user()->country == 'India' ? 'selected' : ''}} value="India">India</option>
                                        <option {{ Auth::user()->country == 'Indonesia' ? 'selected' : ''}} value="Indonesia">Indonesia</option>
                                        <option {{ Auth::user()->country == 'Irak' ? 'selected' : ''}} value="Irak">Irak</option>
                                        <option {{ Auth::user()->country == 'Irán' ? 'selected' : ''}} value="Irán">Irán</option>
                                        <option {{ Auth::user()->country == 'Irlanda' ? 'selected' : ''}} value="Irlanda">Irlanda</option>
                                        <option {{ Auth::user()->country == 'Isla Bouvet' ? 'selected' : ''}} value="Isla Bouvet">Isla Bouvet</option>
                                        <option {{ Auth::user()->country == 'Isla de Christmas' ? 'selected' : ''}} value="Isla de Christmas">Isla de Christmas</option>
                                        <option {{ Auth::user()->country == 'Islandia' ? 'selected' : ''}} value="Islandia">Islandia</option>
                                        <option {{ Auth::user()->country == 'Islas Caimán' ? 'selected' : ''}} value="Islas Caimán">Islas Caimán</option>
                                        <option {{ Auth::user()->country == 'Islas Cook' ? 'selected' : ''}} value="Islas Cook">Islas Cook</option>
                                        <option {{ Auth::user()->country == 'Islas de Cocos o Keeling' ? 'selected' : ''}} value="Islas de Cocos o Keeling">Islas de Cocos o Keeling</option>
                                        <option {{ Auth::user()->country == 'Islas Faroe' ? 'selected' : ''}} value="Islas Faroe">Islas Faroe</option>
                                        <option {{ Auth::user()->country == 'Islas Heard y McDonald' ? 'selected' : ''}} value="Islas Heard y McDonald">Islas Heard y McDonald</option>
                                        <option {{ Auth::user()->country == 'Islas Malvinas' ? 'selected' : ''}} value="Islas Malvinas">Islas Malvinas</option>
                                        <option {{ Auth::user()->country == 'Islas Marianas del Norte' ? 'selected' : ''}} value="Islas Marianas del Norte">Islas Marianas del Norte</option>
                                        <option {{ Auth::user()->country == 'Islas Marshall' ? 'selected' : ''}} value="Islas Marshall">Islas Marshall</option>
                                        <option {{ Auth::user()->country == 'Islas menores de Estados Unidos' ? 'selected' : ''}} value="Islas menores de Estados Unidos">Islas menores de Estados Unidos</option>
                                        <option {{ Auth::user()->country == 'Islas Palau' ? 'selected' : ''}} value="Islas Palau">Islas Palau</option>
                                        <option {{ Auth::user()->country == 'Islas Salomón' ? 'selected' : ''}} value="Islas Salomón">Islas Salomón</option>
                                        <option {{ Auth::user()->country == 'Islas Svalbard y Jan Mayen' ? 'selected' : ''}} value="Islas Svalbard y Jan Mayen">Islas Svalbard y Jan Mayen</option>
                                        <option {{ Auth::user()->country == 'Islas Tokelau' ? 'selected' : ''}} value="Islas Tokelau">Islas Tokelau</option>
                                        <option {{ Auth::user()->country == 'Islas Turks y Caicos' ? 'selected' : ''}} value="Islas Turks y Caicos">Islas Turks y Caicos</option>
                                        <option {{ Auth::user()->country == 'Islas Vírgenes (EEUU)' ? 'selected' : ''}} value="Islas Vírgenes (EEUU)">Islas Vírgenes (EEUU)</option>
                                        <option {{ Auth::user()->country == 'Islas Vírgenes (Reino Unido)' ? 'selected' : ''}} value="Islas Vírgenes (Reino Unido)">Islas Vírgenes (Reino Unido)</option>
                                        <option {{ Auth::user()->country == 'Islas Wallis y Futuna' ? 'selected' : ''}} value="Islas Wallis y Futuna">Islas Wallis y Futuna</option>
                                        <option {{ Auth::user()->country == 'Israel' ? 'selected' : ''}} value="Israel">Israel</option>
                                        <option {{ Auth::user()->country == 'Italia' ? 'selected' : ''}} value="Italia">Italia</option>
                                        <option {{ Auth::user()->country == 'Jamaica' ? 'selected' : ''}} value="Jamaica">Jamaica</option>
                                        <option {{ Auth::user()->country == 'Japón' ? 'selected' : ''}} value="Japón">Japón</option>
                                        <option {{ Auth::user()->country == 'Jordania' ? 'selected' : ''}} value="Jordania">Jordania</option>
                                        <option {{ Auth::user()->country == 'Kazajistán' ? 'selected' : ''}} value="Kazajistán">Kazajistán</option>
                                        <option {{ Auth::user()->country == 'Kenia' ? 'selected' : ''}} value="Kenia">Kenia</option>
                                        <option {{ Auth::user()->country == 'Kirguizistán' ? 'selected' : ''}} value="Kirguizistán">Kirguizistán</option>
                                        <option {{ Auth::user()->country == 'Kiribati' ? 'selected' : ''}} value="Kiribati">Kiribati</option>
                                        <option {{ Auth::user()->country == 'Kuwait' ? 'selected' : ''}} value="Kuwait">Kuwait</option>
                                        <option {{ Auth::user()->country == 'Laos' ? 'selected' : ''}} value="Laos">Laos</option>
                                        <option {{ Auth::user()->country == 'Lesotho' ? 'selected' : ''}} value="Lesotho">Lesotho</option>
                                        <option {{ Auth::user()->country == 'Letonia' ? 'selected' : ''}} value="Letonia">Letonia</option>
                                        <option {{ Auth::user()->country == 'Líbano' ? 'selected' : ''}} value="Líbano">Líbano</option>
                                        <option {{ Auth::user()->country == 'Liberia' ? 'selected' : ''}} value="Liberia">Liberia</option>
                                        <option {{ Auth::user()->country == 'Libia' ? 'selected' : ''}} value="Libia">Libia</option>
                                        <option {{ Auth::user()->country == 'Liechtenstein' ? 'selected' : ''}} value="Liechtenstein">Liechtenstein</option>
                                        <option {{ Auth::user()->country == 'Lituania' ? 'selected' : ''}} value="Lituania">Lituania</option>
                                        <option {{ Auth::user()->country == 'Luxemburgo' ? 'selected' : ''}} value="Luxemburgo">Luxemburgo</option>
                                        <option {{ Auth::user()->country == 'Ex-República Yugoslava de Macedonia' ? 'selected' : ''}} value="Ex-República Yugoslava de Macedonia">Macedonia, Ex-República Yugoslava de</option>
                                        <option {{ Auth::user()->country == 'Madagascar' ? 'selected' : ''}} value="Madagascar">Madagascar</option>
                                        <option {{ Auth::user()->country == 'Malasia' ? 'selected' : ''}} value="Malasia">Malasia</option>
                                        <option {{ Auth::user()->country == 'Malawi' ? 'selected' : ''}} value="Malawi">Malawi</option>
                                        <option {{ Auth::user()->country == 'Maldivas' ? 'selected' : ''}} value="Maldivas">Maldivas</option>
                                        <option {{ Auth::user()->country == 'Malí' ? 'selected' : ''}} value="Malí">Malí</option>
                                        <option {{ Auth::user()->country == 'Malta' ? 'selected' : ''}} value="Malta">Malta</option>
                                        <option {{ Auth::user()->country == 'Marruecos' ? 'selected' : ''}} value="Marruecos">Marruecos</option>
                                        <option {{ Auth::user()->country == 'Martinica' ? 'selected' : ''}} value="Martinica">Martinica</option>
                                        <option {{ Auth::user()->country == 'Mauricio' ? 'selected' : ''}} value="Mauricio">Mauricio</option>
                                        <option {{ Auth::user()->country == 'Mauritania' ? 'selected' : ''}} value="Mauritania">Mauritania</option>
                                        <option {{ Auth::user()->country == 'Mayotte' ? 'selected' : ''}} value="Mayotte">Mayotte</option>
                                        <option {{ Auth::user()->country == 'México' ? 'selected' : ''}} value="México">México</option>
                                        <option {{ Auth::user()->country == 'Micronesia' ? 'selected' : ''}} value="Micronesia">Micronesia</option>
                                        <option {{ Auth::user()->country == 'Moldavia' ? 'selected' : ''}} value="Moldavia">Moldavia</option>
                                        <option {{ Auth::user()->country == 'Mónaco' ? 'selected' : ''}} value="Mónaco">Mónaco</option>
                                        <option {{ Auth::user()->country == 'Mongolia' ? 'selected' : ''}} value="Mongolia">Mongolia</option>
                                        <option {{ Auth::user()->country == 'Montserrat' ? 'selected' : ''}} value="Montserrat">Montserrat</option>
                                        <option {{ Auth::user()->country == 'Mozambique' ? 'selected' : ''}} value="Mozambique">Mozambique</option>
                                        <option {{ Auth::user()->country == 'Namibia' ? 'selected' : ''}} value="Namibia">Namibia</option>
                                        <option {{ Auth::user()->country == 'Nauru' ? 'selected' : ''}} value="Nauru">Nauru</option>
                                        <option {{ Auth::user()->country == 'Nepal' ? 'selected' : ''}} value="Nepal">Nepal</option>
                                        <option {{ Auth::user()->country == 'Nicaragua' ? 'selected' : ''}} value="Nicaragua">Nicaragua</option>
                                        <option {{ Auth::user()->country == 'Níger' ? 'selected' : ''}} value="Níger">Níger</option>
                                        <option {{ Auth::user()->country == 'Nigeria' ? 'selected' : ''}} value="Nigeria">Nigeria</option>
                                        <option {{ Auth::user()->country == 'Niue' ? 'selected' : ''}} value="Niue">Niue</option>
                                        <option {{ Auth::user()->country == 'Norfolk' ? 'selected' : ''}} value="Norfolk">Norfolk</option>
                                        <option {{ Auth::user()->country == 'Noruega' ? 'selected' : ''}} value="Noruega">Noruega</option>
                                        <option {{ Auth::user()->country == 'Nueva Caledonia' ? 'selected' : ''}} value="Nueva Caledonia">Nueva Caledonia</option>
                                        <option {{ Auth::user()->country == 'Nueva Zelanda' ? 'selected' : ''}} value="Nueva Zelanda">Nueva Zelanda</option>
                                        <option {{ Auth::user()->country == 'Omán' ? 'selected' : ''}} value="Omán">Omán</option>
                                        <option {{ Auth::user()->country == 'Países Bajos' ? 'selected' : ''}} value="Países Bajos">Países Bajos</option>
                                        <option {{ Auth::user()->country == 'Panamá' ? 'selected' : ''}} value="Panamá">Panamá</option>
                                        <option {{ Auth::user()->country == 'Papúa Nueva Guinea' ? 'selected' : ''}} value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>
                                        <option {{ Auth::user()->country == 'Paquistán' ? 'selected' : ''}} value="Paquistán">Paquistán</option>
                                        <option {{ Auth::user()->country == 'Paraguay' ? 'selected' : ''}} value="Paraguay">Paraguay</option>
                                        <option {{ Auth::user()->country == 'Perú' ? 'selected' : ''}} value="Perú">Perú</option>
                                        <option {{ Auth::user()->country == 'Pitcairn' ? 'selected' : ''}} value="Pitcairn">Pitcairn</option>
                                        <option {{ Auth::user()->country == 'Polinesia Francesa' ? 'selected' : ''}} value="Polinesia Francesa">Polinesia Francesa</option>
                                        <option {{ Auth::user()->country == 'Polonia' ? 'selected' : ''}} value="Polonia">Polonia</option>
                                        <option {{ Auth::user()->country == 'Portugal' ? 'selected' : ''}} value="Portugal">Portugal</option>
                                        <option {{ Auth::user()->country == 'Puerto Rico' ? 'selected' : ''}} value="Puerto Rico">Puerto Rico</option>
                                        <option {{ Auth::user()->country == 'Qatar' ? 'selected' : ''}} value="Qatar">Qatar</option>
                                        <option {{ Auth::user()->country == 'República Centroafricana' ? 'selected' : ''}} value="República Centroafricana">República Centroafricana</option>
                                        <option {{ Auth::user()->country == 'República Checa' ? 'selected' : ''}} value="República Checa">República Checa</option>
                                        <option {{ Auth::user()->country == 'República de Sudáfrica' ? 'selected' : ''}} value="República de Sudáfrica">República de Sudáfrica</option>
                                        <option {{ Auth::user()->country == 'República Dominicana' ? 'selected' : ''}} value="República Dominicana">República Dominicana</option>
                                        <option {{ Auth::user()->country == 'República Eslovaca' ? 'selected' : ''}} value="República Eslovaca">República Eslovaca</option>
                                        <option {{ Auth::user()->country == 'Reunión' ? 'selected' : ''}} value="Reunión">Reunión</option>
                                        <option {{ Auth::user()->country == 'Ruanda' ? 'selected' : ''}} value="Ruanda">Ruanda</option>
                                        <option {{ Auth::user()->country == 'Rumania' ? 'selected' : ''}} value="Rumania">Rumania</option>
                                        <option {{ Auth::user()->country == 'Rusia' ? 'selected' : ''}} value="Rusia">Rusia</option>
                                        <option {{ Auth::user()->country == 'Sahara Occidental' ? 'selected' : ''}} value="Sahara Occidental">Sahara Occidental</option>
                                        <option {{ Auth::user()->country == 'Saint Kitts y Nevis' ? 'selected' : ''}} value="Saint Kitts y Nevis">Saint Kitts y Nevis</option>
                                        <option {{ Auth::user()->country == 'Samoa' ? 'selected' : ''}} value="Samoa">Samoa</option>
                                        <option {{ Auth::user()->country == 'Samoa Americana' ? 'selected' : ''}} value="Samoa Americana">Samoa Americana</option>
                                        <option {{ Auth::user()->country == 'San Marino' ? 'selected' : ''}} value="San Marino">San Marino</option>
                                        <option {{ Auth::user()->country == 'San Vicente y Granadinas' ? 'selected' : ''}} value="San Vicente y Granadinas">San Vicente y Granadinas</option>
                                        <option {{ Auth::user()->country == 'Santa Helena' ? 'selected' : ''}} value="Santa Helena">Santa Helena</option>
                                        <option {{ Auth::user()->country == 'Santa Lucía' ? 'selected' : ''}} value="Santa Lucía">Santa Lucía</option>
                                        <option {{ Auth::user()->country == 'Santo Tomé y Príncipe' ? 'selected' : ''}} value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
                                        <option {{ Auth::user()->country == 'Senegal' ? 'selected' : ''}} value="Senegal">Senegal</option>
                                        <option {{ Auth::user()->country == 'Seychelles' ? 'selected' : ''}} value="Seychelles">Seychelles</option>
                                        <option {{ Auth::user()->country == 'Sierra Leona' ? 'selected' : ''}} value="Sierra Leona">Sierra Leona</option>
                                        <option {{ Auth::user()->country == 'Singapur' ? 'selected' : ''}} value="Singapur">Singapur</option>
                                        <option {{ Auth::user()->country == 'Siria' ? 'selected' : ''}} value="Siria">Siria</option>
                                        <option {{ Auth::user()->country == 'Somalia' ? 'selected' : ''}} value="Somalia">Somalia</option>
                                        <option {{ Auth::user()->country == 'Sri Lanka' ? 'selected' : ''}} value="Sri Lanka">Sri Lanka</option>
                                        <option {{ Auth::user()->country == 'St Pierre y Miquelon' ? 'selected' : ''}} value="St Pierre y Miquelon">St Pierre y Miquelon</option>
                                        <option {{ Auth::user()->country == 'Suazilandia' ? 'selected' : ''}} value="Suazilandia">Suazilandia</option>
                                        <option {{ Auth::user()->country == 'Sudán' ? 'selected' : ''}} value="Sudán">Sudán</option>
                                        <option {{ Auth::user()->country == 'Suecia' ? 'selected' : ''}} value="Suecia">Suecia</option>
                                        <option {{ Auth::user()->country == 'Suiza' ? 'selected' : ''}} value="Suiza">Suiza</option>
                                        <option {{ Auth::user()->country == 'Surinam' ? 'selected' : ''}} value="Surinam">Surinam</option>
                                        <option {{ Auth::user()->country == 'Tailandia' ? 'selected' : ''}} value="Tailandia">Tailandia</option>
                                        <option {{ Auth::user()->country == 'Taiwán' ? 'selected' : ''}} value="Taiwán">Taiwán</option>
                                        <option {{ Auth::user()->country == 'Tanzania' ? 'selected' : ''}} value="Tanzania">Tanzania</option>
                                        <option {{ Auth::user()->country == 'Tayikistán' ? 'selected' : ''}} value="Tayikistán">Tayikistán</option>
                                        <option {{ Auth::user()->country == 'Territorios franceses del Sur' ? 'selected' : ''}} value="Territorios franceses del Sur">Territorios franceses del Sur</option>
                                        <option {{ Auth::user()->country == 'Timor Oriental' ? 'selected' : ''}} value="Timor Oriental">Timor Oriental</option>
                                        <option {{ Auth::user()->country == 'Togo' ? 'selected' : ''}} value="Togo">Togo</option>
                                        <option {{ Auth::user()->country == 'Tonga' ? 'selected' : ''}} value="Tonga">Tonga</option>
                                        <option {{ Auth::user()->country == 'Trinidad y Tobago' ? 'selected' : ''}} value="Trinidad y Tobago">Trinidad y Tobago</option>
                                        <option {{ Auth::user()->country == 'Túnez' ? 'selected' : ''}} value="Túnez">Túnez</option>
                                        <option {{ Auth::user()->country == 'Turkmenistán' ? 'selected' : ''}} value="Turkmenistán">Turkmenistán</option>
                                        <option {{ Auth::user()->country == 'Turquía' ? 'selected' : ''}} value="Turquía">Turquía</option>
                                        <option {{ Auth::user()->country == 'Tuvalu' ? 'selected' : ''}} value="Tuvalu">Tuvalu</option>
                                        <option {{ Auth::user()->country == 'Ucrania' ? 'selected' : ''}} value="Ucrania">Ucrania</option>
                                        <option {{ Auth::user()->country == 'Uganda' ? 'selected' : ''}} value="Uganda">Uganda</option>
                                        <option {{ Auth::user()->country == 'Uruguay' ? 'selected' : ''}} value="Uruguay">Uruguay</option>
                                        <option {{ Auth::user()->country == 'Uzbekistán' ? 'selected' : ''}} value="Uzbekistán">Uzbekistán</option>
                                        <option {{ Auth::user()->country == 'Vanuatu' ? 'selected' : ''}} value="Vanuatu">Vanuatu</option>
                                        <option {{ Auth::user()->country == 'Venezuela' ? 'selected' : ''}} value="Venezuela">Venezuela</option>
                                        <option {{ Auth::user()->country == 'Vietnam' ? 'selected' : ''}} value="Vietnam">Vietnam</option>
                                        <option {{ Auth::user()->country == 'Yemen' ? 'selected' : ''}} value="Yemen">Yemen</option>
                                        <option {{ Auth::user()->country == 'Yugoslavia' ? 'selected' : ''}} value="Yugoslavia">Yugoslavia</option>
                                        <option {{ Auth::user()->country == 'Zambia' ? 'selected' : ''}} value="Zambia">Zambia</option>
                                        <option {{ Auth::user()->country == 'Zimbabue' ? 'selected' : ''}} value="Zimbabue">Zimbabue</option>
                                    </select>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <label for="age" class="">Edad</label>
                                    <input type="number" name="age" id="age" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" value="{{ old('age') ?? Auth::user()->age }}" required>                              
                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <label for="weight" class="">Peso (en kg)</label>
                                    <input type="number" name="weight" id="weight" class="form-control {{ $errors->has('weight') ? ' is-invalid' : '' }}" value="{{ old('weight') ?? Auth::user()->weight }}" required>                              
                                    @if ($errors->has('weight'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <label for="height" class="">Altura (en cm)</label>
                                    <input type="number" name="height" id="height" class="form-control {{ $errors->has('height') ? ' is-invalid' : '' }}" value="{{ old('height') ?? Auth::user()->height }}" required>                              
                                    @if ($errors->has('height'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('height') }}</strong>
                                        </span>
                                    @endif
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