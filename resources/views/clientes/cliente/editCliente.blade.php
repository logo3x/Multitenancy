@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Actualizar tu Cuenta</h1>
@stop

@section('content')

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Informacion de Cuenta, Estado actual <strong>{{ $cliente->estado }}</strong> en el nombre de dominio <strong>http://{{ $cliente->dominio }}.teamforcex.com.co</strong></span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('home.index') }}"> {{ __('Volver') }}</a>
                        </div>
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
                        <form method="POST" action="{{ route('home.update', $cliente->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="container shadow"><br>
                                        {{ Form::hidden('metodo_pago', $cliente->metodo_pago, ['class' => 'form-control' . ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Metodo Pago']) }}
                                        {{ Form::hidden('id_user', $cliente->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}

                                        <input type="hidden" name="dominio" value="{{ $cliente->dominio }}">
                                        <div class="row">
                                            <div class="col-sm">
                                               {{--  <div class="form-group">
                                                    {{ Form::label('Dominio') }}
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3">http://</span>
                                                        </div>
                                                        <input type="text" name="id"
                                                            value="{{ old('dominio', $cliente->dominio) }}"
                                                            class="form-control" placeholder="dominio"
                                                            aria-label="Recipient's username"
                                                            aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                id="basic-addon2">.teamforcex.com.co</span>
                                                        </div>
                                                    </div>

                                                    {!! $errors->first('dominio', '<div class="invalid-feedback">:message</div>') !!}
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Nombre de la Empresa*') }}
                                                    {{ Form::text('empresa', $cliente->empresa, ['class' => 'form-control' . ($errors->has('empresa') ? ' is-invalid' : ''), 'placeholder' => 'Empresa']) }}
                                                    {!! $errors->first('empresa', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Persona de Contacto*') }}
                                                    {{ Form::text('contacto', $cliente->contacto, ['class' => 'form-control' . ($errors->has('contacto') ? ' is-invalid' : ''), 'placeholder' => 'Contacto']) }}
                                                    {!! $errors->first('contacto', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Telefono*') }}
                                                    {{ Form::text('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                                                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Direccion') }}
                                                    {{ Form::text('direccion', $cliente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                                                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Email*') }}
                                                    {{ Form::text('email', $cliente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Telefono2(Opcional)') }}
                                                    {{ Form::text('telefono2', $cliente->telefono2, ['class' => 'form-control' . ($errors->has('telefono2') ? ' is-invalid' : ''), 'placeholder' => 'Telefono2']) }}
                                                    {!! $errors->first('telefono2', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Nit') }}
                                                    {{ Form::text('nit', $cliente->nit, ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
                                                    {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Actividad Economica') }}
                                                    {{ Form::text('actividad', $cliente->actividad, ['class' => 'form-control' . ($errors->has('actividad') ? ' is-invalid' : ''), 'placeholder' => 'Actividad']) }}
                                                    {!! $errors->first('actividad', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm">


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    {{ Form::label('Plan') }}
                                                    {{ Form::text('plan', $cliente->plan, ['class' => 'form-control' . ($errors->has('plan') ? ' is-invalid' : ''), 'placeholder' => 'Plan', 'readonly']) }}
                                                    {!! $errors->first('plan', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="box-footer mt20">
                                        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
