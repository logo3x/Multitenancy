@extends('adminlte::page')
@section('plugins.Sweetalert2', true)


@section('title', 'Bienvenido')

@section('content_header')
    <h1>Hola, Bienvenido.</h1>
@stop

@section('content')

<br>

{{ var_dump($cliente[0]) }}
 {{-- <p>Tienes un dominio creada con el estado <strong>{{ $cliente[0]->estado }}</strong> y registra los
                        siguientes datos</p> <br>

                    <div class="container shadow mb-6"><br>

                        <div class="float-right">
                            <a class="btn btn-sm btn-success" href="{{ route('home.edit', $cliente[0]->id) }}"><i
                                    class="fa fa-fw fa-edit"></i> {{ __('Actualizar Información') }}</a>
                                    @if ($cliente[0]->plan=='Gratuita')
                                    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_GwEa25nRlh.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                                    @else
                                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_wci9dxrs.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                                    @endif
                        </div><br>
                        <div class="row">
                            <div class="col-sm">
                                <label for="Usuario">Usuario</label> <br>
                                {{ $cliente[0]->user->email }}
                            </div>
                            <div class="col-sm">
                                <label for="Dominio">Dominio</label><br>
                                <a href="http://{{ $cliente[0]->dominio }}.teamforcex.com.co" target="_blank"
                                    rel="noopener noreferrer">{{ $cliente[0]->dominio }}.teamforcex.com.co</a>
                            </div>
                            <div class="col-sm">
                                <label for="Empresa">Empresa</label><br>
                                {{ $cliente[0]->empresa }}
                            </div>
                            <div class="col-sm">
                                <label for="Contacto">Contacto</label><br>
                                {{ $cliente[0]->contacto }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <label for="Telefono">Telefono</label><br>
                                {{ $cliente[0]->telefono }}
                            </div>
                            <div class="col-sm">
                                <label for="Telefono2">Telefono2</label><br>
                                {{ $cliente[0]->telefono2 }}
                            </div>
                            <div class="col-sm">
                                <label for="Direccion">Direccion</label><br>
                                {{ $cliente[0]->direccion }}
                            </div>
                            <div class="col-sm">
                                <label for="Email">Email</label><br>
                                {{ $cliente[0]->email }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <label for="Nit">Nit</label><br>
                                {{ $cliente[0]->nit }}
                            </div>
                            <div class="col-sm">
                                <label for="Actividad">Actividad</label><br>
                                {{ $cliente[0]->actividad }}
                            </div>
                            <div class="col-sm">
                                <label for="Plan">Plan Actual</label><br>
                                {{ $cliente[0]->plan }} <br>
                            </div>
                            <div class="col-sm">
                                <label for="Plan">Vencimiento</label><br>
                                {{ $cliente[0]->vencimiento }} <br>
                            </div>
                        </div>

                        <br> <br> <br>
                        <div class="row">
                            <div class="col-sm">

                                <form action="{{ route('home.destroy', $cliente[0]->id) }}" class="formulario-eliminar"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm "><i class="fa fa-fw fa-trash"></i>
                                        {{ __('Eliminar Dominio') }} </button>
                                </form>
                            </div>
                            @if ($cliente[0]->plan=='Gratuita')
                            <div class="col-sm">
                                <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_R57zxlY9RY.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                            </div>
                            @endif
                        </div>

                        <br>
                    </div>

                    <br>

        @if ($cliente[0]->plan=='Gratuita')

           <div class="container shadow mt-6">

                        <div class="card w-100 p-3 text-center mt-6">
                            <div class="card-header">
                                <h3 class="card-title">Amplia tu sucripcion mira nuestros planes</h3>
                            </div>

                            <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>

                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <a href="{{ route('sucripciones.plan1', $cliente[0]) }}"
                                                rel="noopener noreferrer"><img class="d-block w-100"
                                                    src="{{ asset('img/plan1.jpg') }}" alt="First slide"></a>

                                        </div>
                                        <div class="carousel-item active">
                                            <a href="{{ route('sucripciones.plan2', $cliente[0]) }}"
                                                rel="noopener noreferrer"><img class="d-block w-100"
                                                    src="{{ asset('img/plan2.jpg') }}"
                                                    alt="Second slide"></a>
                                        </div>

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                    @endif --}}




@stop

@section('css')

@stop

@section('js')



@stop
