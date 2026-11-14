<?php
// Simulación de sesión de usuario en un entorno corporativo
$usuario_nombre = "Dr. Alejandro Mendoza";
$usuario_rol = "Administrador Médico";
$usuario_foto = "https://unsplash.com"; // Foto profesional simétrica
$logotipo_url = "https://flaticon.com"; // Icono médico corporativo abstracto
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPPSIPPED - Panel Corporativo</title>
    <link rel="stylesheet" href="styles_menu.css">
    <!-- Iconos limpios de ejemplo via FontAwesome o similar si fuera necesario, usando carácteres limpios nativos por ahora -->
</head>
<body>

    <!-- Contenedor Principal (Dashboard Layout) -->
    <div class="dashboard-grid">
        
        <!-- ASIDE: Barra Lateral de Navegación Izquierda -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="<?php echo $logotipo_url; ?>" alt="Logo SIPPSIPPED" class="logo">
                <h1>SIPPSIPPED</h1>
            </div>

            <!-- Bloque de Usuario -->
            <div class="user-profile">
                <img src="<?php echo $usuario_foto; ?>" alt="Foto de <?php echo $usuario_nombre; ?>" class="user-avatar">
                <div class="user-info">
                    <span class="user-name"><?php echo $usuario_nombre; ?></span>
                    <span class="user-role"><?php echo $usuario_rol; ?></span>
                </div>
            </div>

            <!-- NAV: Menú de navegación vertical -->
            <nav class="sidebar-nav">
                <ul class="menu-list">
                    
                    <!-- Item 1: Asistencias Médicas -->
                    <li class="menu-item has-submenu">
                        <button class="menu-link">
                            <span class="menu-icon">🩺</span> Asistencias médicas <span class="arrow">▼</span>
                        </button>
                        <ul class="submenu">
                            <li><a href="?page=asistencias-registrar">Registrar</a></li>
                            <li><a href="?page=asistencias-calendario">Calendario</a></li>
                            <li><a href="?page=asistencias-detalles">Detalles</a></li>
                        </ul>
                    </li>

                    <!-- Item 2: Expedientes -->
                    <li class="menu-item has-submenu">
                        <button class="menu-link">
                            <span class="menu-icon">📁</span> Expedientes <span class="arrow">▼</span>
                        </button>
                        <ul class="submenu">
                            <li><a href="?page=expedientes-concluidos">Concluidos</a></li>
                            <li><a href="?page=expedientes-vigentes">Vigentes</a></li>
                        </ul>
                    </li>

                    <!-- Item 3: Incidencias -->
                    <li class="menu-item has-submenu">
                        <button class="menu-link">
                            <span class="menu-icon">⚠️</span> Incidencias <span class="arrow">▼</span>
                        </button>
                        <ul class="submenu">
                            <li><a href="?page=incidencias-registrar">Registrar</a></li>
                            <li><a href="?page=incidencias-consultar">Consultar</a></li>
                        </ul>
                    </li>

                    <!-- Item 4: Traslados con Sub-submenú -->
                    <li class="menu-item has-submenu">
                        <button class="menu-link">
                            <span class="menu-icon">🚑</span> Traslados <span class="arrow">▼</span>
                        </button>
                        <ul class="submenu">
                            <li><a href="?page=traslados-registrar">Registrar</a></li>
                            <li class="has-inner-submenu">
                                <button class="inner-menu-link">Consultar <span class="arrow">▶️</span></button>
                                <ul class="inner-submenu">
                                    <li><a href="?page=traslados-detalle">Detalle</a></li>
                                    <li><a href="?page=traslados-buscar">Buscar</a></li>
                                    <li><a href="?page=traslados-actualizar">Actualizar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Item 5: Bases de datos -->
                    <li class="menu-item">
                        <a href="?page=bases-datos" class="menu-link single-link">
                            <span class="menu-icon">🗄️</span> Bases de datos
                        </a>
                    </li>

                    <!-- Item 6: Reportes -->
                    <li class="menu-item">
                        <a href="?page=reportes" class="menu-link single-link">
                            <span class="menu-icon">📊</span> Reportes
                        </a>
                    </li>

                    <!-- Item 7: Glosario -->
                    <li class="menu-item">
                        <a href="?page=glosario" class="menu-link single-link">
                            <span class="menu-icon">📖</span> Glosario
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Botón Cerrar Sesión Destacado y Visual en la Base -->
            <div class="sidebar-footer">
                <a href="logout.php" class="logout-btn">
                    <span class="logout-icon">🚪</span> Cerrar sesión
                </a>
            </div>
        </aside>

        <!-- Contenedor Derecho Completo (Header + Main + Footer) -->
        <div class="main-wrapper">
            
            <!-- HEADER: Barra de Control Superior -->
            <header class="main-header">
                <button class="toggle-sidebar-btn" id="toggleSidebar" aria-label="Abrir menú">
                    ☰
                </button>
                <div class="header-title-area">
                    <h2>Panel de Control Global</h2>
                    <p class="date-badge"><?php echo date('d M Y'); ?></p>
                </div>
                <div class="header-actions">
                    <span class="status-indicator online">Estable</span>
                </div>
            </header>

            <!-- SECTION: Área de Contenido Principal -->
            <section class="content-container">
                
                <!-- ARTICLE: Tarjeta o Bloque Informativo -->
                <article class="content-card">
                    <div class="card-header">
                        <h3>Bienvenido al Entorno Corporativo</h3>
                        <span class="badge">Módulo Activo</span>
                    </div>
                    
                    <div class="card-body">
                        <p>Selecciona una opción del menú interactivo de la izquierda para comenzar a gestionar los servicios del ecosistema <strong>SIPPSIPPED</strong>.</p>
                        
                        <div class="placeholder-grid">
                            <div class="metrics-box">
                                <h4>Asistencias Hoy</h4>
                                <p class="metric-value">24</p>
                            </div>
                            <div class="metrics-box">
                                <h4>Traslados Activos</h4>
                                <p class="metric-value">5</p>
                            </div>
                            <div class="metrics-box">
                                <h4>Incidencias Críticas</h4>
                                <p class="metric-value" style="color: var(--corporate-danger);">0</p>
                            </div>
                        </div>
                    </div>
                </article>

            </section>

            <!-- FOOTER: Pie de página Institucional -->
            <footer class="main-footer">
                <p>&copy; <?php echo date('Y'); ?> <strong>SIPPSIPPED Inc.</strong> Todos los derechos reservados. Edición Profesional LATAM.</p>
                <p class="version-tag">v2.4.0-Stable</p>
            </footer>

        </div>
    </div>

