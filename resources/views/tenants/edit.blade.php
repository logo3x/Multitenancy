@extends('adminlte::page')

@section('title', 'Inquilinos')

@section('content_header')
    <h1>Actualizar Inquilino</h1>
    <small>Recuerde que al actualizar solo se cambiara el nombre del cliente y dominio, seguira apuntando a la misma base de datos creada inicialmente y no se alteraran los datos.</small>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('tenants.update', $tenant) }}" method="post">
            @csrf

            @method('PUT')



            <div class="mb-4">
                <label for="name">Nombre</label>
                <input class="form-control" value="{{ old('id',$tenant->id ) }}" name="id" type="text" placeholder="Nombre" />
                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                <input type="hidden" name="old_domain" value="{{ $tenant->id  }}">

            </div>

            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
            </div>



        </form>

    </div>

</div>



@stop

@section('css')
@stop

@section('js')
@stop








