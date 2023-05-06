@extends('adminlte::page')
@section('plugins.Sweetalert2', true)


@section('title', 'Bienvenido')

@section('content_header')
    <h1>Hola, Bienvenido.</h1>
@stop

@section('content')


    <section class="content container-fluid">
        <div class="row">
            <div class="float-right">

            </div>
            <div class="col-md-12">


                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                {{-- SI EL USUARIO YA TIENE CLIENTE_DOMINIO SE MUESTRAN LOS DATOS --}}
                @if ($cliente->count())



                    <p>Tienes un dominio creada con el estado <strong>{{ $cliente[0]->estado }}</strong> y registra los
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

                   {{--  SI EL PLAN ES GRATUITO MUESTRE CARRUSEL DE IMAGENES CON PLANES DISPONIBLES --}}
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


                    @endif






                    {{-- SI EL USUARIO NO HA CREADO CLIENTE_DOMINIO SE HABILITA EL FORMULARIO --}}
                @else
                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Que agradable es ser su elección y para continuar con la creacion de tu
                                aplicación es necesario unos cuantos datos. Agradecemos mucho su confianza en nuestros productos.
                            </span>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong><br>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="card-body">

                            <form method="POST" action="{{ route('home.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="metodo_pago" value="">
                                <div class="container-xl mb-8">
                                    <div class="row justify-content-center align-items-start g-2">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">http://</span>
                                                </div>
                                                <input type="text" name="id" value="{{ old('dominio') }}"
                                                    class="form-control" placeholder="dominio"
                                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2">.teamforcex.com.co</span>
                                                </div>
                                                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center align-items-start g-2">
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Nombre de la Empresa*') }}

                                                {{ Form::text('empresa', '', ['class' => 'form-control' . ($errors->has('empresa') ? ' is-invalid' : ''), 'placeholder' => 'Empresa']) }}
                                                {!! $errors->first('empresa', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Persona de Contacto*') }}
                                                {{ Form::text('contacto', '', ['class' => 'form-control' . ($errors->has('contacto') ? ' is-invalid' : ''), 'placeholder' => 'Contacto']) }}
                                                {!! $errors->first('contacto', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Telefono*') }}
                                                {{ Form::text('telefono', '', ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => '3121234567']) }}
                                                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center align-items-start g-2">
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Direccion') }}
                                                {{ Form::text('direccion', '', ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                                                {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Email*') }}
                                                {{ Form::text('email', '', ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'juan@miempresa.com']) }}
                                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Telefono2(Opcional)') }}
                                                {{ Form::text('telefono2', '', ['class' => 'form-control' . ($errors->has('telefono2') ? ' is-invalid' : ''), 'placeholder' => 'Telefono2']) }}
                                                {!! $errors->first('telefono2', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center align-items-start g-2">
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('Nit') }}
                                                {{ Form::text('nit', '', ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
                                                {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                {{ Form::label('Actividad Economica') }}
                                                {{ Form::text('actividad', '', ['class' => 'form-control' . ($errors->has('actividad') ? ' is-invalid' : ''), 'placeholder' => 'Actividad']) }}
                                                {!! $errors->first('actividad', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center align-items-start g-2 mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Plan') }}

                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                            id="customRadio1" name="plan" value="Gratuita"
                                                            checked="true">
                                                        <label for="customRadio1"
                                                            class="custom-control-label">Gratuito(Demo, despues podras cambiar de plan)</label>
                                                    </div>
                                                </div>

                                                {!! $errors->first('plan', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">

                                            <img src="{{ asset('img/plan-gratuito.jpg') }}" width="500px"
                                                alt="">
                                        </div>
                                    </div>
                                </div> <br>
                                <div class="text-center mt-6">

                                    <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> CREAR
                                        APLICACION</button>

                                </div>
                        </div>


                        </form>
                    </div>
            </div>

            @endif





        </div>
        </div>









    </section>
@stop

@section('css')


@stop

@section('js')

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


    @if (Session::get('success') == 'Su Dominio ha sido Creado Satisfactoriamente.')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Felicidades tu dominio se ha generado, Muchas gracias por confiar en nosotros.',
                showConfirmButton: false,
                timer: 4500
            })
        </script>
    @endif


    {{-- MESAJE DE PREGUNTA Y CONFIRMACION DE ELIMINACION DE CLIENTE INQUILINO --}}
    @if (Session::get('success') == 'El Dominio se ha Eliminado de la Base de Datos')
        <script>
            Swal.fire(
                'Eliminado!',
                'El dominio se elimino del registro.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Se eliminara la base de datos ¡No podrás revertir esto.!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>


@stop
