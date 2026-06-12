document.getElementById("btnDescargar").addEventListener("click", async function() {
    // Crear un nuevo libro de trabajo con ExcelJS
    const workbook = new ExcelJS.Workbook();

    // Configuración de las tablas: ID en HTML y Nombre de la pestaña en Excel
    const configs = [
        { id: "tabla1", nombreHoja: "ASISTENCIAS MEDICAS" },
        { id: "tabla2", nombreHoja: "TRASLADOS" },
        { id: "tabla3", nombreHoja: "LLAMADAS Y VIDEOLLAMADAS" },
        { id: "tabla4", nombreHoja: "RONDINES" }
    ];
    configs.forEach(config => {
            const tableElement = document.getElementById(config.id);

            if (tableElement) {
                const worksheet = workbook.addWorksheet(config.nombreHoja);
                const filasHTML = tableElement.querySelectorAll("tr");

                filasHTML.forEach((filaHTML, indiceFila) => {
                    const celdasHTML = filaHTML.querySelectorAll("th, td");
                    const valoresFila = [];

                    celdasHTML.forEach(celda => {
                        const textoCelda = celda.innerText.trim();

                        if (indiceFila > 0 && textoCelda !== "" && !isNaN(textoCelda)) {
                            valoresFila.push(Number(textoCelda));
                        } else {
                            valoresFila.push(textoCelda);
                        }
                    });

                    const nuevaFila = worksheet.addRow(valoresFila);

                    if (indiceFila === 0) {
                        nuevaFila.eachCell((celda) => {
                            celda.fill = {
                                type: 'pattern',
                                pattern: 'solid',
                                fgColor: { argb: 'FFD3D3D3' }
                            };
                            celda.font = {
                                bold: true,
                                color: { argb: 'FF000000' }
                            };
                            celda.border = {
                                top: { style: 'thin' },
                                left: { style: 'thin' },
                                bottom: { style: 'thin' },
                                right: { style: 'thin' }
                            };
                        });
                    }
                });

                // CORRECCIÓN: Algoritmo avanzado para autoajustar columnas al contenido más largo
                // CORRECCIÓN: Ajuste preciso por columna
           worksheet.columns.forEach((column, index) => {
               let maxLongitud = 0;

               column.eachCell({ includeEmpty: true }, cell => {
                   if (cell.value !== null && cell.value !== undefined) {
                       const textoCelda = cell.value.toString();
                       const lineas = textoCelda.split('\n');
                       lineas.forEach(linea => {
                           if (linea.length > maxLongitud) {
                               maxLongitud = linea.length;
                           }
                       });
                   }
               });

               // Si es la primera columna (index === 0, columna "No."), no le ponemos mínimo de 12
               if (index === 0) {
                   column.width = maxLongitud + 3; // Tamaño justo al contenido
               } else {
                   // Para el resto de las columnas mantenemos el colchón de seguridad
                   column.width = maxLongitud < 12 ? 12 : maxLongitud + 4;
               }
           });
            }
        });

        const buffer = await workbook.xlsx.writeBuffer();
        saveAs(new Blob([buffer]), "BD_SEMANAL.xlsx");
    });


/////////////////////////////////////////////////



