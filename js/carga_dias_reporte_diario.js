const dSemana = ["LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES", "SÁBADO", "DOMINGO"];
const meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];

function init() {
    const grid = document.getElementById('gridDias');
    const ahora = new Date();
    const hoySinHora = new Date(ahora.getFullYear(), ahora.getMonth(), ahora.getDate()).getTime();

    document.getElementById('txtMes').innerText = meses[ahora.getMonth()];

    let diaActualSemana = ahora.getDay();
    let diffAlLunes = ahora.getDate() - diaActualSemana + (diaActualSemana === 0 ? -6 : 1);
    const inicioSemana = new Date(new Date().setDate(diffAlLunes));

    for (let i = 0; i < 7; i++) {
        const fecha = new Date(inicioSemana);
        fecha.setDate(inicioSemana.getDate() + i);
        const fechaTimestamp = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate()).getTime();

        const d = String(fecha.getDate()).padStart(2, '0');
        const m = String(fecha.getMonth() + 1).padStart(2, '0');
        const y = fecha.getFullYear();
        const z = Math.floor((fecha - new Date(y, 0, 0)) / 86400000);

        const esHoy = fecha.toDateString() === (new Date()).toDateString();
        const esFuturo = fechaTimestamp > hoySinHora;

        const btn = document.createElement('div');
        btn.className = `dia-btn ${esHoy ? 'es-hoy' : ''}`;
        btn.innerHTML = `<span class="label-dia">${dSemana[i]}</span><span>${d}/${m}/${y}</span>`;

        btn.onclick = () => {
            const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
            const pdfURL = `../../docs/REPORTES/(${z}) RD_${d}${m}${y}.pdf`;

            const timeWrapper = document.getElementById('timeWrapper');
            const pdfFrame = document.getElementById('pdfFrame');
            const txtEstado = document.getElementById('txtEstado');

            if (esHoy || esFuturo) {
                pdfFrame.classList.add('d-none');
                timeWrapper.classList.remove('d-none');
                let porcentaje = 0;
                if (esHoy) {
                    const minPasados = (new Date().getHours() * 60) + new Date().getMinutes();
                    porcentaje = Math.round((minPasados / 1440) * 100);
                    txtEstado.innerText = "DÍA EN CURSO";
                    txtEstado.className = "badge bg-warning text-dark";
                    document.getElementById('labelPorcentaje').innerText = `${porcentaje}% TRANSCURRIDO`;
                } else {
                    txtEstado.innerText = "PROGRAMADO";
                    txtEstado.className = "badge bg-secondary";
                    document.getElementById('labelPorcentaje').innerText = "0% - PENDIENTE";
                }
                document.getElementById('timeBar').style.width = porcentaje + "%";
            } else {
                timeWrapper.classList.add('d-none');
                pdfFrame.classList.remove('d-none');
                pdfFrame.src = pdfURL;
                txtEstado.innerText = "FINALIZADO";
                txtEstado.className = "badge bg-success";
            }
            document.getElementById('idFull').innerText = `${dSemana[i]}---(${z}) RD_${d}${m}${y}`;
            modal.show();
        };
        grid.appendChild(btn);
    }
}

document.getElementById('pdfModal').addEventListener('hidden.bs.modal', () => {
    document.getElementById('pdfFrame').src = "";
});

window.onload = init;
