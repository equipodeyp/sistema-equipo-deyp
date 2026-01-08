////////////////////////////////////////////////////////////////////////////////
// inicio de colocar selected y ponerle otro color con css cuando se selecciona una opcion del nav tabs
let cuadrossujeto = document.querySelectorAll('.link-light-sujeto');
for (let [isujeto, cvsujeto] of cuadrossujeto.entries()) {
  cvsujeto.addEventListener('click', function focus() {
      resetFocussujeto();
      cvsujeto.classList.toggle("selected")
  })
}

function resetFocussujeto() {
  cuadrossujeto.forEach(elsuj => elsuj.classList.remove("selected"));
}
// fin
////////////////////////////////////////////////////////////////////////////////
// inicio de mostrar y ocultar al hacer click en el nav tabs
function autoridad(){
  document.getElementById("autoridad_div").style.display = "";
  document.getElementById("personapropuesta_div").style.display = "none";
  document.getElementById("lugarnacimiento_div").style.display = "none";
  document.getElementById("domicilioactual_div").style.display = "none";
  document.getElementById("invprocpenal_div").style.display = "none";
  document.getElementById("valjuridica_div").style.display = "none";
  // document.getElementById("relacionado_div").style.display = "none";
}
////////////////////////////////////////////////////////////////////////////////
function personapropuesta(){
  document.getElementById("autoridad_div").style.display = "none";
  document.getElementById("personapropuesta_div").style.display = "";
  document.getElementById("lugarnacimiento_div").style.display = "none";
  document.getElementById("domicilioactual_div").style.display = "none";
  document.getElementById("invprocpenal_div").style.display = "none";
  document.getElementById("valjuridica_div").style.display = "none";
  // document.getElementById("relacionado_div").style.display = "none";
}
////////////////////////////////////////////////////////////////////////////////
function lugarnacimiento(){
  document.getElementById("autoridad_div").style.display = "none";
  document.getElementById("personapropuesta_div").style.display = "none";
  document.getElementById("lugarnacimiento_div").style.display = "";
  document.getElementById("domicilioactual_div").style.display = "none";
  document.getElementById("invprocpenal_div").style.display = "none";
  document.getElementById("valjuridica_div").style.display = "none";
  // document.getElementById("relacionado_div").style.display = "none";
}
////////////////////////////////////////////////////////////////////////////////
function domicilioactual(){
  document.getElementById("autoridad_div").style.display = "none";
  document.getElementById("personapropuesta_div").style.display = "none";
  document.getElementById("lugarnacimiento_div").style.display = "none";
  document.getElementById("domicilioactual_div").style.display = "";
  document.getElementById("invprocpenal_div").style.display = "none";
  document.getElementById("valjuridica_div").style.display = "none";
  // document.getElementById("relacionado_div").style.display = "none";
}
////////////////////////////////////////////////////////////////////////////////
function invprocpenal(){
  document.getElementById("autoridad_div").style.display = "none";
  document.getElementById("personapropuesta_div").style.display = "none";
  document.getElementById("lugarnacimiento_div").style.display = "none";
  document.getElementById("domicilioactual_div").style.display = "none";
  document.getElementById("invprocpenal_div").style.display = "";
  document.getElementById("valjuridica_div").style.display = "none";
  // document.getElementById("relacionado_div").style.display = "none";
}
////////////////////////////////////////////////////////////////////////////////
function valjuridica(){
  document.getElementById("autoridad_div").style.display = "none";
  document.getElementById("personapropuesta_div").style.display = "none";
  document.getElementById("lugarnacimiento_div").style.display = "none";
  document.getElementById("domicilioactual_div").style.display = "none";
  document.getElementById("invprocpenal_div").style.display = "none";
  document.getElementById("valjuridica_div").style.display = "";
  // document.getElementById("relacionado_div").style.display = "none";
}
////////////////////////////////////////////////////////////////////////////////
function relacionado(){
  document.getElementById("autoridad_div").style.display = "none";
  document.getElementById("personapropuesta_div").style.display = "none";
  document.getElementById("lugarnacimiento_div").style.display = "none";
  document.getElementById("domicilioactual_div").style.display = "none";
  document.getElementById("invprocpenal_div").style.display = "none";
  document.getElementById("valjuridica_div").style.display = "none";
  // document.getElementById("relacionado_div").style.display = "";
}
// fin
////////////////////////////////////////////////////////////////////////////////
// inicio de controller de autoridad
function openOther(sel) {
  if (sel.value=="OTRO"){
    document.getElementById("other").style.display = "";
  }else{
    document.getElementById("other").style.display="none";
    document.getElementById("OTHER_AUTORIDAD1").value ="";
  }
}
// fin
////////////////////////////////////////////////////////////////////////////////
// inicio de controller persona propuesta
// asignar id unico persona
var separarFolio = [];
var folio = document.getElementById('NUM_EXPEDIENTE').value;
separarFolio = folio.split("/");
var idFolio = separarFolio[3];

