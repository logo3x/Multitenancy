@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('title', 'Usuarios')


@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

    <section class="section">

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>

                                  <table class="table table-striped mt-2">
                                    <thead>
                                        <th style="display: none;">ID</th>
                                        <th>Nombres</th>
                                        <th>E-mail</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($usuarios as $usuario)
                                        <tr>
                                          <td style="display: none;">{{ $usuario->id }}</td>
                                          <td>{{ $usuario->name }}</td>
                                          <td>{{ $usuario->email }}</td>
                                          <td>
                                            @if(!empty($usuario->getRoleNames()))
                                              @foreach($usuario->getRoleNames() as $rolNombre)
                                                <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                              @endforeach
                                            @endif
                                          </td>

                                          <td>
                                            <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

                                            {!! Form::open(['class' => 'formulario-eliminar','method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                          </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                  <!-- Centramos la paginacion a la derecha -->
                                <div class="pagination justify-content-end">
                                  {!! $usuarios->links() !!}
                                </div>

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
<script>
    $('.formulario-eliminar').submit(function(e){
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
