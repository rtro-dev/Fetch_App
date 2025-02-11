@extends('layouts.app')

@section('title', 'Lista de Entrenadores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Entrenadores Pokemon</h1>
        <a href="{{ route('trainers.create') }}" class="btn btn-primary">Nuevo Entrenador</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('trainers.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="region" class="form-label">Filtrar por región</label>
                    <select class="form-select" id="region" name="region">
                        <option value="">Todas las regiones</option>
                        @foreach(['Alola', 'Galar', 'Hoenn', 'Johto', 'Kalos', 'Kanto', 'Paldea', 'Sinnoh', 'Teselia'] as $region)
                            <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                                {{ $region }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        @if(request()->has('region'))
                            <a href="{{ route('trainers.index') }}" class="btn btn-secondary">Limpiar filtro</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($trainers->isEmpty())
        <div class="alert alert-info">
            @if($filtroAplicado)
                No se encontraron entrenadores de la región seleccionada.
            @else
                No hay entrenadores registrados aún.
            @endif
        </div>
    @else
        <div class="row">
            @foreach($trainers as $trainer)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $trainer->nombre }}</h5>
                            <p class="card-text">
                                <strong>Región:</strong> {{ $trainer->region }}<br>
                                <strong>Edad:</strong> {{ $trainer->edad }}<br>
                                <strong>Pokemon:</strong> {{ $trainer->pokemon->count() }}
                            </p>
                            <div class="btn-group">
                                <a href="{{ route('trainers.edit', $trainer) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('trainers.destroy', $trainer) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $trainers->links() }}
        </div>
    @endif
@endsection