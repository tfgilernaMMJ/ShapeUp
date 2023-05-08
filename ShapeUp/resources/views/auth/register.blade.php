@extends('auth.layouts.app')

@section('titulo')
Registro
@endsection

@section('register-section')
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="register100-form validate-form" action="{{route('register')}}" method="POST">
				@csrf
				<span class="login100-form-title p-b-43">
					Registro
				</span>

				<div id="parte1">
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						@error('name')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="text" name="name">
						<span class="focus-input100"></span>
						<span class="label-input100">Nombre</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						@error('username')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Nombre de usuario</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						@error('email')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Correo electrónico</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						@error('password')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						@error('password_confirmation')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="password" name="password_confirmation">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirmar contraseña</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div>
							<p class="txt1">
								¿Ya tienes una cuenta? Inicia sesión <a href="{{route('signin')}}" class="txt1">aquí</a>.
							</p>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="mostrarParte2()">
						  Siguiente
						</button>
					</div>					  
				</div>

				<div id="parte2" style="display: none;">
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						@error('country')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="text" name="country">
						<span class="focus-input100"></span>
						<span class="label-input100">País</span>
					</div>
				  
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						@error('age')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="number" name="age">
						<span class="focus-input100"></span>
						<span class="label-input100">Edad</span>
					</div>
				  
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						@error('weight')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="number" name="weight">
						<span class="focus-input100"></span>
						<span class="label-input100">Peso</span>
					</div>
				  
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						@error('height')
						<p>{{$message}}</p>
						@enderror
						<input class="input100" type="number" name="height">
						<span class="focus-input100"></span>
						<span class="label-input100">Altura</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div>
							<p class="txt1">
								¿Ya tienes una cuenta? Inicia sesión <a href="{{route('signin')}}" class="txt1">aquí</a>.
							</p>
						</div>
					</div>
	
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registrarme
						</button>
					</div>
				</div>
			</form>

			<div class="login100-more" style="background-image: url({{ asset('auth/images/login.jpeg') }});">
				<div class="glitch-wrapper">
					<div class="glitch" data-glitch="SHAPEUP">SHAPEUP</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function mostrarParte2() {
	  document.getElementById("parte1").style.display = "none";
	  document.getElementById("parte2").style.display = "block";
	}
</script>
	
@endsection