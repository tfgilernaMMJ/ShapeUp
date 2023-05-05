@extends('auth.layouts.app')

@section('titulo')
Inicio sesión
@endsection

@section('login-section')
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form" action="{{route('login')}}" method="POST">
				@csrf
				<span class="login100-form-title p-b-43">
					Inicio sesión
				</span>

				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="email">
					<span class="focus-input100"></span>
					<span class="label-input100">Correo electrónico</span>
				</div>
				@error('email')
					<p>{{$message}}</p>
				@enderror

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<input class="input100" type="password" name="password">
					<span class="focus-input100"></span>
					<span class="label-input100">Contraseña</span>
				</div>
				@error('password')
					<p>{{$message}}</p>
				@enderror

				<div class="flex-sb-m w-full p-t-3 p-b-32">
					<div>
						<a href="#" class="txt1">
							¿Has olvidado la contraseña?
						</a>
					</div>
				</div>

				<div class="flex-sb-m w-full p-t-3 p-b-32">
					<div>
						<p class="txt1">
							¿No tienes cuenta? Regístrate <a href="{{route('signup')}}" class="txt1">aquí</a>.
						</p>
					</div>
				</div>


				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Iniciar sesión
					</button>
				</div>

				<!-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							¿Ya tienes una cuenta? Inicia sesión
						</span>
					</div> -->
			</form>

			<div class="login100-more" style="background-image: url({{ asset('auth/images/login.jpeg') }});">
				<div class="glitch-wrapper">
					<div class="glitch" data-glitch="SHAPEUP">SHAPEUP</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection