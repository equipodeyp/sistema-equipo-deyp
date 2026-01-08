/////////////////////////////////////////////////////////////////////////////////
const miSelectvalor = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
// Asegúrate de que miID coincida con el ID de tu elemento <select>
function cambiaranalisis(){
  // console.log(miSelectvalor);
  if (miSelectvalor == 'EN ELABORACION') {
    document.getElementById('div_incorporacion').style.display = 'none';
    document.getElementById('div_dateautorizacion').style.display = 'none';
    document.getElementById('div_idanalisis').style.display = 'none';
    document.getElementById('div_convenio').style.display = 'none';
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
  }else if (miSelectvalor == 'ESTUDIO TECNICO DE ANALISIS DE RIESGO') {
    document.getElementById('div_incorporacion').style.display = '';
    document.getElementById('div_dateautorizacion').style.display = '';
    document.getElementById('div_idanalisis').style.display = '';
    document.getElementById('div_convenio').style.display = '';
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').disabled = true;
    document.getElementById('id_analisis').disabled = true;
  }else if (miSelectvalor == 'ESTUDIO TECNICO DE CONCLUSION' || miSelectvalor == 'ESTUDIO TECNICO DE CANCELACION') {
    document.getElementById('div_incorporacion').style.display = '';
    document.getElementById('div_dateautorizacion').style.display = '';
    document.getElementById('div_idanalisis').style.display = '';
    document.getElementById('div_convenio').style.display = 'none';
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').disabled = true;
    document.getElementById('id_analisis').disabled = true;
  }
}
cambiaranalisis();
////////////////////////////////////////////////////////////////////////////////
const convenient_sujeto = document.getElementById('CONVENIO_ENTENDIMIENTO').value;
function checkconveniosujeto(){
  // console.log(convenient_sujeto);
  if (convenient_sujeto == '') {
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
  }else if (convenient_sujeto == 'FORMALIZADO') {
    document.getElementById('div_dateconvenio').style.display = '';
    document.getElementById('div_dateinicioconvenio').style.display = '';
    document.getElementById('div_vigenciaconvenio').style.display = '';
    document.getElementById('div_dateterminoconvenio').style.display = '';
    document.getElementById('div_idconvenio').style.display = '';
    document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    document.getElementById('datefirmaconvenio').disabled = true;
    document.getElementById('fecha_inicio').disabled = true;
    document.getElementById('VIGENCIA_CONVENIO').disabled = true;
    document.getElementById('id_convenio').disabled = true;
  }else if (convenient_sujeto == 'NO FORMALIZADO') {
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
    document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
  }
}
checkconveniosujeto();
////////////////////////////////////////////////////////////////////////////////
const statussujeto = document.getElementById('ESTATUS_PERSONA').value;
function checkstatussujeto(){
  if (statussujeto == 'PERSONA PROPUESTA') {
    document.getElementById('div_selectconclusion').style.display = 'none';
    document.getElementById('div_dateconclusion').style.display = 'none';
    document.getElementById('div_conclusionart35').style.display = 'none';
    document.getElementById('div_otroart35').style.display = 'none';
  }else if (statussujeto == 'SUJETO PROTEGIDO' || statussujeto == 'SUSPENDIDO TEMPORALMENTE') {
    document.getElementById('div_selectconclusion').style.display = 'none';
    document.getElementById('div_dateconclusion').style.display = 'none';
    document.getElementById('div_datecancelacion').style.display = 'none';
    document.getElementById('div_conclusionart35').style.display = 'none';
    document.getElementById('div_otroart35').style.display = 'none';
  }else if (statussujeto == 'DESINCORPORADO' || statussujeto == 'NO INCORPORADO') {
    document.getElementById('ESTATUS_PERSONA').disabled = true;
    document.getElementById('flexSwitchsujetoestatus').disabled = true;
    document.getElementById('conclusioncancelacion_sujeto').disabled = true;
    document.getElementById('FECHA_DESINCORPORACION_UNO').disabled = true;
    document.getElementById('datecancelacionsuj').disabled = true;
    document.getElementById('slt_conclusionart35').disabled = true;
    document.getElementById('OTHER_ART351').disabled = true;
    document.getElementById('COMENTARIO').disabled = true;
    document.getElementById('btn_comentariodeterminacion').disabled = true;
    document.getElementById('btnupdatedeterminacion').style.display = 'none';
    document.getElementById('div_comentarios').style.display = 'none';
  }
}
checkstatussujeto();
////////////////////////////////////////////////////////////////////////////////
const conclu_cancel_sujeto = document.getElementById('conclusioncancelacion_sujeto').value;
function checkconclusioncancelacionsujeto(){
  if (conclu_cancel_sujeto == 'CANCELACION') {
    document.getElementById('div_datecancelacion').style.display = '';
    // document.getElementById('datecancelacionsuj').disabled = true;
    document.getElementById('div_dateconclusion').style.display = 'none';
    document.getElementById('div_conclusionart35').style.display = 'none';
    document.getElementById('div_otroart35').style.display = 'none';
  }else if (conclu_cancel_sujeto == 'CONCLUSION') {
    document.getElementById('div_datecancelacion').style.display = 'none';
    document.getElementById('div_dateconclusion').style.display = '';
    document.getElementById('div_conclusionart35').style.display = '';
    // document.getElementById('FECHA_DESINCORPORACION_UNO').disabled = true;
    const concluart35_sujeto = document.getElementById('slt_conclusionart35').value;
    // console.log(concluart35_sujeto);
    function checkconclusionart35(){
      if (concluart35_sujeto == 'VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES' || concluart35_sujeto == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || concluart35_sujeto == 'OTRO') {
        document.getElementById('div_otroart35').style.display = '';
      }else {
        document.getElementById('div_otroart35').style.display = 'none';
      }
    }
    checkconclusionart35();
  }
}
checkconclusioncancelacionsujeto();
////////////////////////////////////////////////////////////////////////////////
var checkrelacional = document.getElementById('statusprogramrelacional').value;
function activarcheckrelacional() {
  if (checkrelacional === 'SI') {
    document.getElementById('flexSwitchsujetorelacionado').checked = true;
    document.getElementById('sujrelacionado_no').style.display = 'none';
  }else {
    document.getElementById('sujrelacionado_si').style.display = 'none';
    // document.getElementById('flexSwitchsujetorelacionado').disabled = false;
  }
}
activarcheckrelacional();
////////////////////////////////////////////////////////////////////////////////
var checkincorp = document.getElementById('statusprogram').value;
function activarcheck() {
  if (checkincorp === 'ACTIVO') {
    document.getElementById('flexSwitchsujetoestatus').checked = true;
    document.getElementById('sujestatus_no').style.display = 'none';
  }else {
    document.getElementById('sujestatus_si').style.display = 'none';
  }
}
activarcheck();
////////////////////////////////////////////////////////////////////////////////
const miSelect = document.getElementById('ANALISIS_MULTIDISCIPLINARIO');
miSelect.addEventListener('change', function() {
  // 'this' se refiere al elemento select
  const valorSeleccionado = this.value;
  // console.log(valorSeleccionado);
  if (valorSeleccionado == 'ESTUDIO TECNICO DE ANALISIS DE RIESGO') {
    document.getElementById('div_incorporacion').style.display = '';
    document.getElementById('div_dateautorizacion').style.display = '';
    document.getElementById('div_idanalisis').style.display = '';
    document.getElementById('div_convenio').style.display = '';
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
    document.getElementById('INPUT_INCORPORACION').value = '';
  }else if (valorSeleccionado == 'EN ELABORACION') {
    document.getElementById('div_incorporacion').style.display = 'none';
    document.getElementById('div_dateautorizacion').style.display = 'none';
    document.getElementById('div_idanalisis').style.display = 'none';
    document.getElementById('div_convenio').style.display = 'none';
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
    document.getElementById('CONVENIO_ENTENDIMIENTO').value = '';
    document.getElementById('INPUT_INCORPORACION').value = '';
  }else if (valorSeleccionado == 'ESTUDIO TECNICO DE CONCLUSION' || valorSeleccionado == 'ESTUDIO TECNICO DE CANCELACION') {
    document.getElementById('div_incorporacion').style.display = '';
    document.getElementById('div_dateautorizacion').style.display = '';
    document.getElementById('div_idanalisis').style.display = '';
    document.getElementById('div_convenio').style.display = 'none';
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
    document.getElementById('CONVENIO_ENTENDIMIENTO').value = '';
    document.getElementById('INPUT_INCORPORACION').value = '';
  }else if (valorSeleccionado == 'ACUERDO DE ACUMULACION') {
    document.getElementById('INPUT_INCORPORACION').value = '';
  }
});
////////////////////////////////////////////////////////////////////////////////
const selectconvenio = document.getElementById('CONVENIO_ENTENDIMIENTO');
selectconvenio.addEventListener('change', function() {
  // 'this' se refiere al elemento select
  const valorselectconvenio = this.value;
  if (valorselectconvenio == 'FORMALIZADO') {
    document.getElementById('div_dateconvenio').style.display = '';
    document.getElementById('div_dateinicioconvenio').style.display = '';
    document.getElementById('div_vigenciaconvenio').style.display = '';
    document.getElementById('div_dateterminoconvenio').style.display = '';
    document.getElementById('div_idconvenio').style.display = '';
  }else if (valorselectconvenio == 'NO FORMALIZADO') {
    document.getElementById('div_dateconvenio').style.display = 'none';
    document.getElementById('div_dateinicioconvenio').style.display = 'none';
    document.getElementById('div_vigenciaconvenio').style.display = 'none';
    document.getElementById('div_dateterminoconvenio').style.display = 'none';
    document.getElementById('div_idconvenio').style.display = 'none';
  }
});
////////////////////////////////////////////////////////////////////////////////
const selectstatussujeto = document.getElementById('ESTATUS_PERSONA');
selectstatussujeto.addEventListener('change', function() {
  // 'this' se refiere al elemento select
  const valorselectstatussujeto = this.value;
  if (valorselectstatussujeto == 'PERSONA PROPUESTA' || valorselectstatussujeto == 'SUJETO PROTEGIDO' || valorselectstatussujeto == 'SUSPENDIDO TEMPORALMENTE') {
    document.getElementById('div_selectconclusion').style.display = 'none';
    document.getElementById('div_dateconclusion').style.display = 'none';
    document.getElementById('div_datecancelacion').style.display = 'none';
    document.getElementById('div_conclusionart35').style.display = 'none';
    document.getElementById('div_otroart35').style.display = 'none';
    document.getElementById('conclusioncancelacion_sujeto').value = '';
  }else if (valorselectstatussujeto == 'DESINCORPORADO' || valorselectstatussujeto == 'NO INCORPORADO') {
    document.getElementById('div_selectconclusion').style.display = '';
    document.getElementById('div_dateconclusion').style.display = 'none';
    document.getElementById('div_conclusionart35').style.display = 'none';
    document.getElementById('div_otroart35').style.display = 'none';
    document.getElementById('conclusioncancelacion_sujeto').value = '';
  }
});
////////////////////////////////////////////////////////////////////////////////
const selectoptcancelconclusion = document.getElementById('conclusioncancelacion_sujeto');
selectoptcancelconclusion.addEventListener('change', function() {
  // 'this' se refiere al elemento select
  const valorselectoptcancelconclusion = this.value;
  // console.log(valorselectoptcancelconclusion);
  if (valorselectoptcancelconclusion == 'CANCELACION') {
    document.getElementById('div_datecancelacion').style.display = '';
    document.getElementById('div_dateconclusion').style.display = 'none';
    // document.getElementById('LABEL_FECHA_CONCLUSION').style.display = 'none';
    document.getElementById('div_conclusionart35').style.display = 'none';
    document.getElementById('div_otroart35').style.display = 'none';
    document.getElementById('slt_conclusionart35').value = '';
    document.getElementById('FECHA_DESINCORPORACION_UNO').value = '';
  }else if (valorselectoptcancelconclusion == 'CONCLUSION') {
    document.getElementById('div_datecancelacion').style.display = 'none';
    document.getElementById('div_dateconclusion').style.display = '';
    document.getElementById('div_conclusionart35').style.display = '';
    document.getElementById('div_otroart35').style.display = 'none';
    document.getElementById('slt_conclusionart35').value = '';
    document.getElementById('datecancelacionsuj').value = '';
  }
});
////////////////////////////////////////////////////////////////////////////////
const sltconclusionart35 = document.getElementById('slt_conclusionart35');
sltconclusionart35.addEventListener('change', function() {
  // 'this' se refiere al elemento select
  const valorsltconclusionart35 = this.value;
  if (valorsltconclusionart35 == 'VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES' || valorsltconclusionart35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || valorsltconclusionart35 == 'OTRO') {
    document.getElementById('div_otroart35').style.display = '';
  }else {
    document.getElementById('div_otroart35').style.display = 'none';
  }
});
////////////////////////////////////////////////////////////////////////////////
document.getElementById('flexSwitchsujetoestatus').addEventListener('change', function() {
  if (this.checked) {
    document.getElementById('sujestatus_no').style.display = 'none';
    document.getElementById('sujestatus_si').style.display = '';
  } else {
    document.getElementById('sujestatus_no').style.display = '';
    document.getElementById('sujestatus_si').style.display = 'none';
  }
});
