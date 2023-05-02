@extends('adminlte::page')
@section('plugins.Sweetalert2', true)


@section('title', 'Bienvenido')

@section('content_header')
    <h1>Hola, Bienvenido.</h1>
@stop

@section('content')

<br>


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                @if ($cliente->count())


                    @foreach ($cliente as $client)
                    <p>Tienes un dominio creada con el estado <strong>{{ $response[0]['estado'] }}</strong> y registra los siguientes datos <br>
                        para actualizar los datos de tu suscripcion e informacion empresarial inicia sesion en nuestro dominio principal
                    </p>

                    <div class="container shadow"><br>
                        {{-- <div class="float-right">
                            <a class="btn btn-sm btn-success" href="{{ route('home.edit',$client->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Actualizar') }}</a>
                        </div> --}}<br>
                        <div class="row">
                          <div class="col-sm">
                            <label for="Usuario">Usuario</label> <br>
                            {{ $client->user->email }}
                          </div>
                          <div class="col-sm">
                            <label for="Dominio">Dominio</label><br>
                            <a href="http://{{$response[0]['dominio']}}.teamforcex.com.co" target="_blank" rel="noopener noreferrer">{{ $client->dominio }}.teamforcex.com.co</a>
                          </div>
                          <div class="col-sm">
                           <label for="Empresa">Empresa</label><br>
                           {{ $response[0]['empresa'] }}
                          </div>
                          <div class="col-sm">
                            <label for="Contacto">Contacto</label><br>
                            {{ $response[0]['contacto']}}
                          </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                              <label for="Telefono">Telefono</label><br>
                              {{ $response[0]['telefono'] }}
                            </div>
                            <div class="col-sm">
                              <label for="Telefono2">Telefono2</label><br>
                              {{ $response[0]['telefono2'] }}
                            </div>
                            <div class="col-sm">
                             <label for="Direccion">Direccion</label><br>
                             {{ $response[0]['direccion'] }}
                            </div>
                            <div class="col-sm">
                              <label for="Email">Email</label><br>
                              {{ $response[0]['email'] }}
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-sm">
                              <label for="Nit">Nit</label><br>
                              {{ $response[0]['nit']}}
                            </div>
                            <div class="col-sm">
                              <label for="Actividad">Actividad</label><br>
                              {{ $response[0]['actividad'] }}
                            </div>
                            <div class="col-sm">
                             <label for="Plan">Plan</label><br>
                             {{ $response[0]['plan'] }}
                            </div>
                            <div class="col-sm">
                              <label for="Metodo Pago">Metodo Pago</label><br>
                              {{ $response[0]['metodo_pago'] }}
                            </div>
                          </div>
                          <br> <br> <br>
                          <div class="row">
                            <div class="col-sm">

                              {{--   <form action="{{ route('home.destroy',$client->id) }}"  class="formulario-eliminar" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm " ><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar Dominio') }} </button>
                                </form> --}}
                            </div>
                          </div>
                          <br>
                      </div>
                      @endforeach








                @else
                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Crear Cuentas.</span>
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
                                <input type="hidden" name="metodo_pago" value="t_credito">
                                <div class="container-xl">
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

                                    <div class="row justify-content-center align-items-start g-2">
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Plan') }}

                                                <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio1"
                                                            name="plan" value="free" checked="true">
                                                        <label for="customRadio1"
                                                            class="custom-control-label">Gratuito(demo)</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio2"
                                                            name="plan" value="suscripcion1">
                                                        <label for="customRadio2" class="custom-control-label">Plan
                                                            suscripcion FULL (sin resctricciones)</label>
                                                    </div>
                                                </div>

                                                {!! $errors->first('plan', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            Planes
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <footer class="blockquote-footer">
                                        <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
                                    </footer>
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
@if ( Session::get('success')=='Su Dominio ha sido Creado Satisfactoriamente.')
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

@if ( Session::get('success')=='El Dominio se ha Eliminado de la Base de Datos')
    <script>
        Swal.fire(
                'Eliminado!',
                'El dominio se elimino del registro.',
                'success'
                )
    </script>
@endif
<script>
    $('.formulario-eliminar').submit(function(e){
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
