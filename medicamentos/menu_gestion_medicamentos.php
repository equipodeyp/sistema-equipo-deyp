<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de medicamentos</title>
    <link rel="stylesheet" href="style_med.css">

</head>
<body class="">

<!-- Capa para cerrar menú al dar clic fuera -->
<div class="overlay" id="overlay"></div>

<!-- Encabezado / Navbar -->
<header>
    <button class="menu-btn" id="menuToggle" aria-label="Abrir menú">
        &#9776; <!-- Icono de hamburguesa -->
    </button>
    <div class="logo">
        <img class="header-img-sippsipped" src="../image/ups2.png">
        <img class="header-img-fiscalia" src="../image/fiscalia.png">
        
        
    </div>
    <div class="user-status">
        <!-- <?php 
            // Ejemplo simple de lógica dinámica con PHP
            $usuario = "Invitado";
            echo "Hola, " . htmlspecialchars($usuario);
        ?> -->
       
        <!-- <img src="../image/fiscalia.png">  -->
    </div>
</header>

<!-- Barra lateral interactiva (Aside) -->
<aside id="sidebar">
    <!-- <nav>
        <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#portafolio">Portafolio</a></li>
            <li><a href="#nosotros">Nosotros</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
    </nav> -->
</aside>

<!-- Contenido de la página -->
<main class="main-wrapper">
    <section class="hero">
        <!-- <h3>Bienvenido a nuestra plataforma</h3> -->
        <!-- <img style="display: block; margin: 0 auto;" src="../image/ups3.png"> -->
        <!-- <img style="display: block; margin: 0 auto;" src="../image/ups3.png"> -->
        <!-- <p>Diseño web de última generación completamente adaptado a dispositivos móviles, tablets y ordenadores.</p> -->
        <h3>Bienvenido a nuestra plataforma</h3>
        <img style="display: block; margin: 0 auto;" src="../image/ups3.png">
        <!-- <p>Diseño web de última generación completamente adaptado a dispositivos móviles, tablets y ordenadores.</p> -->
    </section>




    <!-- <section class="content-grid">
        <div class="card">
            <h3><?php echo "Sección Dinámica A"; ?></h3>
            <p>Esta tarjeta se adapta automáticamente al ancho de la pantalla gracias a CSS Grid nativo.</p>
        </div>
        <div class="card">
            <h3>Sección B</h3>
            <p>El menú lateral se desliza de forma fluida utilizando transformaciones de CSS aceleradas por hardware.</p>
        </div>
        <div class="card">
            <h3>Sección C</h3>
            <p>Contenido procesado en el servidor mediante PHP, ideal para proyectos escalables y robustos.</p>
        </div>
    </section> -->


    <div>

            <div>
                <!-- Componente del Título -->
                <div class="header-panel">
                    <!-- <span class="panel-tag">Menú</span> -->
                    <h1 class="panel-title">Gestión de Medicamentos</h1>
                </div>
            </div>

            <div class="menu-grid">
                <?php

                $botones = [
                    ['texto' => 'Solicitar', 'imagen' => '../image/gestion_medicamentos/solicitar.png', 'accion' => 'solicitar.php'],
                    ['texto' => 'Registrar', 'imagen' => '../image/gestion_medicamentos/alta.png', 'accion' => 'registrar_nuevo_medicamento.php'],
                    ['texto' => 'Entrada', 'imagen' => '../image/gestion_medicamentos/entrada.png', 'accion' => 'entrada.php'],
                    ['texto' => 'Salida', 'imagen' => '../image/gestion_medicamentos/salida.png', 'accion' => 'salida.php'],
                    ['texto' => 'Consultar', 'imagen' => '../image/gestion_medicamentos/consultar.png', 'accion' => 'consultar.php'],
                    ['texto' => 'Inventario', 'imagen' => '../image/gestion_medicamentos/inventario.png', 'accion' => 'inventario.php'],
                    ['texto' => 'Baja de inventario', 'imagen' => '../image/gestion_medicamentos/baja.jpg', 'accion' => 'baja.php']
                ];

                foreach ($botones as $boton) {
                    echo '<button class="menu-item" data-url="' . $boton['accion'] . '">';
                    echo '    <img src="' . $boton['imagen'] . '" alt="' . $boton['texto'] . '">';
                    echo '    <span>' . $boton['texto'] . '</span>';
                    echo '</button>';
                }
                ?>
            </div>
    </div>

</main>



<!-- Aside -->
<script>
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
</script>



<script type="text/javascript">


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

</script>



</body>
</html>
