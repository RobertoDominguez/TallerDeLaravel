@extends('usuario.layouts.template')

@section('header')
    Editar Apunte
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
                                <h1 class="h4 text-gray-900 mb-4">Editar apunte</h1>
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

                            <form class="user" action="{{ route('usuario.apunte.update', $apunte->id) }}"
                                method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_tema" aria-label="Default select example">
                                        {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                                        @foreach ($temas as $tema)
                                            @if ($apunte->id_tema == $tema->id)
                                                <option value="{{ $tema->id }}" selected>{{ $tema->nombre }}
                                                </option>
                                            @else
                                                <option value="{{ $tema->id }}">{{ $tema->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="titulo" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Titulo" value="{{ $apunte->titulo }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" name="texto" id="exampleFormControlTextarea1" rows="5">
                                                    {{ $apunte->titulo }}
                                                </textarea>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="url_recurso" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Recurso" value="{{ $apunte->recurso }}">
                                </div>

                                @if (!is_null($apunte->url_imagen))
                                    <img style="width: 50%" src="{{ asset('/storage/' . $apunte->url_imagen) }}"
                                        alt="...">
                                @endif

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Imagen</label>
                                    <input type="file" name="imagen" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Seleccione la imagen..."
                                        accept=".jpg, .jpeg, .png">
                                </div>

                                @if (!is_null($apunte->url_archivo))
                                    <a href="{{ $apunte->url_archivo }}">
                                @endif

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
