function selectmedida(sel) {
      if (sel.value=="ASISTENCIA"){
           divC = document.getElementById("asistencia");
           divC.style.display = "";
           divC = document.getElementById("resguardo");
           divC.style.display="none";
           document.getElementById("MEDIDAS_RESGUARDO").value = '';
           divC = document.getElementById("resguardoxi");
           divC.style.display="none";
           divC = document.getElementById("resguardoxii");
           divC.style.display = "none";
           divC = document.getElementById("otherresguardo");
           divC.style.display = "none";
           document.getElementById("RESGUARDO_XI").value = '';
           document.getElementById("RESGUARDO_XII").value = '';
           document.getElementById("OTRA_MEDIDA_RESGUARDO").value = '';

      }else{
           divC = document.getElementById("resguardo");
           divC.style.display="";
           divC = document.getElementById("asistencia");
           divC.style.display = "none";
           document.getElementById("MEDIDAS_ASISTENCIA").value = '';
           divC = document.getElementById("otherasistencia");
           divC.style.display = "none";
           document.getElementById("OTRA_MEDIDA_ASISTENCIA").value = '';
           // document.getElementById("RESGUARDO_XI").value = '';
           // document.getElementById("RESGUARDO_XII").value = '';
      }
}


function selectmedidares(sel) {
      if (sel.value=="XI. EJECUCION DE MEDIDAS PROCESALES"){
        divC = document.getElementById("otherresguardo");
        divC.style.display="none";
        document.getElementById("OTRA_MEDIDA_RESGUARDO").value = '';
           divC = document.getElementById("resguardoxi");
           divC.style.display = "";
           divC = document.getElementById("resguardoxii");
           divC.style.display="none";
           document.getElementById("RESGUARDO_XII").value = '';
           divC = document.getElementById("otherresguardo");
           divC.style.display = "none";

      }else if (sel.value=="XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS") {
        divC = document.getElementById("otherresguardo");
        divC.style.display="none";
        document.getElementById("OTRA_MEDIDA_RESGUARDO").value = '';
        divC = document.getElementById("resguardoxi");
        divC.style.display="none";
        divC = document.getElementById("resguardoxii");
        divC.style.display = "";
        document.getElementById("RESGUARDO_XI").value = '';
      } else if (sel.value=="XIII. OTRAS MEDIDAS") {
        divC = document.getElementById("otherresguardo");
        divC.style.display = "";
        divC = document.getElementById("resguardoxi");
        divC.style.display="none";
        divC = document.getElementById("resguardoxii");
        divC.style.display="none";
      } else {
        divC = document.getElementById("resguardoxi");
        divC.style.display="none";
        //document.getElementById("RESGUARDO_XI").value = '';
        divC = document.getElementById("resguardoxii");
        divC.style.display = "none";
        //document.getElementById("RESGUARDO_XII").value = '';
        //
        divC = document.getElementById("otherresguardo");
        divC.style.display="none";
        document.getElementById("OTRA_MEDIDA_RESGUARDO").value = '';
      }

}

function changemedidamod(sel) {
      if (sel.value=="SI"){
        divC = document.getElementById("fecha_modificacion_sel1");
        divC.style.display="";
        divC = document.getElementById("fecha_modificacion_sel2");
        divC.style.display="";

      }else if (sel.value=="NO") {
        divC = document.getElementById("fecha_modificacion_sel1");
        divC.style.display="none";
        divC = document.getElementById("fecha_modificacion_sel2");
        divC.style.display="none";
      }
}

function selectother(sel) {
      if (sel.value=="VI. OTRAS"){
           divC = document.getElementById("otherasistencia");
           divC.style.display = "";

      }else{
           divC = document.getElementById("otherasistencia");
           divC.style.display="none";
           document.getElementById("OTRA_MEDIDA_ASISTENCIA").value = '';

      }
}

