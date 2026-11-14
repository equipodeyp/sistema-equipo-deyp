document.addEventListener('DOMContentLoaded', () => {
    // Selectores del DOM
    const btnOpenModal = document.getElementById('btnOpenModal');
    const btnCloseModal = document.getElementById('btnCloseModal');
    const modalOverlay = document.getElementById('modalOverlay');
    const crudForm = document.getElementById('crudForm');
    const tableBody = document.getElementById('tableBody');
    const modalTitle = document.getElementById('modalTitle');
    const btnSubmit = document.getElementById('btnSubmit');
    const productIdInput = document.getElementById('productId');

    // Inicialización
    loadProducts();

    // Eventos del Modal
    btnOpenModal.addEventListener('click', () => openModal());
    btnCloseModal.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', (e) => {
        if(e.target === modalOverlay) closeModal();
    });

    // Validar entrada estrictamente numérica para el campo 'contenido'
    document.getElementById('contenido').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Control de Apertura de Ventana Emergente
    function openModal(prodData = null) {
        if (prodData) {
            modalTitle.textContent = 'Editar Producto';
            btnSubmit.textContent = 'Guardar Cambios';
            // Poblar el formulario
            productIdInput.value = prodData.id;
            document.getElementById('codigo').value = prodData.codigo;
            document.getElementById('nombre_generico').value = prodData.nombre_generico;
            document.getElementById('nombre_comercial').value = prodData.nombre_comercial;
            document.getElementById('forma_farmaceutica').value = prodData.forma_farmaceutica;
            document.getElementById('gramaje').value = prodData.gramaje;
            document.getElementById('contenido').value = prodData.contenido;
            document.getElementById('via_administracion').value = prodData.via_administracion;
            document.getElementById('presentacion').value = prodData.presentacion;
            document.getElementById('caducidad').value = prodData.caducidad;
        } else {
            modalTitle.textContent = 'Registrar Producto';
            btnSubmit.textContent = 'Registrar';
            crudForm.reset();
            productIdInput.value = '';
        }
        modalOverlay.add('active');
        modalOverlay.classList.add('active');
    }

    function closeModal() {
        modalOverlay.classList.remove('active');
    }

    // Petición Asíncrona: Leer Registros
    async function loadProducts() {
        try {
            const response = await fetch('crud.php?action=read');
            const data = await response.json();
            renderTable(data);
        } catch (error) {
            console.error('Error al cargar productos:', error);
        }
    }

    // Dibujar Filas de la Tabla con Micro-animación de entrada
    function renderTable(products) {
        tableBody.innerHTML = '';
        if (products.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="7" style="text-align: center; color: var(--text-muted);">Ningún producto en inventario</td></tr>`;
            return;
        }

        products.forEach((prod, index) => {
            const tr = document.createElement('tr');
            // Aplicar retraso escalonado sutil para la transición al cargar
            tr.style.animation = `fadeInUp 0.3s ease forwards ${index * 0.03}s`;
            tr.style.opacity = '0';
            
            tr.innerHTML = `
                <td style="font-weight:600; color: var(--primary);">${escapeHTML(prod.codigo)}</td>
                <td>
                    <div style="font-weight:500;">${escapeHTML(prod.nombre_generico)}</div>
                    <div style="font-size:0.8rem; color:var(--text-muted);">${escapeHTML(prod.nombre_comercial)}</div>
                </td>
                <td><span class="badge">${escapeHTML(prod.forma_farmaceutica)}</span></td>
                <td>${escapeHTML(prod.gramaje)} / <small style="color:var(--text-muted);">${prod.contenido} u.</small></td>
                <td>${escapeHTML(prod.via_administracion)} / <small style="color:var(--text-muted);">${escapeHTML(prod.presentacion)}</small></td>
                <td>${formatDate(prod.caducidad)}</td>
                <td>
                    <div class="actions-cell">
                        <button class="btn btn-sm btn-outline edit-btn">Editar</button>
                        <button class="btn btn-sm btn-danger-text delete-btn">Eliminar</button>
                    </div>
                </td>
            `;

            // Escuchar clics de acción
            tr.querySelector('.edit-btn').addEventListener('click', () => openModal(prod));
            tr.querySelector('.delete-btn').addEventListener('click', () => deleteProduct(prod.id));

            tableBody.appendChild(tr);
        });
    }

    // Petición Asíncrona: Registrar / Actualizar
    crudForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(crudForm);
        const plainData = Object.fromEntries(formData.entries());

        try {
            const response = await fetch('crud.php?action=save', {
                method: 'POST',
                headers: { 'Content-Type': application/json },
                body: JSON.stringify(plainData)
            });
            const result = await response.json();
            
            if (result.status === 'success') {
                closeModal();
                loadProducts();
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error('Error al guardar datos:', error);
        }
    });

    // Petición Asíncrona: Eliminar
    async function deleteProduct(id) {
        if (!confirm('¿Estás seguro de eliminar este producto de forma permanente?')) return;

        try {
            const response = await fetch('crud.php?action=delete', {
                method: 'POST',
                headers: { 'Content-Type': application/json },
                body: JSON.stringify({ id })
            });
            const result = await response.json();

            if (result.status === 'success') {
                loadProducts();
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error('Error al eliminar:', error);
        }
    }

    // Herramientas de formateo y seguridad
    function formatDate(dateString) {
        const parts = dateString.split('-');
        return `${parts[2]}/${parts[1]}/${parts[0]}`;
    }

    function escapeHTML(str) {
        return str.replace(/[&<>'"]/g, 
            tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag)
        );
    }
});

// Estilos de animación dinámicos agregados vía JS para mantener la separación
const styleSheet = document.createElement("style");
styleSheet.innerText = `
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .badge {
        background: #f1f5f9; padding: 0.25rem 0.5rem; border-radius: 6px; font-size: 0.8rem; font-weight: 500;
    }
`;
document.head.appendChild(styleSheet);


// Sidebar -  Aside

const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const body = document.body;

function toggleMenu() {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
    body.classList.toggle('sidebar-open');
}

// Eventos para abrir/cerrar
menuToggle.addEventListener('click', toggleMenu);
overlay.addEventListener('click', toggleMenu);

// Cerrar aside
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && sidebar.classList.contains('active')) {
        toggleMenu();
    }
});
