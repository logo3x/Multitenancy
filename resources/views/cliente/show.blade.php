@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? "{{ __('Show') Cliente" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $cliente->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Dominio:</strong>
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
@endsection
