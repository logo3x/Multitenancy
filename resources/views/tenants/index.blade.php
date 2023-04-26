@extends('adminlte::page')

@section('title', 'Inquilinos')

@section('content_header')
    <h1>Inquilinos</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Requerimiento') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('tenants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Nuevo') }}
                            </a>
                          </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>

                                    <th>Nombre</th>
                                    <th>Dominio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $tenant)
                                    <tr>
                                        <td>{{ $tenant->id }}</td>
                                        <td><a href="http://{{ $tenant->domains->first()->domain ??  '' }}" target="_blank" rel="noopener noreferrer">{{ $tenant->domains->first()->domain ??  '' }}</a></td>


                                        <td>
                                            <form action="{{ route('tenants.destroy', $tenant) }}" method="POST">

                                                <a class="btn btn-sm btn-success" href="{{ route('tenants.edit' , $tenant) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- { $tenants->links() } --}}
        </div>
    </div>
</div>




@stop

@section('css')
@stop

@section('js')
@stop