function radicacionfuenteM(sel) {
      if (sel.value=="OFICIO"){
           divC = document.getElementById("OFICIO_M");
           divC.style.display = "";
           divC = document.getElementById("CORREO_M");
           divC.style.display = "none";
           divC = document.getElementById("EXPEDIENTE_M");
           divC.style.display = "none";
           divC = document.getElementById("OTRO_M");
           divC.style.display = "none";

      }else if (sel.value=="CORREO") {
        divC = document.getElementById("CORREO_M");
        divC.style.display = "";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_M");
        divC.style.display = "none";

      }else if (sel.value=="EXPEDIENTE") {
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "";
        divC = document.getElementById("CORREO_M");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_M");
        divC.style.display = "none";

      }else if (sel.value=="OTRO") {
        divC = document.getElementById("OTRO_M");
        divC.style.display = "";
        divC = document.getElementById("CORREO_M");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";

      }

}


function open2art35(sel) {
      if (sel.value=="CONCLUSION"){
           divC = document.getElementById("CONCLUSION_ART35");
           divC.style.display = "";
           divC = document.getElementById("fecha_cancel_conclu");
           divC.style.display = "";
           divC = document.getElementById("date_concl");
           divC.style.display = "";
           divC = document.getElementById("date_cance");
           divC.style.display = "none";

      }else if (sel.value=="CANCELACION") {
        divC = document.getElementById("CONCLUSION_ART35");
        divC.style.display="none";
        divC = document.getElementById("fecha_cancel_conclu");
        divC.style.display = "";
        divC = document.getElementById("date_cance");
        divC.style.display = "";
        divC = document.getElementById("date_concl");
        divC.style.display = "none";

      }else if (sel.value=="NO APLICA") {
        divC = document.getElementById("CONCLUSION_ART35");
        divC.style.display = "none";
        divC = document.getElementById("fecha_cancel_conclu");
        divC.style.display = "none";

      }
}

function radicacionfuenteM1(sel) {
      if (sel.value=="OFICIO"){
           divC = document.getElementById("OFICIO_M");
           divC.style.display = "";
           divC = document.getElementById("CORREO_M");
           divC.style.display = "none";
           divC = document.getElementById("EXPEDIENTE_M");
           divC.style.display = "none";
           divC = document.getElementById("OTRO_M");
           divC.style.display = "none";

      }else if (sel.value=="CORREO") {
        divC = document.getElementById("CORREO_M");
        divC.style.display = "";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_M");
        divC.style.display = "none";

      }else if (sel.value=="EXPEDIENTE") {
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "";
        divC = document.getElementById("CORREO_M");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_M");
        divC.style.display = "none";

      }else if (sel.value=="OTRO") {
        divC = document.getElementById("OTRO_M");
        divC.style.display = "";
        divC = document.getElementById("CORREO_M");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";

      }

}
// fecha de la medida cuando este ejecutada o cancelada
function fecha_ejecutada(sel) {
      if (sel.value=="EJECUTADA"){
        divC = document.getElementById("ejecucion_cancelacion");
        divC.style.display="";
        divC = document.getElementById("MUNICIPIO_EJECUCION");
        divC.style.display="";
        divC = document.getElementById("fech_inicio");
        divC.style.display="";

        divC = document.getElementById("DIV_CONCLUSION_CANCELACION");
        divC.style.display="";
        divC = document.getElementById("CONCLUSION_ART35");
        divC.style.display="";



        divC = document.getElementById("FECHA_TERMINO");
        divC.style.display="";
        divC = document.getElementById("FECHA_CANCEL");
        divC.style.display="none";

        divC = document.getElementById("MOTIVO");
        divC.style.display="none";



      }else if (sel.value=="EN EJECUCION") {
        divC = document.getElementById("ejecucion_cancelacion");
        divC.style.display="none";
        divC = document.getElementById("MOTIVO");
        divC.style.display="none";

        divC = document.getElementById("FECHA_CANCEL");
        divC.style.display="none";

        divC = document.getElementById("FECHA_TERMINO");
        divC.style.display="none";

        divC = document.getElementById("ejecucion_cancelacion");
        divC.style.display="none";
        divC = document.getElementById("MUNICIPIO_EJECUCION");
        divC.style.display="none";
        divC = document.getElementById("fech_inicio");
        divC.style.display="none";

        divC = document.getElementById("DIV_CONCLUSION_CANCELACION");
        divC.style.display="none";
        // divC = document.getElementById("CONCLUSION_ART35");
        // divC.style.display="none";

        divC = document.getElementById("MUNICIPIO_EJECUCION");
        divC.style.display="";
        divC = document.getElementById("fech_inicio");
        divC.style.display="";

      }else if (sel.value=="CANCELADA") {
        divC = document.getElementById("MUNICIPIO_EJECUCION");
        divC.style.display="";
        divC = document.getElementById("fech_inicio");
        divC.style.display="";


        divC = document.getElementById("DIV_CONCLUSION_CANCELACION");
        divC.style.display="none";
        // divC = document.getElementById("CONCLUSION_ART35");
        // divC.style.display="none";

        //label
        divC = document.getElementById("FECHA_CANCEL");
        divC.style.display="";
        //input
        divC = document.getElementById("ejecucion_cancelacion");
        divC.style.display="";
        divC = document.getElementById("MOTIVO");
        divC.style.display="";


        divC = document.getElementById("FECHA_TERMINO");
        divC.style.display="none";
      }
}

