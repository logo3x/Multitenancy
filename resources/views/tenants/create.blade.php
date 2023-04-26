@extends('adminlte::page')

@section('title', 'Inquilinos')

@section('content_header')
    <h1>Nuevo Inquilino</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('tenants.store') }}" method="post">
            @csrf



            <div class="mb-4">
                <label for="name">Nombre</label>
                <input class="form-control" value="{{ old('id') }}" name="id" type="text" placeholder="Nombre" />
                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}

            </div>

            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
            </div>



        </form>

    </div>

</div>



@stop

@section('css')
@stop

@section('js')
@stop






