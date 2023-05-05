@extends('adminlte::page')

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
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>E-mail</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($usuarios as $usuario)
                                        <tr>
                                          <td>{{ $usuario->id }}</td>
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

                                             @if ($usuario->id!=1)
                                            {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                             @endif

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
@stop
