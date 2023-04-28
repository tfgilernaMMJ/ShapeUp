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
					<button class="login100-form-btn">
						Registrarme
					</button>
				</div>
			</form>

			<div class="login100-more" style="background-image: url({{ asset('auth2/images/login.jpeg') }});">
			</div>
		</div>
	</div>
</div>
@endsection