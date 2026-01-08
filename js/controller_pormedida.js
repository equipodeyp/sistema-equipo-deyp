// controller de detalle medida
// change select de tipo de medida
function tipoofmedida(tipo){
  if (tipo.value == 'DEFINITIVA') {
    document.getElementById('div_datedefinitiva').style.display = '';
  }
}
// valor de select de tipo de medida
var tipomedida = document.getElementById("upt_tipo").value;
if (tipomedida === 'DEFINITIVA') {
  document.getElementById("upt_tipo").disabled = true;
  document.getElementById("upt_datedefinitiva").disabled = true;
  // document.getElementById('div_dateprovisional').style.display = '';
  document.getElementById('div_datedefinitiva').style.display = '';
}
// valor de select de clasificacion de medida
var tipomedida = document.getElementById("upt_clasificacion").value;
if (tipomedida === 'ASISTENCIA') {
  document.getElementById('div_asistencia').style.display = '';
}else {
  document.getElementById('div_resguardo').style.display = '';
}
// valor de select de asistencia de medida
var tipomedida = document.getElementById("upt_medinciso_asistencia").value;
if (tipomedida === 'VI. OTRAS') {
  document.getElementById('div_othermedextent').style.display = '';
}else {
  document.getElementById('div_othermedextent').style.display = 'none';
}
// valor de select de resguardo de medida
var tipomedida = document.getElementById("upt_medinciso_resguardo").value;
if (tipomedida == 'XI. EJECUCION DE MEDIDAS PROCESALES') {
  document.getElementById('div_ejecucionmedprocesal').style.display = '';
}else if (tipomedida == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
  document.getElementById('div_medotorgadasujrecluidos').style.display = '';
}else if (tipomedida == 'XIII. OTRAS MEDIDAS') {
  document.getElementById('div_othermedguard').style.display = '';
}
// change select de tipo de medida
function estatusmedida(estatus){
  if (estatus.value == 'EJECUTADA') {
    document.getElementById('div_municioejecucion').style.display = '';
    document.getElementById('div_dateejecucion').style.display = '';
    document.getElementById('div_datecancelacion').style.display = 'none';
    document.getElementById('div_motivocancelacion').style.display = 'none';
    document.getElementById('div_nextejecuatda').style.display = '';
    // limpiar inputs selects
    document.getElementById('upt_datecancelacion').value ='';
    document.getElementById('upt_motivocancel').value ='';
  }else {
    document.getElementById('div_municioejecucion').style.display = 'none';
    document.getElementById('div_dateejecucion').style.display = 'none';
    document.getElementById('div_datecancelacion').style.display = '';
    document.getElementById('div_motivocancelacion').style.display = '';
    document.getElementById('div_nextejecuatda').style.display = 'none';
    document.getElementById('div_especifiqueconclusion').style.display = 'none';
    // limpiar inputs selects
    document.getElementById('upt_municipioejecucion').value ='';
    document.getElementById('upt_datetermino').value ='';
    document.getElementById('upt_conart35').value ='';
    document.getElementById('upt_otherart35').value ='';
  }
}
// change select de tipo de medida
function motivoconclusion(motivo){
  if (motivo.value == 'OTRO') {
    document.getElementById('div_especifiqueconclusion').style.display = '';
  }else {
    document.getElementById('div_especifiqueconclusion').style.display = 'none';
    // limpiar inputs selects
    document.getElementById('upt_otherart35').value ='';
  }
}


/**
 * ACTIVAR CALENDARIO AL CLIC EN CUALQUIER PARTE DEL INPUT DATE
 */
document.addEventListener('click', function (event) {
    if (event.target.classList.contains('input-fechamedida')) {
        const inputDate = event.target;

        // showPicker() es la API estándar de 2025 para desplegar el calendario
        if (typeof inputDate.showPicker === 'function') {
            try {
                inputDate.showPicker();
            } catch (error) {
                inputDate.focus();
            }
        }
    }
});
////////////////////////////////////////////////////////////////////////////////