document.addEventListener("DOMContentLoaded", function() {
    const filasPorPagina = 10; // Muestra 10 registros por página
    const tabla = document.getElementById("tabla1");
    const contenedorBotones = document.getElementById("paginacion-botones");
    const contenedorInfo = document.getElementById("paginacion-info");

    if (!tabla || !contenedorBotones || !contenedorInfo) return;

    const filas = Array.from(tabla.querySelectorAll("tbody tr"));
    const totalFilas = filas.length;
    const totalPaginas = Math.ceil(totalFilas / filasPorPagina);
    let paginaActual = 1;

    if (totalFilas === 0) {
        contenedorInfo.innerText = "Mostrando 0 a 0 de 0 registros";
        return;
    }

    function renderizarPaginacion() {
        // 1. Mostrar/Ocultar las filas correspondientes en la tabla
        const indiceInicio = (paginaActual - 1) * filasPorPagina;
        const indiceFin = Math.min(indiceInicio + filasPorPagina, totalFilas);

        filas.forEach((fila, indice) => {
            fila.style.display = (indice >= indiceInicio && indice < indiceFin) ? "" : "none";
        });

        // 2. Actualizar el texto informativo (Izquierda)
        contenedorInfo.innerText = `Mostrando ${indiceInicio + 1} a ${indiceFin} de ${totalFilas} registros`;

        // 3. Limpiar los botones anteriores para redibujarlos (Derecha)
        contenedorBotones.innerHTML = "";

        // Botón: Primero
        const btnPrimero = document.createElement("button");
        btnPrimero.innerText = "Primero";
        btnPrimero.disabled = (paginaActual === 1);
        btnPrimero.onclick = () => { paginaActual = 1; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnPrimero);

        // Botón: Anterior
        const btnAnterior = document.createElement("button");
        btnAnterior.innerText = "Anterior";
        btnAnterior.disabled = (paginaActual === 1);
        btnAnterior.onclick = () => { paginaActual--; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnAnterior);

        // --- LÓGICA PARA LIMITAR A MÁXIMO 3 PÁGINAS ---
        let paginaInicio = Math.max(1, paginaActual - 1);
        let paginaFin = Math.min(totalPaginas, paginaInicio + 2);

        // Ajustar el inicio si estamos en las últimas páginas para que siempre muestre 3 números si existen
        if (paginaFin - paginaInicio < 2) {
            paginaInicio = Math.max(1, paginaFin - 2);
        }

        // Generar únicamente los números del rango calculado
        for (let i = paginaInicio; i <= paginaFin; i++) {
            const btnNum = document.createElement("button");
            btnNum.innerText = i;
            btnNum.classList.add("pagina-num");
            if (i === paginaActual) btnNum.classList.add("activa");

            btnNum.onclick = () => { paginaActual = i; renderizarPaginacion(); };
            contenedorBotones.appendChild(btnNum);
        }
        // ------------------------------------------------

        // Botón: Siguiente
        const btnSiguiente = document.createElement("button");
        btnSiguiente.innerText = "Siguiente";
        btnSiguiente.disabled = (paginaActual === totalPaginas);
        btnSiguiente.onclick = () => { paginaActual++; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnSiguiente);

        // Botón: Último
        const btnUltimo = document.createElement("button");
        btnUltimo.innerText = "Último";
        btnUltimo.disabled = (paginaActual === totalPaginas);
        btnUltimo.onclick = () => { paginaActual = totalPaginas; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnUltimo);
    }

    // Ejecutar la paginación inicial
    renderizarPaginacion();
});


/////////////////////////////////////////////////



document.addEventListener("DOMContentLoaded", function() {
    const filasPorPagina = 10; // Muestra 10 registros por página
    const tabla = document.getElementById("tabla2");
    const contenedorBotones = document.getElementById("paginacion-botones2");
    const contenedorInfo = document.getElementById("paginacion-info2");

    if (!tabla || !contenedorBotones || !contenedorInfo) return;

    const filas = Array.from(tabla.querySelectorAll("tbody tr"));
    const totalFilas = filas.length;
    const totalPaginas = Math.ceil(totalFilas / filasPorPagina);
    let paginaActual = 1;

    if (totalFilas === 0) {
        contenedorInfo.innerText = "Mostrando 0 a 0 de 0 registros";
        return;
    }

    function renderizarPaginacion() {
        // 1. Mostrar/Ocultar las filas correspondientes en la tabla
        const indiceInicio = (paginaActual - 1) * filasPorPagina;
        const indiceFin = Math.min(indiceInicio + filasPorPagina, totalFilas);

        filas.forEach((fila, indice) => {
            fila.style.display = (indice >= indiceInicio && indice < indiceFin) ? "" : "none";
        });

        // 2. Actualizar el texto informativo (Izquierda)
        contenedorInfo.innerText = `Mostrando ${indiceInicio + 1} a ${indiceFin} de ${totalFilas} registros`;

        // 3. Limpiar los botones anteriores para redibujarlos (Derecha)
        contenedorBotones.innerHTML = "";

        // Botón: Primero
        const btnPrimero = document.createElement("button");
        btnPrimero.innerText = "Primero";
        btnPrimero.disabled = (paginaActual === 1);
        btnPrimero.onclick = () => { paginaActual = 1; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnPrimero);

        // Botón: Anterior
        const btnAnterior = document.createElement("button");
        btnAnterior.innerText = "Anterior";
        btnAnterior.disabled = (paginaActual === 1);
        btnAnterior.onclick = () => { paginaActual--; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnAnterior);

        // --- LÓGICA PARA LIMITAR A MÁXIMO 3 PÁGINAS ---
        let paginaInicio = Math.max(1, paginaActual - 1);
        let paginaFin = Math.min(totalPaginas, paginaInicio + 2);

        // Ajustar el inicio si estamos en las últimas páginas para que siempre muestre 3 números si existen
        if (paginaFin - paginaInicio < 2) {
            paginaInicio = Math.max(1, paginaFin - 2);
        }

        // Generar únicamente los números del rango calculado
        for (let i = paginaInicio; i <= paginaFin; i++) {
            const btnNum = document.createElement("button");
            btnNum.innerText = i;
            btnNum.classList.add("pagina-num");
            if (i === paginaActual) btnNum.classList.add("activa");

            btnNum.onclick = () => { paginaActual = i; renderizarPaginacion(); };
            contenedorBotones.appendChild(btnNum);
        }
        // ------------------------------------------------

        // Botón: Siguiente
        const btnSiguiente = document.createElement("button");
        btnSiguiente.innerText = "Siguiente";
        btnSiguiente.disabled = (paginaActual === totalPaginas);
        btnSiguiente.onclick = () => { paginaActual++; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnSiguiente);

        // Botón: Último
        const btnUltimo = document.createElement("button");
        btnUltimo.innerText = "Último";
        btnUltimo.disabled = (paginaActual === totalPaginas);
        btnUltimo.onclick = () => { paginaActual = totalPaginas; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnUltimo);
    }

    // Ejecutar la paginación inicial
    renderizarPaginacion();
});


