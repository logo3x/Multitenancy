

@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
<section class="section">
   
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">    

                    @if ($errors->any())                                                
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>                        
                            @foreach ($errors->all() as $error)                                    
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif

                    {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                <p class="text-danger">@error ('name') {{$message}} @enderror</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                {!! Form::email('email', null, array('class' => 'form-control')) !!}
                                <p class="text-danger">@error ('email') {{$message}} @enderror</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                {!! Form::password('password', array('class' => 'form-control')) !!}
                                <p class="text-danger">@error ('password') {{$message}} @enderror</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="confirm-password">Confirmar Password</label>
                                {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                                <p class="text-danger">@error ('confirm-password') {{$message}} @enderror</p>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Roles</label>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                @error ('roles[]') {{$message}} @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')

@stop

@section('js')

@stop