@extends('adminlte::page')

@section('title', 'Lista de Inquilinos')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Dominios Registrados a Clientes</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clientes con vencimiento en:') }} <p class="text-warning"> (Amarillo= entre 8 y 5 dias)</p><p class="text-danger">(Roja= entre 4 y 1 dia)</p><p class="text-muted">(Gris=Vencio hace  1 a 8 dia)</p>
                            </span>

                             <div class="float-right">
                               {{--  <a href="{{ route('inquilinos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a> --}}
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" >
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Usuario</th>
										<th>Dominio</th>
										<th>Empresa</th>
										<th>Contacto</th>
										<th>Telefono</th>




										<th>Plan</th>
										<th>Creacion</th>
										<th>Vencimiento</th>

										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                                @php
                                                 $dias = now()->diff($cliente->vencimiento)->format('%r%a')
                                                @endphp
                                        <tr
                                            @if (  $dias == 4 || $dias == 5 || $dias == 6 || $dias == 7)
                                                class="table-warning"
                                            @endif
                                            @if ($dias == 0 ||$dias == 1 || $dias == 2 || $dias == 3 )
                                                class="table-danger"
                                            @endif
                                            @if ($dias == -1 || $dias == -2 || $dias == -3 || $dias == -4 || $dias == -5|| $dias == -6|| $dias == -7)
                                                class="table-dark"
                                            @endif>


                                            <td>{{ ++$i }}</td>

											<td>{{ $cliente->user->email }}</td>
											<td>
                                                <a href="http://{{ $cliente->dominio }}.teamforcex.com.co" target="_blank"
                                                    rel="noopener noreferrer">{{ $cliente->dominio }}.teamforcex.com.co</a>
                                            </td>
											<td>{{ $cliente->empresa }}</td>
											<td>{{ $cliente->contacto }}</td>
											<td>{{ $cliente->telefono }}</td>





											<td>{{ $cliente->plan }}</td>
											<td>{{ $cliente->creacion }}</td>






                                            <td>
                                            D-({{ $dias }})  {{ $cliente->vencimiento }}</td>


											<td
                                            @if ( $cliente->estado=='Inactiva')
                                            class="bg-danger"
                                            @endif
                                            >{{ $cliente->estado }}</td>

                                            <td>
                                                <form action="{{ route('inquilinos.destroy',$cliente->id) }}" method="POST" class="formulario-eliminar">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inquilinos.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inquilinos.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
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
<link href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@stop

@section('js')
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv','excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>

{{-- MESAJE DE PREGUNTA Y CONFIRMACION DE ELIMINACION DE CLIENTE INQUILINO --}}
@if (Session::get('success') == 'Cliente y Dominio Eliminado')
<script>
    Swal.fire(
        'Eliminado!',
        'El dominio se elimino del registro.',
        'success'
    )
</script>
@endif
<script>
$('.formulario-eliminar').submit(function(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Estas seguro?',
        text: "Se eliminara la base de datos ¡No podrás revertir esto.!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminarlo!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
});
</script>




@stop