function actualizar_estatus_medida(sel) {
  if (sel.value==="EJECUTADA") {
    divC = document.getElementById("fecha_conclusion");
    divC.style.display="";
    divC = document.getElementById("conclu_cancel");
    divC.style.display="";
    divC = document.getElementById("dat_ejec");
    divC.style.display="";
    divC = document.getElementById("dat_cancel");
    divC.style.display="none";
    divC = document.getElementById("MOTIVO");
    divC.style.display="none";

  }else if (sel.value==="CANCELADA") {
    divC = document.getElementById("municipio_of_execute");
    divC.style.display="none";
    divC = document.getElementById("fecha_conclusion");
    divC.style.display="";
    divC = document.getElementById("dat_ejec");
    divC.style.display="none";
    divC = document.getElementById("dat_cancel");
    divC.style.display="";
    divC = document.getElementById("MOTIVO");
    divC.style.display="";
    divC = document.getElementById("conclu_cancel");
    divC.style.display="none";
  }else if (sel.value === 'EN EJECUCION') {
    divC = document.getElementById("fecha_conclusion");
    divC.style.display="none";
    divC = document.getElementById("MOTIVO");
    divC.style.display="none";
    divC = document.getElementById("conclu_cancel");
    divC.style.display="none";
  }
}

function actualizar_cancel(sel) {
      if (sel.value=="CONCLUSION"){
           divC = document.getElementById("CONCLUSION_ART35");
           divC.style.display = "";
           document.getElementById("OTHER_ART351").value = '';
           document.getElementById("CONCLUSION_ART35").value = 'selecciona una opcion';

      }else if (sel.value=="NO APLICA") {
        divC = document.getElementById("CONCLUSION_ART35");
        divC.style.display="none";
        divC = document.getElementById("OTHERART35");
        divC.style.display="none";
        document.getElementById("CONCLUSION_ART35").value = 'selecciona una opcion';
      }

}

function datesmedidas(sel) {
  if (sel.value == "PROVISIONAL") {
    divC = document.getElementById("date_provisional");
    divC.style.display="";
    divC = document.getElementById("date_definitva");
    divC.style.display="none";
  }else if (sel.value == "DEFINITIVA") {
    divC = document.getElementById("date_provisional");
    divC.style.display="none";
    divC = document.getElementById("date_definitva");
    divC.style.display="";
  }
}

 function act_datedef(sel) {
   if (sel.value == "DEFINITIVA") {
     divC = document.getElementById("act_date_definitiva");
     divC.style.display="";
   }
 }
