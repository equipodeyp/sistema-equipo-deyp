





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de medicamentos</title>
    <link rel="stylesheet" href="style_registrar_nuevo_medicamento.css">
    <link href="https://googleapis.com" rel="stylesheet">
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

<!-- Barra lateral(Aside) -->
<aside id="sidebar">
    <!-- <nav>
        <ul>
            <li><a href="#inicio">Solicitar</a></li>
            <li><a href="#servicios">Registrar</a></li>
            <li><a href="#portafolio">Entrada</a></li>
            <li><a href="#nosotros">Salida</a></li>
            <li><a href="#contacto">Inventario</a></li>
            <li><a href="#contacto">Baja de inventario</a></li>
        </ul>
    </nav> -->
</aside>

<!-- Contenido de la página -->
<!-- <main class="main-wrapper">


</main> -->




<div class="container">
    <!-- Encabezado Principal -->
    <div class="main-header">
        <div class="header-titles">
            <h1>Registrar un nuevo medicamento</h1>
            <p></p>
        </div>
        <button id="btnOpenModal" class="btn btn-primary">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Registrar
        </button>
    </div>

<!-- Contenedor de la Tabla Responsiva -->
<div class="card table-container">
    <table id="productsTable">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre Genérico / Comercial</th>
                <th>Forma Farmacéutica</th>
                <th>Gramaje / Cont.</th>
                <th>Vía / Presentación</th>
                <th>Caducidad</th>
                <th class="actions-column">Acciones</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <!-- Filas generadas dinámicamente por JS -->
        </tbody>
    </table>
</div>
</div>

<!-- Capa de Fondo y Modal Animado -->
<div id="modalOverlay" class="modal-overlay">
    <div class="modal-card">
        <header class="modal-header">
            <h2 id="modalTitle">Registrar Producto</h2>
            <button id="btnCloseModal" class="close-button">&times;</button>
        </header>
        
        <form id="crudForm" autocomplete="off">
            <input type="hidden" id="productId" name="id">
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo" required placeholder="Ej. MED-1020">
                </div>

                <div class="form-group">
                    <label for="nombre_generico">Nombre Genérico</label>
                    <input type="text" id="nombre_generico" name="nombre_generico" required placeholder="Ej. Paracetamol">
                </div>

                <div class="form-group">
                    <label for="nombre_comercial">Nombre Comercial</label>
                    <input type="text" id="nombre_comercial" name="nombre_comercial" required placeholder="Ej. Tempra">
                </div>

                <div class="form-group">
                    <label for="forma_farmaceutica">Forma Farmacéutica</label>
                    <select id="forma_farmaceutica" name="forma_farmaceutica" required>
                        <option value="" disabled selected>Seleccione...</option>
                        <option value="Tableta">Tableta</option>
                        <option value="Cápsula">Cápsula</option>
                        <option value="Jarabe">Jarabe</option>
                        <option value="Inyectable">Inyectable</option>
                        <option value="Crema/Pomada">Crema / Pomada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gramaje">Gramaje</label>
                    <input type="text" id="gramaje" name="gramaje" required placeholder="Ej. 500 mg">
                </div>

                <div class="form-group">
                    <label for="contenido">Contenido (Solo números)</label>
                    <input type="text" id="contenido" name="contenido" pattern="[0-9]+" required placeholder="Ej. 20">
                </div>

                <div class="form-group">
                    <label for="via_administracion">Vía de Administración</label>
                    <select id="via_administracion" name="via_administracion" required>
                        <option value="" disabled selected>Seleccione...</option>
                        <option value="Oral">Oral</option>
                        <option value="Intravenosa">Intravenosa</option>
                        <option value="Intramuscular">Intramuscular</option>
                        <option value="Tópica">Tópica</option>
                        <option value="Sublingual">Sublingual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="presentacion">Presentación</label>
                    <select id="presentacion" name="presentacion" required>
                        <option value="" disabled selected>Seleccione...</option>
                        <option value="Caja">Caja</option>
                        <option value="Frasco">Frasco</option>
                        <option value="Ampolleta">Ampolleta</option>
                        <option value="Tubo">Tubo</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label for="caducidad">Fecha de Caducidad</label>
                    <input type="date" id="caducidad" name="caducidad" required>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" id="btnSubmit" class="btn btn-primary btn-block">Registrar</button>
            </div>
        </form>
    </div>
</div>







<a href="./menu_gestion_medicamentos.php" class="btn-menu-principal">
  <svg class="icon-regresar" xmlns="http://w3.org" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <line x1="19" y1="12" x2="5" y2="12"></line>
    <polyline points="12 19 5 12 12 5"></polyline>
  </svg>
  <span class="btn-texto">Menú Gestión de Medicamentos</span>
</a>



<script src="registrar_nuevo_medicamento.js"></script>

</body>
</html>
