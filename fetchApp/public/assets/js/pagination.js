// Función para crear la paginación
function createPagination(data, containerId, loadFunction) {
    const container = document.getElementById(containerId);
    container.innerHTML = '';
    
    if (data.last_page > 1) {
        const nav = document.createElement('nav');
        const ul = document.createElement('ul');
        ul.className = 'pagination';

        // Botón Previous
        if (data.current_page > 1) {
            const prevLi = document.createElement('li');
            prevLi.className = 'page-item';
            prevLi.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
            prevLi.onclick = () => loadFunction(data.current_page - 1);
            ul.appendChild(prevLi);
        }

        // Primera página siempre visible si no estamos en ella
        if (data.current_page > 3) {
            const firstLi = document.createElement('li');
            firstLi.className = 'page-item';
            firstLi.innerHTML = `<a class="page-link" href="#">1</a>`;
            firstLi.onclick = () => loadFunction(1);
            ul.appendChild(firstLi);

            if (data.current_page > 4) {
                const dotLi = document.createElement('li');
                dotLi.className = 'page-item disabled';
                dotLi.innerHTML = `<span class="page-link">...</span>`;
                ul.appendChild(dotLi);
            }
        }

        // Páginas cercanas a la actual
        for (let i = Math.max(1, data.current_page - 2); 
            i <= Math.min(data.last_page, data.current_page + 2); i++) {
            const li = document.createElement('li');
            li.className = `page-item ${i === data.current_page ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.onclick = () => loadFunction(i);
            ul.appendChild(li);
        }

        // Última página siempre visible si no estamos en ella
        if (data.current_page < data.last_page - 2) {
            if (data.current_page < data.last_page - 3) {
                const dotLi = document.createElement('li');
                dotLi.className = 'page-item disabled';
                dotLi.innerHTML = `<span class="page-link">...</span>`;
                ul.appendChild(dotLi);
            }

            const lastLi = document.createElement('li');
            lastLi.className = 'page-item';
            lastLi.innerHTML = `<a class="page-link" href="#">${data.last_page}</a>`;
            lastLi.onclick = () => loadFunction(data.last_page);
            ul.appendChild(lastLi);
        }

        // Botón Next
        if (data.current_page < data.last_page) {
            const nextLi = document.createElement('li');
            nextLi.className = 'page-item';
            nextLi.innerHTML = `<a class="page-link" href="#">Siguiente</a>`;
            nextLi.onclick = () => loadFunction(data.current_page + 1);
            ul.appendChild(nextLi);
        }

        nav.appendChild(ul);
        container.appendChild(nav);
    }
}