var nombrePersona = document.getElementById('NOMBRE_PERSONA');
var paternoPersona = document.getElementById('PATERNO_PERSONA');
var maternoPersona = document.getElementById('MATERNO_PERSONA');
var nombreIngresado;
var paternoIngresado;
var maternoIngresado;
var nombreCompleto;
var arregloNombreCompleto;
var inicialesNombreCompleto;
var fullNombreCompleto;
var arrayNombreCompleto = [];
var text1 = "";

nombrePersona.addEventListener('change', obtenerNombre);
paternoPersona.addEventListener('change', obtenerPaterno);
maternoPersona.addEventListener('change', obtenerMaterno);

function obtenerNombre(e) {
  nombreIngresado = e.target.value;
  // console.log(nombreIngresado);
  document.getElementById("GENERAR_ID").disabled = true;
}

function obtenerPaterno(e) {
  paternoIngresado = e.target.value;
  // console.log(paternoIngresado);
  document.getElementById("GENERAR_ID").disabled = true;
}

function obtenerMaterno(e) {
  maternoIngresado = e.target.value;
  // console.log(maternoIngresado);
  document.getElementById("GENERAR_ID").disabled = false;
}

function obtenerIniciales() {
  nombreCompleto = " " + nombreIngresado + " " + paternoIngresado + " " + maternoIngresado + " ";

  arregloNombreCompleto = nombreCompleto.split(' ');
  for (var i = 0; i < arregloNombreCompleto.length; i++){
    inicialesNombreCompleto = arregloNombreCompleto[i].substring(0, 1).toUpperCase(0, 1);
    arrayNombreCompleto.push(inicialesNombreCompleto);
  }

  fullNombreCompleto = arrayNombreCompleto.filter(v => v);
  // console.log(fullNombreCompleto);
  document.getElementById("ID_UNICO").value = "";

  fullNombreCompleto.forEach(nombrePersona);

  function nombrePersona(item1) {
  text1 += item1;
  }
}

function enviarId() {
    obtenerIniciales();
    document.getElementById("ID_UNICO").value = text1 + "-" + idFolio;
    readOnlyNombreCompleto();
    document.getElementById("GENERAR_ID").disabled = true;
    activarguardar = true;
    document.getElementById('enter').disabled = false;
}

function readOnlyNombreCompleto() {
  document.getElementById("NOMBRE_PERSONA").readOnly = true;
  document.getElementById("PATERNO_PERSONA").readOnly = true;
  document.getElementById("MATERNO_PERSONA").readOnly = true;
}

function validarNombrePersona(form) {
    form.PATERNO_PERSONA.disabled=(form.NOMBRE_PERSONA.value=="");
}

function validarApellidoPersona(form) {
    form.MATERNO_PERSONA.disabled=(form.PATERNO_PERSONA.value=="");
}
////////////////////////////////////
// select para mencionar otro tipo de calidad dentro del proceso PENAL
var calpp = document.getElementById('CALIDAD_PERSONA_PROCEDIMIENTO');
var callpproc = '';
calpp.addEventListener('change', obtenercalproc);
function obtenercalproc (e) {
  callpproc = e.target.value;
  // console.log(callpproc);
  if (callpproc === 'OTROS') {
    document.getElementById('otracalidadproceso').style.display= "";
  }else {
    document.getElementById('otracalidadproceso').style.display= "none";
    document.getElementById('OTRACALIDADPROCESO').value="";
  }
}
// select de incapaz (menor de edad)
function pagoOnChange(sel) {
  if (sel.value=="NO"){
    document.getElementById("tutor").style.display = "none";
    document.getElementById("TUTOR_NOMBRE1").value='';
    document.getElementById("TUTOR_PATERNO1").value='';
    document.getElementById("TUTOR_MATERNO1").value='';
  }else{
    document.getElementById("tutor").style.display="";
  }
}
// fin
////////////////////////////////////////////////////////////////////////////////
// inicio de controller de lugar de nacimiento
// select de estado de nacimiento
function OTHERPAIS(sel) {
  if(sel.value== '33'){
    document.getElementById("other_pais").style.display = "";
    document.getElementById("municipio").style.display = "none";
  }else{
    document.getElementById("other_pais").style.display = "none";
    document.getElementById("municipio").style.display = "";
    document.getElementById('OTHER_PAIS').value ="";
  }
}
///////////////////////////////////////
// select PARA OBTENER ESTADO-MUNICIPIO-LOCALIDAD
$(document).ready(function(){
  $("#cbx_estado").change(function () {

    $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

    $("#cbx_estado option:selected").each(function () {
      id_estado = $(this).val();
      $.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
        $("#cbx_municipio").html(data);
      });
    });
  })
});

