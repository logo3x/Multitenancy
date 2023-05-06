@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Informacion del Cliente</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">

                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inquilinos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Cuenta de Usuario:</strong>
                            {{ $cliente->user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Sub Dominio:</strong>
                            {{ $cliente->dominio }}
                        </div>
                        <div class="form-group">
                            <strong>Empresa:</strong>
                            {{ $cliente->empresa }}
                        </div>
                        <div class="form-group">
                            <strong>Contacto:</strong>
                            {{ $cliente->contacto }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $cliente->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono2:</strong>
                            {{ $cliente->telefono2 }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $cliente->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $cliente->email }}
                        </div>
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $cliente->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Actividad:</strong>
                            {{ $cliente->actividad }}
                        </div>
                        <div class="form-group">
                            <strong>Plan:</strong>
                            {{ $cliente->plan }}
                        </div>
                        <div class="form-group">
                            <strong>Creacion:</strong>
                            {{ $cliente->creacion }}
                        </div>
                        <div class="form-group">
                            <strong>Vencimiento:</strong>
                            {{ $cliente->vencimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Metodo Pago:</strong>
                            {{ $cliente->metodo_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cliente->estado }}
                        </div>

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
    <script> console.log('Hi!'); </script>
@stop
