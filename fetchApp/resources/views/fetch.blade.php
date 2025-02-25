<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url-base" content="{{ url('') }}">
    <title>Gestión de Entrenadores y Pokémon</title>
    <!-- Agregamos Bootstrap para el estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="{{ asset('assets/js/pagination.js') }}" defer></script>
    <script src="{{ asset('assets/js/trainer.js') }}" defer></script>
    <script src="{{ asset('assets/js/pokemon.js') }}" defer></script>
    <!-- Styles -->
    <style>
        .github {
            text-decoration: none;
            color: gray;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }
        .github:hover {
            color: black;
        }
    </style>
</head>
<body class="container-fluid py-4 px-4">
    @include('modal')
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="main-title">
            <i class="fas fa-gamepad me-2"></i>Gestión de competidores
        </h1>
        <a href="https://github.com/rtro-dev/Fetch_App" class="github" target="_blank">
            <i class="fa-brands fa-github me-2"></i>Code
        </a>
    </div>

    <div class="row g-4">
        <!-- Sección Entrenadores -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2><i class="fas fa-user-friends me-2"></i>Lista de Entrenadores</h2>
                    <button id="createTrainerBtn" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#createTrainerModal">
                        <i class="fas fa-plus me-1"></i>Añadir
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Región</th>
                                    <th>Edad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="trainersTableBody">
                            </tbody>
                        </table>
                    </div>
                    <div id="trainersPagination" class="d-flex justify-content-center mt-3"></div>
                </div>
            </div>
        </div>

        <!-- Sección Pokémon -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2><i class="fas fa-dragon me-2"></i>Lista de Pokémon</h2>
                    <button id="createPokemonBtn" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#createPokemonModal">
                        <i class="fas fa-plus me-1"></i>Añadir
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Nivel</th>
                                    <th>Entrenador</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="pokemonTableBody">
                            </tbody>
                        </table>
                    </div>
                    <div id="pokemonPagination" class="d-flex justify-content-center mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const csrf_token = document.querySelector('meta[name="csrf-token"]').content;
        const url_base = document.querySelector('meta[name="url-base"]').content;
        const headers = {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrf_token
        };

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.alert-warning').forEach(alert => {
                alert.style.display = 'none';
            });
            loadTrainers();
            loadPokemon();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>