$(document).ready(function(){
  $("#cbx_municipio").change(function () {
    $("#cbx_municipio option:selected").each(function () {
      id_municipio = $(this).val();
      $.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
        $("#cbx_localidad").html(data);
      });
    });
  })
});
// fin controller
////////////////////////////////////////////////////////////////////////////////
// inicio de controller de domicilio actual
// modificacion del domicilio ACTUAL
function mod_domicilioactual(sel){
  if (sel.value=='SI'){
    document.getElementById("mod_reclusorio").style.display="";
    document.getElementById("act_estado").style.display="none";
    document.getElementById("act_municipio").style.display="none";
    document.getElementById("act_localidad").style.display="none";
    document.getElementById("act_calle").style.display="none";
    document.getElementById("act_cp").style.display="none";
    document.getElementById("criterio_oport").style.display="";
    document.getElementById("fecha_crit").style.display="none";
    document.getElementById('cbx_estado1').value='';
    document.getElementById('cbx_municipio11').value='';
    document.getElementById('localidadrad').value='';
    document.getElementById('CALLE').value='';
    document.getElementById('CP').value='';
  }else if(sel.value=='NO'){
    document.getElementById("act_estado").style.display="";
    document.getElementById("act_municipio").style.display="";
    document.getElementById("act_localidad").style.display="";
    document.getElementById("act_calle").style.display="";
    document.getElementById("act_cp").style.display="";
    document.getElementById("mod_reclusorio").style.display="none";
    document.getElementById("criterio_oport").style.display="none";
    document.getElementById("fecha_crit").style.display="none";
    document.getElementById('RECLUSORIO1').value='';
    document.getElementById('CRITERIO_OPORTUNIDAD').value='';
    document.getElementById('fecha_cr_opor').value='';
  }
}
//////////////////////////////////
function fecha_criterio(sel){
  if (sel.value === "OTORGADO") {
    document.getElementById("fecha_crit").style.display="";
    document.getElementById('fecha_cr_opor').value='';
  }else {
    document.getElementById("fecha_crit").style.display="none";
  }
}
//////////////////////////////////
// select para obtener ESTADO-MUNICIPIO-LOCALIDAD
$(document).ready(function(){
  $("#cbx_estado1").change(function () {

    $('#cbx_localidad11').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

    $("#cbx_estado1 option:selected").each(function () {
      id_estado = $(this).val();
      $.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
        $("#cbx_municipio11").html(data);
      });
    });
  })
});

