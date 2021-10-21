@extends('usuario.layouts.template')

@section('header')
    Crear nuevo Apunte
@endsection

@section('content')



    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear apunte</h1>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="user" action="{{ route('usuario.apunte.store') }}" method="POST" 
                            enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_tema" aria-label="Default select example">
                                        {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema->id }}">{{ $tema->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="titulo" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Titulo">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" name="texto" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="url_recurso" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Recurso">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Imagen</label>
                                    <input type="file" name="imagen" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Seleccione la imagen..."
                                        accept=".jpg, .jpeg, .png">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Archivo</label>
                                    <input type="file" name="archivo" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Seleccione el archivo...">
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Aceptar">

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
