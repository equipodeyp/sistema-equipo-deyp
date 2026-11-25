// Sidebar

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






document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.menu-item');

    botones.forEach(boton => {
        boton.addEventListener('click', () => {
            const urlDestino = boton.getAttribute('data-url');
            
            if (urlDestino) {
                // Redirige a una opción dl menú
                window.location.href = urlDestino;
            } else {
                console.error('No se definió una ruta para este botón.');
            }
        });
    });
});


