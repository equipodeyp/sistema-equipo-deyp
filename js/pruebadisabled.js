var idsol = document.getElementById('ID_SOLICITUD').value;
function disabledcampos() {
  // console.log(idsol);
  if (idsol !== '') {
    document.getElementById('ID_SOLICITUD').disabled = true;
    document.getElementById('FECHA_SOLICITUD').disabled = true;
    document.getElementById('NOMBRE_AUTORIDAD').disabled = true;
    // document.getElementById('OTHER_AUTORIDAD').disabled = true;
    document.getElementById('NOMBRE_SERVIDOR').disabled = true;
    document.getElementById('PATERNO_SERVIDOR').disabled = true;
    document.getElementById('MATERNO_SERVIDOR').disabled = true;
    document.getElementById('CARGO_SERVIDOR').disabled = true;
    document.getElementById("next").disabled = false;
    // document.getElementById("next2").disabled = false;
  }
}
disabledcampos();

 var delprimary = document.getElementById('DELITO_PRINCIPAL').value;
 function delitoprimary () {
   // console.log(delprimary);
   if (delprimary === 'OTRO') {
     document.getElementById('otherdel').style.display="";
   }
   if (delprimary === '') {
     document.getElementById('opt-delito-principal').text = "SELECCIONE UNA OPCIÓN"
   }
   if (delprimary !== '') {
     document.getElementById('DELITO_PRINCIPAL').disabled = true;
     document.getElementById('OTRO_DELITO_PRINCIPAL').disabled = true;
     document.getElementById('DELITO_SECUNDARIO').disabled =true;
     document.getElementById('OTRO_DELITO_SECUNDARIO').disabled = true;
     document.getElementById('ETAPA_PROCEDIMIENTO').disabled = true;
     document.getElementById('NUC').disabled = true;
     document.getElementById('MUNICIPIO_RADICACION').disabled = true;
     document.getElementById("next3").disabled = false;
   }
 }
 delitoprimary();

 var delsecondary = document.getElementById('DELITO_SECUNDARIO').value;
 function delitosecondary() {
   // console.log(delsecondary);
   if (delsecondary === 'OTRO') {
     document.getElementById('delitosec').style.display = "";
   }
   if (delsecondary === '') {
     document.getElementById('opt-delito-secundario').text = "SELECCIONE UNA OPCIÓN";
   }
 }
 delitosecondary();

 var processetapa = document.getElementById('ETAPA_PROCEDIMIENTO').value;
 function etpprocess () {
   // console.log(processetapa);
   if (processetapa === '') {
     document.getElementById('opt-etapa-proc').text = "SELECCIONE UNA OPCIÓN";
   }
 }
 etpprocess();

 var radmunicipio = document.getElementById('MUNICIPIO_RADICACION').value;
 function municipiorad () {
   // console.log(radmunicipio);
   if (radmunicipio === '') {
     document.getElementById('opt-mun-rad').text = "SELECCIONE UNA OPCIÓN";
   }
 }
 municipiorad();



// input para mencionar otro tipo de calidad dentro del proceso PENAL
  var calpp = document.getElementById('CALIDAD_PERSONA_PROCEDIMIENTO');
  var callpproc = '';
  calpp.addEventListener('change', obtenercalproc);
  function obtenercalproc (e) {
    callpproc = e.target.value;
    // console.log(callpproc);
    if (callpproc === 'OTROS') {
      document.getElementById('otracalproceso').style.display= "";
    }else {
      document.getElementById('otracalproceso').style.display= "none";
    }
  }
  // callpp();
