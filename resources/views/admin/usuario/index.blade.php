@extends('admin.layouts.template')

@section('header')
    Gestionar Usuarios
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Carrera</th>
                                <th>Ci</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Carrera</th>
                                <th>Ci</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id_carrera }}</td>
                                    <td>{{ $usuario->ci }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td> {{ $usuario->email }}</td>
                                    <td>
                                        <a href="{{route('admin.usuario.edit',$usuario->id)}}" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('admin.usuario.delete',$usuario->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Eliminar</span>
                                            </button>
                                        </form>
                                       
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


                <a href="{{ route('admin.usuario.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Usuario</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
