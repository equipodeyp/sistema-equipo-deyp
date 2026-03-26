const mesesNombres = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
// Referencia inamovible del tiempo real
const HOY_REAL = new Date();
const ANIO_ACTUAL = HOY_REAL.getFullYear();
const MES_LIMITE = HOY_REAL.getMonth(); // Mes actual (0-11)
// Estado de la vista actual
let fechaVista = new Date(ANIO_ACTUAL, MES_LIMITE, 1);

function dibujarCalendario() {
  const grid = document.getElementById('gridCalendario');
  const headers = document.querySelectorAll('.header-dia');
  grid.innerHTML = '';
  headers.forEach(h => grid.appendChild(h));
  const anioEnVista = fechaVista.getFullYear();
  const mesEnVista = fechaVista.getMonth();
  document.getElementById('txtMes').innerText = `${mesesNombres[mesEnVista]} ${anioEnVista}`;
  // Control de visibilidad de flechas
  // Ocultar PREV si estamos en Enero del año actual
  document.getElementById('btnPrev').classList.toggle('btn-hidden', mesEnVista === 0);
  // Ocultar NEXT si estamos en el mes actual (MES_LIMITE)
  document.getElementById('btnNext').classList.toggle('btn-hidden', mesEnVista >= MES_LIMITE);
  let primerDia = new Date(anioEnVista, mesEnVista, 1).getDay();
  let inicioOffset = (primerDia === 0) ? 6 : primerDia - 1;
  let totalDias = new Date(anioEnVista, mesEnVista + 1, 0).getDate();
  // 1. Celdas vacías mes anterior
  for (let i = 0; i < inicioOffset; i++) {
    const cell = document.createElement('div');
    cell.className = 'dia-celda fuera-mes';
    grid.appendChild(cell);
  }
  // 2. Días del mes
  for (let d = 1; d <= totalDias; d++) {
    const cell = document.createElement('div');
    const fechaLoop = new Date(anioEnVista, mesEnVista, d);
    const esHoy = fechaLoop.toDateString() === HOY_REAL.toDateString();
    cell.className = `dia-celda ${esHoy ? 'es-hoy' : ''}`;
    cell.innerHTML = `<div class="dia-numero">${d}</div>`;
    cell.onclick = () => {
    const modalElement = document.getElementById('modalDiario');
    const modal = new bootstrap.Modal(modalElement);
    // Referencias
    const visor = document.getElementById('visorPDF');
    const loading = document.getElementById('loadingBar');
    const txtCarga = document.getElementById('txtCarga');
    const alerta = document.getElementById('alertaNoDisponible');
    const idFull = document.getElementById('idFull');
    // 1. Limpieza inicial
    visor.style.display = 'none';
    visor.src = '';
    alerta.style.display = 'none';
    loading.style.display = 'block';
    txtCarga.style.display = 'block';
    const dd = String(d).padStart(2, '0');
    const mm = String(mesEnVista + 1).padStart(2, '0');
    // Validación de fecha (Bloquear hoy y futuro)
    const fechaSinHora = new Date(HOY_REAL.getFullYear(), HOY_REAL.getMonth(), HOY_REAL.getDate());
    const esFechaInvalida = fechaLoop >= fechaSinHora;
    document.getElementById('titFecha').innerText = `${dd}/${mm}/${anioEnVista}`;
    if (esFechaInvalida) {
      setTimeout(() => {
        loading.style.display = 'none';
        txtCarga.style.display = 'none';
        alerta.style.display = 'block';
        idFull.innerText = "N/A";
      }, 600);
    } else {
      // Lógica de archivo
      const inicioAnio = new Date(anioEnVista, 0, 0);
      const diff = fechaLoop - inicioAnio;
      const z = Math.floor(diff / 86400000);
      const nombreArchivo = `(${z}) RD_${dd}${mm}${anioEnVista}.pdf`;
      const nombreMesMayus = mesesNombres[mesEnVista];
      const rutaPDF = `../../docs/REPORTES/DIARIOS/${anioEnVista}/${nombreMesMayus}/${nombreArchivo}`;
      idFull.innerText = nombreArchivo;
      // Carga simulada y apertura de PDF
      setTimeout(() => {
        loading.style.display = 'none';
        txtCarga.style.display = 'none';
        visor.src = rutaPDF;
        visor.style.display = 'block';
      }, 800);
    }
    modal.show();
    };
    grid.appendChild(cell);
  }
}

function cambiarMes(n) {
  let nuevoMes = fechaVista.getMonth() + n;
  // Validar que no se salga de los límites (Enero - Mes Actual)
  if (nuevoMes >= 0 && nuevoMes <= MES_LIMITE) {
    fechaVista.setMonth(nuevoMes);
    dibujarCalendario();
  }
}

document.getElementById('modalDiario').addEventListener('hidden.bs.modal', () => {
  document.getElementById('visorPDF').src = "";
});

window.onload = dibujarCalendario;