<!-- Carga del archivo JavaScript -->
<script src="app.js">

document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Manejo de Submenús Desplegables Verticales (Acordeón)
    const menuLinksWithSubmenu = document.querySelectorAll('.has-submenu > .menu-link');

    menuLinksWithSubmenu.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const currentItem = link.parentElement;
            
            // Cerrar otros menús si se desea comportamiento estricto de acordeón (opcional)
            document.querySelectorAll('.has-submenu').forEach(item => {
                if (item !== currentItem) {
                    item.classList.remove('active');
                }
            });

            // Conmutar el menú actual
            currentItem.classList.toggle('active');
        });
    });

    // 2. Manejo de sub-submenú interno (Sección Traslados -> Consultar)
    const innerMenuLink = document.querySelector('.inner-menu-link');
    if (innerMenuLink) {
        innerMenuLink.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation(); // Evita que cierre el menú padre
            const innerItem = innerMenuLink.parentElement;
            innerItem.classList.toggle('open');
        });
    });

    // 3. Menú Responsivo (Abrir/Cerrar Sidebar en Dispositivos Móviles)
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            sidebar.classList.toggle('open');
        });

        // Cerrar el sidebar si el usuario hace clic fuera de él en pantallas móviles
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 1024) {
                if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                    sidebar.classList.remove('open');
                }
            }
        });
    }
});


</script>

</body>
</html>

