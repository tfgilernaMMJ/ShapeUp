@extends('auth2.layouts.app')

@section('titulo')
Inicio sesión
@endsection

@section('login-section')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Inicio sesión
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Correo electrónico</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Recordarme
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								¿Has olvidado la contraseña?
							</a>
						</div>
					</div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div>
							<p class="txt1">
								¿No tienes cuenta? Regístrate <a href="register.html" class="txt1">aquí</a>.
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

				<div class="login100-more" style="background-image: url('images/login.jpeg');">
				</div>
			</div>
		</div>
	</div>
@endsection