@extends('layouts.app')

@section('title', 'Editar Pokemon')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Editar Pokemon: {{ $pokemon->nombre }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pokemon.update', $pokemon) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                           id="nombre" name="nombre" value="{{ old('nombre', $pokemon->nombre) }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select class="form-select @error('tipo') is-invalid @enderror" 
                            id="tipo" name="tipo">
                        <option value="">Selecciona un tipo</option>
                        @foreach(['Acero', 'Agua', 'Bicho', 'Dragón', 'Eléctrico', 'Fantasma', 'Fuego', 'Hada', 'Hielo', 'Lucha', 'Normal', 'Planta', 'Psíquico', 'Roca', 'Siniestro', 'Tierra', 'Veneno', 'Volador'] as $tipo)
                            <option value="{{ $tipo }}" {{ old('tipo', $pokemon->tipo) == $tipo ? 'selected' : '' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nivel" class="form-label">Nivel</label>
                    <input type="number" class="form-control @error('nivel') is-invalid @enderror" 
                           id="nivel" name="nivel" value="{{ old('nivel', $pokemon->nivel) }}">
                    @error('nivel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_entrenador" class="form-label">Entrenador</label>
                    <select class="form-select @error('id_entrenador') is-invalid @enderror" 
                            id="id_entrenador" name="id_entrenador">
                        <option value="">Selecciona un entrenador</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}" 
                                {{ old('id_entrenador', $pokemon->id_entrenador) == $trainer->id ? 'selected' : '' }}>
                                {{ $trainer->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_entrenador')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Pokemon</button>
                <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection