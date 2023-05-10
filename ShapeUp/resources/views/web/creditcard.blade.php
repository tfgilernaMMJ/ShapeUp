<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShapeUp | Tarjeta de crédito</title>

    <link href="{{ asset('web/assets/img/logo/favicon.png') }}" rel="icon">
    <link href="{{ asset('payment/creditcard/css/csscreditcard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body> 
    <div class="container">
        <div class="price">
            <h1>Importe suscripción ShapeUp: 4,99 €</h1>
        </div>
    
        <form method="post" action="{{ route('account.payment') }}">
            @csrf
    
            <div class="card__container">
                <div class="card">
                    <div class="row credit">
                        <div class="left">
                            <label class="title">ShapeUp</label>
                        </div>
                    </div>
    
                    <div class="row cardholder">
                        <div class="info">
                            <label for="cardholdername">Nombre</label>
                            <input placeholder="ej. Joaquín Sánchez" id="cardholdername" type="text" name="cardholdername" required />
                        </div>
                    </div>
    
                    <div class="row number">
                        <div class="info">
                            <label for="cardnumber">Num. tarjeta </label>
                            <input id="cardnumber" type="text" pattern="[0-9]{16,19}" maxlength="19" placeholder="8888-8888-8888-8888" name="cardnumber" required />
                        </div>
                    </div>
    
                    <div class="row details">
                        <div class="left">
                            <label for="expiry-date">Expira</label>
                            <select id="expiry-date" name="expiry_month" required>
                                <option value="">MM</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <span>/</span>
                             <select id="expiry-date" name="expiry_year" required>
                                <option value="">AAAA</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                            </select>
                        </div>
                        <div class="right">
                            <label for="cvv">CVC/CVV</label>
                            <input type="text" maxlength="3" placeholder="123" name="cvv" required />
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="button">
                <button type="submit"><i class="bi bi-lock"></i> Secure pay</button>
            </div>
        </form>
        </div>
    </div>
    <script src="{{ asset('payment/creditcard/js/jscreditcard.js') }}"></script>
    </body>
    
    </html>