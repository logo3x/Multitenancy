@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cliente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>

										<th>Id User</th>
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
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $cliente->id_user }}</td>
											<td>{{ $cliente->dominio }}</td>
											<td>{{ $cliente->empresa }}</td>
											<td>{{ $cliente->contacto }}</td>
											<td>{{ $cliente->telefono }}</td>
											<td>{{ $cliente->telefono2 }}</td>
											<td>{{ $cliente->direccion }}</td>
											<td>{{ $cliente->email }}</td>
											<td>{{ $cliente->nit }}</td>
											<td>{{ $cliente->actividad }}</td>
											<td>{{ $cliente->plan }}</td>
											<td>{{ $cliente->metodo_pago }}</td>
											<td>{{ $cliente->estado }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop



