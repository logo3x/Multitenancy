@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Suscripciones por 6 meses</h1>
@stop

@section('content')

@php


// SDK de Mercado Pago
require base_path('vendor/autoload.php') ;
// Agrega credenciales
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
// Crea un ítem en la preferencia
$item = new MercadoPago\Item();

$item->title = 'Suscripcion_6Meses';
$item->quantity = 1;
$item->unit_price = 1600;//$117.285 para cobrar 100.000

 $preference->back_urls = array(
"success" => route('home.pay',$cliente),
"failure" => route('home.pay',$cliente),
"pending" => route('home.pay',$cliente),
);
$preference->auto_return = "approved";
// ...
$preference->items = array($item);
$preference->save();
@endphp

<br><br><br>

<div class="container w-75 shadow">
    <div class="row">
      <div class="col-sm">
        <h3 class="card-title">Suscripcion a nuestro plan por 6 Meses, realiza el pago seguro con:</h3><br>
        <div id="wallet_container"> </div>
      </div>

      <div class="col-sm">
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_8ahymrjw.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
      </div>
    </div>
  </div>


















@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

   {{-- // SDK MercadoPago.js --}}
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
const mp = new MercadoPago("{{ config('services.mercadopago.key') }}");
const bricksBuilder = mp.bricks();
mp.bricks().create("wallet", "wallet_container", {
   initialization: {
       preferenceId: "{{ $preference->id }}",
       //redirectMode: "modal",
   },
});
</script>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@stop