/////////////////////////////////////////////////



document.addEventListener("DOMContentLoaded", function() {
    const filasPorPagina = 10; // Muestra 10 registros por página
    const tabla = document.getElementById("tabla3");
    const contenedorBotones = document.getElementById("paginacion-botones3");
    const contenedorInfo = document.getElementById("paginacion-info3");

    if (!tabla || !contenedorBotones || !contenedorInfo) return;

    const filas = Array.from(tabla.querySelectorAll("tbody tr"));
    const totalFilas = filas.length;
    const totalPaginas = Math.ceil(totalFilas / filasPorPagina);
    let paginaActual = 1;

    if (totalFilas === 0) {
        contenedorInfo.innerText = "Mostrando 0 a 0 de 0 registros";
        return;
    }

    function renderizarPaginacion() {
        // 1. Mostrar/Ocultar las filas correspondientes en la tabla
        const indiceInicio = (paginaActual - 1) * filasPorPagina;
        const indiceFin = Math.min(indiceInicio + filasPorPagina, totalFilas);

        filas.forEach((fila, indice) => {
            fila.style.display = (indice >= indiceInicio && indice < indiceFin) ? "" : "none";
        });

        // 2. Actualizar el texto informativo (Izquierda)
        contenedorInfo.innerText = `Mostrando ${indiceInicio + 1} a ${indiceFin} de ${totalFilas} registros`;

        // 3. Limpiar los botones anteriores para redibujarlos (Derecha)
        contenedorBotones.innerHTML = "";

        // Botón: Primero
        const btnPrimero = document.createElement("button");
        btnPrimero.innerText = "Primero";
        btnPrimero.disabled = (paginaActual === 1);
        btnPrimero.onclick = () => { paginaActual = 1; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnPrimero);

        // Botón: Anterior
        const btnAnterior = document.createElement("button");
        btnAnterior.innerText = "Anterior";
        btnAnterior.disabled = (paginaActual === 1);
        btnAnterior.onclick = () => { paginaActual--; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnAnterior);

        // --- LÓGICA PARA LIMITAR A MÁXIMO 3 PÁGINAS ---
        let paginaInicio = Math.max(1, paginaActual - 1);
        let paginaFin = Math.min(totalPaginas, paginaInicio + 2);

        // Ajustar el inicio si estamos en las últimas páginas para que siempre muestre 3 números si existen
        if (paginaFin - paginaInicio < 2) {
            paginaInicio = Math.max(1, paginaFin - 2);
        }

        // Generar únicamente los números del rango calculado
        for (let i = paginaInicio; i <= paginaFin; i++) {
            const btnNum = document.createElement("button");
            btnNum.innerText = i;
            btnNum.classList.add("pagina-num");
            if (i === paginaActual) btnNum.classList.add("activa");

            btnNum.onclick = () => { paginaActual = i; renderizarPaginacion(); };
            contenedorBotones.appendChild(btnNum);
        }
        // ------------------------------------------------

        // Botón: Siguiente
        const btnSiguiente = document.createElement("button");
        btnSiguiente.innerText = "Siguiente";
        btnSiguiente.disabled = (paginaActual === totalPaginas);
        btnSiguiente.onclick = () => { paginaActual++; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnSiguiente);

        // Botón: Último
        const btnUltimo = document.createElement("button");
        btnUltimo.innerText = "Último";
        btnUltimo.disabled = (paginaActual === totalPaginas);
        btnUltimo.onclick = () => { paginaActual = totalPaginas; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnUltimo);
    }

    // Ejecutar la paginación inicial
    renderizarPaginacion();
});


