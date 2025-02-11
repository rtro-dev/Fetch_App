@extends('layouts.app')

@section('title', 'Lista de Pokemon')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Pokemon Registrados</h1>
        <a href="{{ route('pokemon.create') }}" class="btn btn-primary">Nuevo Pokemon</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('pokemon.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="tipo" class="form-label">Filtrar por tipo</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="">Todos los tipos</option>
                        @foreach(['Acero', 'Agua', 'Bicho', 'Dragón', 'Eléctrico', 'Fantasma', 'Fuego', 'Hada', 'Hielo', 'Lucha', 'Normal', 'Planta', 'Psíquico', 'Roca', 'Siniestro', 'Tierra', 'Veneno', 'Volador'] as $tipo)
                            <option value="{{ $tipo }}" {{ request('tipo') == $tipo ? 'selected' : '' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="trainer_id" class="form-label">Filtrar por entrenador</label>
                    <select name="trainer_id" id="trainer_id" class="form-select">
                        <option value="">Todos los entrenadores</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}" {{ request('trainer_id') == $trainer->id ? 'selected' : '' }}>
                                {{ $trainer->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        @if(request()->has('tipo') || request()->has('trainer_id'))
                            <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Limpiar filtros</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($pokemon->isEmpty())
        <div class="alert alert-info">
            @if($filtroAplicado)
                No se encontraron Pokemon con los filtros seleccionados.
            @else
                No hay Pokemon registrados aún.
            @endif
        </div>
    @else
        <div class="row">
            @foreach($pokemon as $poke)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $poke->nombre }}</h5>
                            <p class="card-text">
                                <strong>Tipo:</strong> {{ $poke->tipo }}<br>
                                <strong>Nivel:</strong> {{ $poke->nivel }}<br>
                                <strong>Entrenador:</strong> {{ $poke->trainer->nombre }}
                            </p>
                            <div class="btn-group">
                                <a href="{{ route('pokemon.edit', $poke) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('pokemon.destroy', $poke) }}" method="POST" class="d-inline">
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
            {{ $pokemon->withQueryString()->links() }}
        </div>
    @endif
@endsection