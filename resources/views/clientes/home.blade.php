@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card card-default  alert  alert-dismissible">




        <div class="card-body">
            <i class="fas fa-bullhorn"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="far fa-window-close"></i></button>
                Vencimiento del Plan: {{ $cliente['vencimiento'] }}
                <div class="float-right">
                    @if ($cliente['plan'] == 'Gratuita')
                    <img src="{{ asset('img/bannerg-inquilino.jpg') }}" width="500px" height="100px" alt="">
                    @endif
                </div>
        </div>

    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
