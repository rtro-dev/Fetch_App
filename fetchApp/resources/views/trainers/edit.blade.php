@extends('layouts.app')

@section('title', 'Editar Entrenador')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Editar Entrenador: {{ $trainer->nombre }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('trainers.update', $trainer) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                           id="nombre" name="nombre" value="{{ old('nombre', $trainer->nombre) }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="region" class="form-label">Región</label>
                    <select class="form-select @error('region') is-invalid @enderror" 
                            id="region" name="region">
                        <option value="">Selecciona una región</option>
                        @foreach(['Alola', 'Galar', 'Hoenn', 'Johto', 'Kalos', 'Kanto', 'Paldea', 'Sinnoh', 'Teselia'] as $tipo)
                            <option value="{{ $tipo }}" {{ old('tipo', $trainer->region) == $tipo ? 'selected' : '' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                    @error('region')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" class="form-control @error('edad') is-invalid @enderror" 
                           id="edad" name="edad" value="{{ old('edad', $trainer->edad) }}">
                    @error('edad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Entrenador</button>
                <a href="{{ route('trainers.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection