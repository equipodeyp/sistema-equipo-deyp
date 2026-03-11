const meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];

function init() {
    const ahora = new Date();
    const mesActualIdx = ahora.getMonth(); // Marzo = 2
    const grid = document.getElementById('gridMeses');

    // Solo iteramos hasta el mes actual (oculta los meses superiores)
    for (let i = 0; i <= mesActualIdx; i++) {
        const celda = document.createElement('div');
        celda.className = 'mes-celda';
        celda.innerHTML = `<h3 class="mes-nombre">${meses[i]}</h3>`;

        celda.onclick = () => abrirReporte(i, mesActualIdx);
        grid.appendChild(celda);
    }
}

function abrirReporte(index, mesActualIdx) {
    const modal = new bootstrap.Modal(document.getElementById('mesModal'));
    const iframe = document.getElementById('pdfFrame');
    const containerProgreso = document.getElementById('progresoMes');
    const nombreMes = meses[index];

    document.getElementById('modalTitle').innerText = `REPORTE DE ${nombreMes}`;

    if (index === mesActualIdx) {
        // MES ACTUAL: Mostrar Barra de progreso
        iframe.classList.add('d-none');
        containerProgreso.classList.remove('d-none');

        // Calcular porcentaje del mes (Día actual / Total días del mes)
        const hoy = new Date();
        const ultimoDiaMes = new Date(hoy.getFullYear(), hoy.getMonth() + 1, 0).getDate();
        const porcentaje = Math.round((hoy.getDate() / ultimoDiaMes) * 100);

        const bar = document.getElementById('barAnimate');
        bar.style.width = porcentaje + "%";
        bar.innerText = porcentaje + "%";
        document.getElementById('txtPorcentaje').innerText = `Avance del mes: ${porcentaje}% (${hoy.getDate()} de ${ultimoDiaMes} días)`;

    } else {
        // MES PASADO: Mostrar PDF
        containerProgreso.classList.add('d-none');
        iframe.classList.remove('d-none');
        // Nomenclatura: MAYUSCULAS.pdf
        iframe.src = `../../docs/REPORTES/${nombreMes}.pdf`;
    }

    modal.show();
}

// Limpiar iframe al cerrar para no consumir recursos
document.getElementById('mesModal').addEventListener('hidden.bs.modal', () => {
    document.getElementById('pdfFrame').src = "";
});

window.onload = init;
