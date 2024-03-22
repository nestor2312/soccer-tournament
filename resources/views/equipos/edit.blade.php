@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Equipo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.update', $equipo->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="grupo_id" class="col-md-4 col-form-label text-md-right">{{ __('Grupo') }}</label>

                            <div class="col-md-6">
                                <select id="grupo_id" name="grupo_id" class="form-control @error('grupo_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>--Seleccione un Grupo--</option>
                                    @foreach($grupos as $grupo)
                                        <option value="{{$grupo->id}}" @if($equipo->grupo_id == $grupo->id) selected @endif>{{$grupo->nombre}}</option>
                                    @endforeach
                                </select>

                                @error('grupo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $equipo->nombre) }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                            <div class="col-md-6">
                                <input id="imagen" type="file" class="form-control-file @error('imagen') is-invalid @enderror" name="imagen" accept="image/*" autofocus>

                                @if($equipo->imagen)
                                <div class="mt-2">
                                    <img src="{{ asset('imagenes/' . $equipo->imagen) }}" width="150" alt="Imagen del equipo">
                                </div>
                                @endif

                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                                <a href="{{ route('equipos.index') }}" class="btn btn-secondary">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
