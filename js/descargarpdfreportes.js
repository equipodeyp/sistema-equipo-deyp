function actualizar() {
  const ahora = new Date();
  const reloj = document.getElementById('reloj');
  const boton = document.getElementById('btn-descarga');

  let metaI = new Date(); metaI.setHours(09, 00, 0, 0);
  let metaF = new Date(); metaF.setHours(10, 00, 0, 0);

  if (ahora >= metaF) {
      metaI.setDate(metaI.getDate() + 1);
      metaF.setDate(metaF.getDate() + 1);
  }

  const difS = (metaI - ahora) / 1000;

  if (ahora >= metaI && ahora < metaF) {
    reloj.style.display = 'none';
    boton.classList.add('activo');
  } else {
    boton.classList.remove('activo');
    reloj.style.display = 'block';
    const m = Math.floor((difS % 3600) / 60);
    const s = Math.floor(difS % 60);

    if (difS > 0 && difS <= 300) {
      reloj.classList.add('urgente');
      reloj.innerHTML = `¡CASI LISTO! <br>${m}:${s.toString().padStart(2, '0')}`;
    } else {
      reloj.classList.remove('urgente');
      const h = Math.floor(difS / 3600);
      reloj.innerHTML = `PRÓXIMO PDF:<br>${h > 0 ? h+'h ' : ''}${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
    }
  }
}
setInterval(actualizar, 1000);
actualizar();
////////////////////////////////////////////////////////////////////////////////
function verificarHorarioYMostrar() {
  const ahora = new Date();
  const hora = ahora.getHours(); // Obtiene la hora de 0 a 23
  // Rango: Mayor o igual a 22 (10 PM) y menor o igual a 23 (11:59 PM)
  if (hora >= 10 && hora <= 23) {
    const alerta = document.getElementById('miAlerta');
    // Mostrar la alerta con la clase 'active'
    alerta.classList.add('active');
    // Auto-ocultar después de 5 segundos
    setTimeout(cerrarAlerta, 10000);
  }
}
function cerrarAlerta() {
  const alerta = document.getElementById('miAlerta');
  if(alerta) alerta.classList.remove('active');
}
// Ejecutar la validación al cargar la página
window.onload = verificarHorarioYMostrar;
