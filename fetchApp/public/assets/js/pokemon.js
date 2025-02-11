// Función para cargar pokémon
function loadPokemon(page = 1) {
    fetch(`${url_base}/api/pokemon?page=${page}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('pokemonTableBody');
        tbody.innerHTML = '';
        data.data.forEach(pokemon => {
            tbody.innerHTML += `
                <tr>
                    <td>${pokemon.id}</td>
                    <td>${pokemon.nombre}</td>
                    <td>${pokemon.tipo}</td>
                    <td>${pokemon.nivel}</td>
                    <td>${pokemon.id_entrenador}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="viewPokemon(${pokemon.id})" data-bs-toggle="modal" data-bs-target="#viewPokemonModal">Ver</button>
                        <button class="btn btn-sm btn-warning" onclick="editPokemon(${pokemon.id})" data-bs-toggle="modal" data-bs-target="#editPokemonModal">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deletePokemon(${pokemon.id})" data-bs-toggle="modal" data-bs-target="#deletePokemonModal">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        createPagination(data, 'pokemonPagination', loadPokemon);
    })
    .catch(error => console.error('Error:', error));
}

// Función para ver un Pokémon
function viewPokemon(id) {
    fetch(`${url_base}/api/pokemon/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('viewPokemonId').value = data.id;
        document.getElementById('viewPokemonName').value = data.nombre;
        document.getElementById('viewPokemonType').value = data.tipo;
        document.getElementById('viewPokemonLevel').value = data.nivel;
        document.getElementById('viewPokemonTrainer').value = data.id_entrenador;
    })
    .catch(error => console.error('Error:', error));
}

// Función para editar un Pokémon
function editPokemon(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalEditPokemonWarning').style.display = 'none';
    
    fetch(`${url_base}/api/pokemon/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editPokemonName').value = data.nombre;
        document.getElementById('editPokemonType').value = data.tipo;
        document.getElementById('editPokemonLevel').value = data.nivel;
        document.getElementById('editPokemonTrainer').value = data.id_entrenador;
        document.getElementById('modalEditPokemonButton').onclick = function() {
            updatePokemon(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditPokemonWarning').style.display = 'block';
    });
}

// Función para actualizar un Pokémon
function updatePokemon(id) {
    const formData = new FormData(document.getElementById('editPokemonForm'));
    const data = Object.fromEntries(formData.entries());

    fetch(`${url_base}/api/pokemon/${id}`, {
        method: 'PUT',
        headers: headers,
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la actualización fue exitosa
            document.getElementById('modalEditPokemonWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('editPokemonModal'));
            modal.hide();
            loadPokemon();
        } else {
            document.getElementById('modalEditPokemonWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditPokemonWarning').style.display = 'block';
    });
}

// Función para eliminar un Pokémon
function deletePokemon(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalDeletePokemonWarning').style.display = 'none';
    
    fetch(`${url_base}/api/pokemon/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('deletePokemonId').value = data.id;
        document.getElementById('deletePokemonName').value = data.nombre;
        document.getElementById('deletePokemonType').value = data.tipo;
        document.getElementById('modalDeletePokemonButton').onclick = function() {
            confirmDeletePokemon(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeletePokemonWarning').style.display = 'block';
    });
}

// Función para confirmar la eliminación de un Pokémon
function confirmDeletePokemon(id) {
    fetch(`${url_base}/api/pokemon/${id}`, {
        method: 'DELETE',
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la eliminación fue exitosa
            document.getElementById('modalDeletePokemonWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('deletePokemonModal'));
            modal.hide();
            loadPokemon();
        } else {
            document.getElementById('modalDeletePokemonWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeletePokemonWarning').style.display = 'block';
    });
}

// Función para cargar entrenadores en el select
function loadTrainersSelect() {
    fetch(`${url_base}/api/trainers`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        const createSelect = document.getElementById('createPokemonTrainer');
        const editSelect = document.getElementById('editPokemonTrainer');
        
        // Limpiar opciones existentes
        createSelect.innerHTML = '<option value="">Seleccione un entrenador</option>';
        editSelect.innerHTML = '<option value="">Seleccione un entrenador</option>';
        
        // Agregar nuevas opciones
        data.data.forEach(trainer => {
            createSelect.innerHTML += `<option value="${trainer.id}">${trainer.nombre}</option>`;
            editSelect.innerHTML += `<option value="${trainer.id}">${trainer.nombre}</option>`;
        });
    })
    .catch(error => console.error('Error:', error));
}

// Función para configurar el botón de crear pokémon
document.getElementById('modalCreatePokemonButton').addEventListener('click', createPokemon);

// Función para crear un pokémon
function createPokemon() {
    // Ocultar mensaje de error al intentar crear
    document.getElementById('modalCreatePokemonWarning').style.display = 'none';
    
    const formData = new FormData(document.getElementById('createPokemonForm'));
    const data = Object.fromEntries(formData.entries());

    fetch(`${url_base}/api/pokemon`, {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Limpiar el formulario
            document.getElementById('createPokemonForm').reset();
            
            // Ocultar mensaje de error y cerrar modal si la creación fue exitosa
            document.getElementById('modalCreatePokemonWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('createPokemonModal'));
            modal.hide();
            
            // Recargar la lista de pokémon
            loadPokemon();
        } else {
            document.getElementById('modalCreatePokemonWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalCreatePokemonWarning').style.display = 'block';
    });
}

// Cargar los entrenadores en el select cuando se abre el modal de crear pokémon
document.getElementById('createPokemonBtn').addEventListener('click', loadTrainersSelect);