/////////////////////////////////////////////////



document.addEventListener("DOMContentLoaded", function() {
    const filasPorPagina = 10; // Muestra 10 registros por página
    const tabla = document.getElementById("tabla4");
    const contenedorBotones = document.getElementById("paginacion-botones4");
    const contenedorInfo = document.getElementById("paginacion-info4");

    if (!tabla || !contenedorBotones || !contenedorInfo) return;

    const filas = Array.from(tabla.querySelectorAll("tbody tr"));
    const totalFilas = filas.length;
    const totalPaginas = Math.ceil(totalFilas / filasPorPagina);
    let paginaActual = 1;

    if (totalFilas === 0) {
        contenedorInfo.innerText = "Mostrando 0 a 0 de 0 registros";
        return;
    }

    function renderizarPaginacion() {
        // 1. Mostrar/Ocultar las filas correspondientes en la tabla
        const indiceInicio = (paginaActual - 1) * filasPorPagina;
        const indiceFin = Math.min(indiceInicio + filasPorPagina, totalFilas);

        filas.forEach((fila, indice) => {
            fila.style.display = (indice >= indiceInicio && indice < indiceFin) ? "" : "none";
        });

        // 2. Actualizar el texto informativo (Izquierda)
        contenedorInfo.innerText = `Mostrando ${indiceInicio + 1} a ${indiceFin} de ${totalFilas} registros`;

        // 3. Limpiar los botones anteriores para redibujarlos (Derecha)
        contenedorBotones.innerHTML = "";

        // Botón: Primero
        const btnPrimero = document.createElement("button");
        btnPrimero.innerText = "Primero";
        btnPrimero.disabled = (paginaActual === 1);
        btnPrimero.onclick = () => { paginaActual = 1; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnPrimero);

        // Botón: Anterior
        const btnAnterior = document.createElement("button");
        btnAnterior.innerText = "Anterior";
        btnAnterior.disabled = (paginaActual === 1);
        btnAnterior.onclick = () => { paginaActual--; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnAnterior);

        // --- LÓGICA PARA LIMITAR A MÁXIMO 3 PÁGINAS ---
        let paginaInicio = Math.max(1, paginaActual - 1);
        let paginaFin = Math.min(totalPaginas, paginaInicio + 2);

        // Ajustar el inicio si estamos en las últimas páginas para que siempre muestre 3 números si existen
        if (paginaFin - paginaInicio < 2) {
            paginaInicio = Math.max(1, paginaFin - 2);
        }

        // Generar únicamente los números del rango calculado
        for (let i = paginaInicio; i <= paginaFin; i++) {
            const btnNum = document.createElement("button");
            btnNum.innerText = i;
            btnNum.classList.add("pagina-num");
            if (i === paginaActual) btnNum.classList.add("activa");

            btnNum.onclick = () => { paginaActual = i; renderizarPaginacion(); };
            contenedorBotones.appendChild(btnNum);
        }
        // ------------------------------------------------

        // Botón: Siguiente
        const btnSiguiente = document.createElement("button");
        btnSiguiente.innerText = "Siguiente";
        btnSiguiente.disabled = (paginaActual === totalPaginas);
        btnSiguiente.onclick = () => { paginaActual++; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnSiguiente);

        // Botón: Último
        const btnUltimo = document.createElement("button");
        btnUltimo.innerText = "Último";
        btnUltimo.disabled = (paginaActual === totalPaginas);
        btnUltimo.onclick = () => { paginaActual = totalPaginas; renderizarPaginacion(); };
        contenedorBotones.appendChild(btnUltimo);
    }

    // Ejecutar la paginación inicial
    renderizarPaginacion();
});
