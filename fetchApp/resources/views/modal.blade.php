<!-- Modal Crear Entrenador -->
<div class="modal fade" id="createTrainerModal" tabindex="-1" aria-labelledby="createTrainerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createTrainerModalLabel">Crear Entrenador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTrainerForm">
                    <div class="mb-3">
                        <label for="createTrainerName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="createTrainerName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="createTrainerRegion" class="form-label">Región</label>
                        <input type="text" class="form-control" id="createTrainerRegion" name="region">
                    </div>
                    <div class="mb-3">
                        <label for="createTrainerAge" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="createTrainerAge" name="edad" min="10" max="100">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalCreateTrainerWarning">Ha ocurrido un error. El entrenador no ha sido creado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalCreateTrainerButton">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ver Entrenador -->
<div class="modal fade" id="viewTrainerModal" tabindex="-1" aria-labelledby="viewTrainerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewTrainerModalLabel">Ver Entrenador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewTrainerForm">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" id="viewTrainerId" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="viewTrainerName" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Región</label>
                        <input type="text" class="form-control" id="viewTrainerRegion" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad</label>
                        <input type="number" class="form-control" id="viewTrainerAge" readonly disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Pokémon -->
<div class="modal fade" id="createPokemonModal" tabindex="-1" aria-labelledby="createPokemonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createPokemonModalLabel">Crear Pokémon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPokemonForm">
                    <div class="mb-3">
                        <label for="createPokemonName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="createPokemonName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="createPokemonType" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="createPokemonType" name="tipo">
                    </div>
                    <div class="mb-3">
                        <label for="createPokemonLevel" class="form-label">Nivel</label>
                        <input type="number" class="form-control" id="createPokemonLevel" name="nivel" min="1" max="100">
                    </div>
                    <div class="mb-3">
                        <label for="createPokemonTrainer" class="form-label">Entrenador</label>
                        <select class="form-control" id="createPokemonTrainer" name="id_entrenador">
                        </select>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalCreatePokemonWarning">Ha ocurrido un error. El pokémon no ha sido creado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalCreatePokemonButton">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ver Pokémon -->
<div class="modal fade" id="viewPokemonModal" tabindex="-1" aria-labelledby="viewPokemonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewPokemonModalLabel">Ver Pokémon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewPokemonForm">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" id="viewPokemonId" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="viewPokemonName" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="viewPokemonType" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nivel</label>
                        <input type="number" class="form-control" id="viewPokemonLevel" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entrenador</label>
                        <input type="text" class="form-control" id="viewPokemonTrainer" readonly disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Entrenador -->
<div class="modal fade" id="editTrainerModal" tabindex="-1" aria-labelledby="editTrainerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editTrainerModalLabel">Editar Entrenador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTrainerForm">
                    <div class="mb-3">
                        <label for="editTrainerName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editTrainerName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editTrainerRegion" class="form-label">Región</label>
                        <input type="text" class="form-control" id="editTrainerRegion" name="region">
                    </div>
                    <div class="mb-3">
                        <label for="editTrainerAge" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="editTrainerAge" name="edad" min="10" max="100">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalEditTrainerWarning">Ha ocurrido un error. El entrenador no ha sido actualizado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalEditTrainerButton">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Pokémon -->
<div class="modal fade" id="editPokemonModal" tabindex="-1" aria-labelledby="editPokemonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPokemonModalLabel">Editar Pokémon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPokemonForm">
                    <div class="mb-3">
                        <label for="editPokemonName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editPokemonName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editPokemonType" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="editPokemonType" name="tipo">
                    </div>
                    <div class="mb-3">
                        <label for="editPokemonLevel" class="form-label">Nivel</label>
                        <input type="number" class="form-control" id="editPokemonLevel" name="nivel" min="1" max="100">
                    </div>
                    <div class="mb-3">
                        <label for="editPokemonTrainer" class="form-label">Entrenador</label>
                        <select class="form-control" id="editPokemonTrainer" name="id_entrenador">
                        </select>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalEditPokemonWarning">Ha ocurrido un error. El pokémon no ha sido actualizado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalEditPokemonButton">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Entrenador -->
<div class="modal fade" id="deleteTrainerModal" tabindex="-1" aria-labelledby="deleteTrainerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteTrainerModalLabel">Eliminar Entrenador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteTrainerForm">
                    <div class="mb-3">
                        <p>¿Está seguro de que desea eliminar al entrenador?</p>
                        <div class="alert alert-warning">
                            <strong>Advertencia:</strong> Esta acción también eliminará todos los pokémon asociados a este entrenador.
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" id="deleteTrainerId" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="deleteTrainerName" readonly disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalDeleteTrainerWarning">Ha ocurrido un error. El entrenador no ha sido eliminado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="modalDeleteTrainerButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Pokémon -->
<div class="modal fade" id="deletePokemonModal" tabindex="-1" aria-labelledby="deletePokemonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePokemonModalLabel">Eliminar Pokémon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deletePokemonForm">
                    <div class="mb-3">
                        <p>¿Está seguro de que desea eliminar este pokémon?</p>
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" id="deletePokemonId" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="deletePokemonName" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="deletePokemonType" readonly disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalDeletePokemonWarning">Ha ocurrido un error. El pokémon no ha sido eliminado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="modalDeletePokemonButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>