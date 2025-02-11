export default class PokemonManager {
    constructor(baseUrl, csrfToken) {
        this.baseUrl = baseUrl;
        this.csrfToken = csrfToken;
        this.headers = {
            'Content-Type': 'application/json',
            'X-CSRF-Token': this.csrfToken,
            'Accept': 'application/json'
        };
    }

    init() {
        this.initTrainerEvents();
        this.initPokemonEvents();
        this.loadTrainers();
    }

    // Métodos para Trainers
    loadTrainers() {
        fetch(`${this.baseUrl}/trainers`, {
            method: 'GET',
            headers: this.headers
        })
        .then(response => response.json())
        .then(data => this.displayTrainers(data))
        .catch(error => console.error('Error:', error));
    }

    createTrainer(data) {
        fetch(`${this.baseUrl}/trainers`, {
            method: 'POST',
            headers: this.headers,
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            this.loadTrainers();
            document.getElementById('createTrainerModal').hide();
            this.showAlert('Entrenador creado exitosamente', 'success');
        })
        .catch(error => this.showAlert('Error al crear entrenador', 'danger'));
    }

    updateTrainer(id, data) {
        fetch(`${this.baseUrl}/trainers/${id}`, {
            method: 'PUT',
            headers: this.headers,
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            this.loadTrainers();
            document.getElementById('editTrainerModal').hide();
            this.showAlert('Entrenador actualizado exitosamente', 'success');
        })
        .catch(error => this.showAlert('Error al actualizar entrenador', 'danger'));
    }

    deleteTrainer(id) {
        if (confirm('¿Estás seguro de eliminar este entrenador?')) {
            fetch(`${this.baseUrl}/trainers/${id}`, {
                method: 'DELETE',
                headers: this.headers
            })
            .then(response => response.json())
            .then(data => {
                this.loadTrainers();
                this.showAlert('Entrenador eliminado exitosamente', 'success');
            })
            .catch(error => this.showAlert('Error al eliminar entrenador', 'danger'));
        }
    }

    // Métodos para Pokemon
    loadPokemon(filters = {}) {
        let url = `${this.baseUrl}/pokemon`;
        if (Object.keys(filters).length > 0) {
            url += '?' + new URLSearchParams(filters).toString();
        }

        fetch(url, {
            method: 'GET',
            headers: this.headers
        })
        .then(response => response.json())
        .then(data => this.displayPokemon(data))
        .catch(error => console.error('Error:', error));
    }

    createPokemon(data) {
        fetch(`${this.baseUrl}/pokemon`, {
            method: 'POST',
            headers: this.headers,
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            this.loadPokemon();
            document.getElementById('createPokemonModal').hide();
            this.showAlert('Pokemon creado exitosamente', 'success');
        })
        .catch(error => this.showAlert('Error al crear pokemon', 'danger'));
    }

    updatePokemon(id, data) {
        fetch(`${this.baseUrl}/pokemon/${id}`, {
            method: 'PUT',
            headers: this.headers,
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            this.loadPokemon();
            document.getElementById('editPokemonModal').hide();
            this.showAlert('Pokemon actualizado exitosamente', 'success');
        })
        .catch(error => this.showAlert('Error al actualizar pokemon', 'danger'));
    }

    deletePokemon(id) {
        if (confirm('¿Estás seguro de eliminar este pokemon?')) {
            fetch(`${this.baseUrl}/pokemon/${id}`, {
                method: 'DELETE',
                headers: this.headers
            })
            .then(response => response.json())
            .then(data => {
                this.loadPokemon();
                this.showAlert('Pokemon eliminado exitosamente', 'success');
            })
            .catch(error => this.showAlert('Error al eliminar pokemon', 'danger'));
        }
    }

    // Métodos auxiliares
    showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        document.querySelector('.alert-container').appendChild(alertDiv);
        setTimeout(() => alertDiv.remove(), 3000);
    }

    initTrainerEvents() {
        // Implementar eventos para los botones y formularios de entrenadores
        document.getElementById('createTrainerForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            this.createTrainer(Object.fromEntries(formData));
        });
    }

    initPokemonEvents() {
        // Implementar eventos para los botones y formularios de pokemon
        document.getElementById('createPokemonForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            this.createPokemon(Object.fromEntries(formData));
        });

        // Filtros de pokemon
        document.getElementById('pokemonFilters').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            this.loadPokemon(Object.fromEntries(formData));
        });
    }
}