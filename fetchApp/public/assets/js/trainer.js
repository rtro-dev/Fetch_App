// Función para cargar entrenadores
function loadTrainers(page = 1) {
    fetch(`${url_base}/api/trainers?page=${page}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('trainersTableBody');
        tbody.innerHTML = '';
        data.data.forEach(trainer => {
            tbody.innerHTML += `
                <tr>
                    <td>${trainer.id}</td>
                    <td>${trainer.nombre}</td>
                    <td>${trainer.region}</td>
                    <td>${trainer.edad}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="viewTrainer(${trainer.id})" data-bs-toggle="modal" data-bs-target="#viewTrainerModal">Ver</button>
                        <button class="btn btn-sm btn-warning" onclick="editTrainer(${trainer.id})" data-bs-toggle="modal" data-bs-target="#editTrainerModal">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteTrainer(${trainer.id})" data-bs-toggle="modal" data-bs-target="#deleteTrainerModal">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        createPagination(data, 'trainersPagination', loadTrainers);
    })
    .catch(error => console.error('Error:', error));
}

// Función para ver un entrenador
function viewTrainer(id) {
    fetch(`${url_base}/api/trainers/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('viewTrainerId').value = data.id;
        document.getElementById('viewTrainerName').value = data.nombre;
        document.getElementById('viewTrainerRegion').value = data.region;
        document.getElementById('viewTrainerAge').value = data.edad;
    })
    .catch(error => console.error('Error:', error));
}

// Función para editar un entrenador
function editTrainer(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalEditTrainerWarning').style.display = 'none';
    
    fetch(`${url_base}/api/trainers/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editTrainerName').value = data.nombre;
        document.getElementById('editTrainerRegion').value = data.region;
        document.getElementById('editTrainerAge').value = data.edad;
        document.getElementById('modalEditTrainerButton').onclick = function() {
            updateTrainer(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditTrainerWarning').style.display = 'block';
    });
}

// Función para actualizar un entrenador
function updateTrainer(id) {
    const formData = new FormData(document.getElementById('editTrainerForm'));
    const data = Object.fromEntries(formData.entries());

    fetch(`${url_base}/api/trainers/${id}`, {
        method: 'PUT',
        headers: headers,
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la actualización fue exitosa
            document.getElementById('modalEditTrainerWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('editTrainerModal'));
            modal.hide();
            loadTrainers();
        } else {
            document.getElementById('modalEditTrainerWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditTrainerWarning').style.display = 'block';
    });
}

// Función para eliminar un entrenador
function deleteTrainer(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalDeleteTrainerWarning').style.display = 'none';
    
    fetch(`${url_base}/api/trainers/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('deleteTrainerId').value = data.id;
        document.getElementById('deleteTrainerName').value = data.nombre;
        document.getElementById('modalDeleteTrainerButton').onclick = function() {
            confirmDeleteTrainer(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeleteTrainerWarning').style.display = 'block';
    });
}

// Función para confirmar la eliminación de un entrenador
function confirmDeleteTrainer(id) {
    fetch(`${url_base}/api/trainers/${id}`, {
        method: 'DELETE',
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la eliminación fue exitosa
            document.getElementById('modalDeleteTrainerWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('deleteTrainerModal'));
            modal.hide();
            loadTrainers();
        } else {
            document.getElementById('modalDeleteTrainerWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeleteTrainerWarning').style.display = 'block';
    });
}

// Función para configurar el botón de crear entrenador
document.getElementById('modalCreateTrainerButton').addEventListener('click', createTrainer);

// Función para crear un entrenador
function createTrainer() {
    // Ocultar mensaje de error al intentar crear
    document.getElementById('modalCreateTrainerWarning').style.display = 'none';
    
    const formData = new FormData(document.getElementById('createTrainerForm'));
    const data = Object.fromEntries(formData.entries());

    fetch(`${url_base}/api/trainers`, {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Limpiar el formulario
            document.getElementById('createTrainerForm').reset();
            
            // Ocultar mensaje de error y cerrar modal si la creación fue exitosa
            document.getElementById('modalCreateTrainerWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('createTrainerModal'));
            modal.hide();
            
            // Recargar la lista de entrenadores
            loadTrainers();
        } else {
            document.getElementById('modalCreateTrainerWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalCreateTrainerWarning').style.display = 'block';
    });
}