$(document).ready(function(){
  $("#cbx_municipio11").change(function () {
    $("#cbx_municipio11 option:selected").each(function () {
      id_municipio = $(this).val();
      $.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
        $("#cbx_localidad11").html(data);
      });
    });
  })
});
// fin de controller domicilio actual
////////////////////////////////////////////////////////////////////////////////
// inicio de controller de investagacion o proceso penal
// select delito principal
function otherdelito(sel) {
  if (sel.value=="OTRO"){
    document.getElementById("otherdel").style.display = "";
  }else{
    document.getElementById("otherdel").style.display="none";
    document.getElementById("OTRO_DELITO_PRINCIPAL1").value = '';
    // document.getElementById("OTRO_DELITO_PRINCIPAL").value = '';
  }
}
// select de delito secundario
function delito_secundario(sel) {
  console.log(sel.value);
  if (sel.value=="OTRO"){
    document.getElementById("delitosec").style.display = "";
  }else{
    document.getElementById("delitosec").style.display="none";
    document.getElementById("OTRO_DELITO_SECUNDARIO1").value = '';
    // document.getElementById("OTRO_DELITO_SECUNDARIO").value = '';
  }
}
// fin de controller de investagacion o proceso penal
////////////////////////////////////////////////////////////////////////////////
// inicio de controller valoracion juridica
// select de valoracion juridica
function valorjuridico(sel){
  if (sel.value == 'SI PROCEDE') {
    document.getElementById('motivo_no_procede').style.display = 'none';
    document.getElementById('art23').style.display = 'none';
    document.getElementById('MOTIVO_NO_PROCEDENCIA').value='';
    document.getElementById('articulo23proc').value='';
  }else if (sel.value == 'NO PROCEDE') {
    document.getElementById('motivo_no_procede').style.display = '';
    document.getElementById('art23').style.display = 'none';
    document.getElementById('articulo23proc').value='';
  }else if (sel.value == 'PARCIALMENTE PROCEDE') {
    document.getElementById('motivo_no_procede').style.display = 'none';
    document.getElementById('art23').style.display = '';
    document.getElementById('MOTIVO_NO_PROCEDENCIA').value='';
  }
}
// fin de controller valoracion juridica
////////////////////////////////////////////////////////////////////////////////
// inicio de controller de mostrar y ocultar segun la información guardada
// select de incapaz mostrar y ocultar
const incapaz = document.getElementById('INCAPAZ').value;
function checkincapaz(){
  if (incapaz == 'SI') {
    document.getElementById('tutor').style.display = '';
  }else if (incapaz == 'NO') {
    document.getElementById('tutor').style.display = 'none';
  }
}
checkincapaz();
// select de domicilio actual mostrar y ocultar
const domicilioactualget = document.getElementById('MOD_DOMICILIO').value;
function checkdomicilioactualget(){
  if (domicilioactualget == 'SI') {
    document.getElementById('mod_reclusorio').style.display = '';
    document.getElementById('criterio_oport').style.display = '';
    document.getElementById('act_estado').style.display = 'none';
    document.getElementById('act_municipio').style.display = 'none';
    document.getElementById('act_localidad').style.display = 'none';
    document.getElementById('act_calle').style.display = 'none';
    document.getElementById('act_cp').style.display = 'none';
  }else if (domicilioactualget == 'NO') {
    document.getElementById('mod_reclusorio').style.display = 'none';
    document.getElementById('criterio_oport').style.display = 'none';
    document.getElementById('act_estado').style.display = '';
    document.getElementById('act_municipio').style.display = '';
    document.getElementById('act_localidad').style.display = '';
    document.getElementById('act_calle').style.display = '';
    document.getElementById('act_cp').style.display = '';
  }
}
checkdomicilioactualget();
// select de domicilio actual mostrar y ocultar
const criteriooportunidadget = document.getElementById('CRITERIO_OPORTUNIDAD').value;
function checkcriteriooportunidadget(){
  if (criteriooportunidadget == 'NO APLICA' || criteriooportunidadget == 'EN ESPERA') {
    document.getElementById('fecha_crit').style.display = 'none';
  }else if (criteriooportunidadget == 'OTORGADO') {
    document.getElementById('fecha_crit').style.display = '';
  }
}
checkcriteriooportunidadget();
// select de delito principal mostrar y ocultar
const delitoprincipalget = document.getElementById('DELITO_PRINCIPAL').value;
function checkdelitoprincipalget(){
  if (delitoprincipalget == 'OTRO') {
    document.getElementById('otherdel').style.display = '';
  }else {
    document.getElementById('otherdel').style.display = 'none';
  }
}
checkdelitoprincipalget();
// select de delito secundario mostrar y ocultar
const delitosecundarioget = document.getElementById('DELITO_SECUNDARIO').value;
function checkdelitosecundarioget(){
  if (delitosecundarioget == 'OTRO') {
    document.getElementById('delitosec').style.display = '';
  }else {
    document.getElementById('delitosec').style.display = 'none';
  }
}
checkdelitosecundarioget();
// select de delito secundario mostrar y ocultar
const valoracionjuridicaget = document.getElementById('RESULTADO_VALORACION_JURIDICA').value;
function checkvaloracionjuridicaget(){
  if (valoracionjuridicaget == 'SI PROCEDE') {
    document.getElementById('motivo_no_procede').style.display = 'none';
    document.getElementById('art23').style.display = 'none';
  }else if (valoracionjuridicaget == 'NO PROCEDE') {
    document.getElementById('motivo_no_procede').style.display = '';
    document.getElementById('art23').style.display = 'none';
  }else if (valoracionjuridicaget == 'PARCIALMENTE PROCEDE') {
    document.getElementById('motivo_no_procede').style.display = 'none';
    document.getElementById('art23').style.display = '';
  }
}
checkvaloracionjuridicaget();
// select de calidad dentro del procesopenal mostrar y ocultar
const calidaprocesopenal = document.getElementById('CALIDAD_PERSONA_PROCEDIMIENTO').value;
function checkcalidaprocesopenal(){
  if (calidaprocesopenal == 'OTROS') {
    document.getElementById('otracalidadproceso').style.display = '';
  }else {
    document.getElementById('otracalidadproceso').style.display = 'none';
  }
}
checkcalidaprocesopenal();
// inicio de controller de mostrar y ocultar segun la información guardada
////////////////////////////////////////////////////////////////////////////////
