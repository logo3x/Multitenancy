@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">


                @if ($cliente->count())

                    Ya tienes un dominio creado con los siguientes datos <br>

                    <table class="table">
                        <thead class="thead">
                            <tr>


                                <th>Usuario</th>
                                <th>Dominio</th>
                                <th>Empresa</th>
                                <th>Contacto</th>
                                <th>Telefono</th>
                                <th>Telefono2</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Nit</th>
                                <th>Actividad</th>
                                <th>Plan</th>
                                <th>Metodo Pago</th>
                                <th>Estado</th>

                                <th></th>
                            </tr>
                        </thead>
                        @foreach ($cliente as $client)
                            <tr>
                                <td>{{ $client->user->email }}</td>
                                <td><a href="http://{{$client->dominio}}.teamforcex.com.co" target="_blank" rel="noopener noreferrer">{{ $client->dominio }}.teamforcex.com.co</a></td>
                                <td>{{ $client->empresa }}</td>
                                <td>{{ $client->contacto }}</td>
                                <td>{{ $client->telefono }}</td>
                                <td>{{ $client->telefono2 }}</td>
                                <td>{{ $client->direccion }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->nit }}</td>
                                <td>{{ $client->actividad }}</td>
                                <td>{{ $client->plan }}</td>
                                <td>{{ $client->metodo_pago }}</td>
                                <td>{{ $client->estado }}</td>
                            </tr>
                        @endforeach
                    </table>
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
                                                {!! $errors->first('dominio', '<div class="invalid-feedback">:message</div>') !!}
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
                                            Panes
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

@stop
