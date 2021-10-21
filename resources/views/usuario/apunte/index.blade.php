@extends('usuario.layouts.template')

@section('header')
    Gestionar Apuntes
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Apuntes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tema</th>
                                <th>Titulo</th>
                                <th>Texto</th>
                                <th>Imagen</th>
                                <th>Recurso</th>
                                <th>Archivo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tema</th>
                                <th>Titulo</th>
                                <th>Texto</th>
                                <th>Imagen</th>
                                <th>Recurso</th>
                                <th>Archivo</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($apuntes as $apunte)
                                <tr>
                                    <td>{{ $apunte->id_tema }}</td>
                                    <td>{{ $apunte->titulo }}</td>
                                    <td>{{ $apunte->texto }}</td>
                                    <td>
                                        <img style="width: 50%" src="{{ asset('/storage/' . $apunte->url_imagen) }}"
                                            alt="...">
                                    </td>
                                    <td> {{ $apunte->url_recurso }}</td>
                                    <td>
                                        <a href="{{ asset('/storage/' . $apunte->url_archivo) }}">
                                            archivo
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('usuario.apunte.edit', $apunte->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{ route('usuario.apunte.delete', $apunte->id) }}" method="POST">
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


                <a href="{{ route('usuario.apunte.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Apunte</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
