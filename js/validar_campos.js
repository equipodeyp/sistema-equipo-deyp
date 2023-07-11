jQuery(document).ready(function(){
      // input id de la solicitud
      jQuery("#ID_SOLICITUD").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-/ ]/g, ''));
      });
			// input otra autoridad
      jQuery("#OTHER_AUTORIDAD").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñ ]/g, ''));
			});
      // input nombre_servidor
      jQuery("#NOMBRE_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input appellido paterno del servidor
      jQuery("#PATERNO_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input apelliod materno del servidor
      jQuery("#MATERNO_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input cargo del servidor
      jQuery("#CARGO_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input de nombre de la persona
      jQuery("#NOMBRE_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input apellido paterno de la persona
      jQuery("#PATERNO_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input apellido materno de la persona
      jQuery("#MATERNO_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input edad de la persona
      jQuery("#EDAD_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      //input nacionalidad de la persona
      jQuery("#NACIONALIDAD_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z]/g, ''));
			});
      //input curp de la persona
      jQuery("#CURP_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9Ñ-ñ]/g, ''));
			});
      //input rfc de lam persona
      jQuery("#RFC_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9Ñ-ñ]/g, ''));
			});
      //input alias de la persona
      jQuery("#ALIAS_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9Ñ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input ocupacion de la persona
      jQuery("#OCUPACION_PERSONA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ  ]/g, ''));
			});
      //input telefono fijo de la persona
      jQuery("#TELEFONO_FIJO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      //input telefono celular de la persona
      jQuery("#TELEFONO_CELULAR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      //input calle del domicilio de la persona
      jQuery("#CALLE").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9Ñ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input del codigo postal del domicilio de la persona
			jQuery("#CP").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      // input nombre del tutor de la persona
      jQuery("#TUTOR_NOMBRE").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input apellido paterno del tutor de la persona
      jQuery("#TUTOR_PATERNO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input del apellido materno de la persona
      jQuery("#TUTOR_MATERNO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input de otro delito principal del proceso penal
      jQuery("#OTRO_DELITO_PRINCIPAL").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input de otro delito secundario del proceso penal
      jQuery("#OTRO_DELITO_SECUNDARIO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input de etapa de procedimiento del proceso penal
      jQuery("#ETAPA_PROCEDIMIENTO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input del numero unico de carpeta del proceso penal
      jQuery("#NUC").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-/]/g, ''));
			});
      //input del convenio de entendimiento de la INCORPORACION

		});

    function openOther(sel) {
          if (sel.value=="OTRO"){
               divC = document.getElementById("other");
               divC.style.display = "";
               document.getElementById("OTHER_AUTORIDAD").value = '';
               document.getElementById("OTHER_AUTORIDAD1").value = '';

          }else{

               divC = document.getElementById("other");
               divC.style.display="none";

          }
    }

    function otherdelito(sel) {
          if (sel.value=="OTRO"){
               divD = document.getElementById("otherdel");
               divD.style.display = "";

          }else{
               divD = document.getElementById("otherdel");
               divD.style.display="none";
               document.getElementById("OTRO_DELITO_PRINCIPAL1").value = '';
               document.getElementById("OTRO_DELITO_PRINCIPAL").value = '';
          }
    }

    function delito_secundario(sel) {
          if (sel.value=="OTRO"){
               divDS = document.getElementById("delitosec");
               divDS.style.display = "";

          }else{

               divDS = document.getElementById("delitosec");
               divDS.style.display="none";
               document.getElementById("OTRO_DELITO_SECUNDARIO1").value = '';
               document.getElementById("OTRO_DELITO_SECUNDARIO").value = '';
          }
    }

    function pagoOnChange(sel) {
          if (sel.value=="NO"){
               divC = document.getElementById("tutor");
               divC.style.display = "none";

          }else{

               divC = document.getElementById("tutor");
               divC.style.display="";
          }
    }

    function validarExt(){
        var archivoInput = document.getElementById('archivoInput');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.PNG|.png|.jpg|.JPG|.JPEG|.jpeg)$/i;
        if(!extPermitidas.exec(archivoRuta)){
            alert('Asegurese de haber seleccionado ua imagen');
            archivoInput.value = '';
            return false;
        }

        else
        {
            //PRevio del PDF
            if (archivoInput.files && archivoInput.files[0])
            {
                var visor = new FileReader();
                visor.onload = function(e)
                {
                    document.getElementById('visorArchivo').innerHTML =
                    '<embed src="'+e.target.result+'" width="300" height="175" />';
                };
                visor.readAsDataURL(archivoInput.files[0]);
            }
        }
    }
    // PRIMER FUNCION PARA OBTENER ESTADO-MUNICIPIO-LOCALIDAD
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
    // FIN DE ESTADO-MUNICIPIO-LOCALIDAD
    // SEGUNDO ESTADO-MUNICIPIO-LOCALIDAD
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

    // tercer ESTADO-MUNICIPIO-LOCALIDAD
    $(document).ready(function(){
      $("#estado_suj").change(function () {

        $('#cbx_localidad11').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#estado_suj option:selected").each(function () {
          id_estado = $(this).val();
          $.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
            $("#municipio_suj").html(data);
          });
        });
      })
    });

    $(document).ready(function(){
      $("#municipio_suj").change(function () {
        $("#municipio_suj option:selected").each(function () {
          id_municipio = $(this).val();
          $.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
            $("#cbx_localidad11").html(data);
          });
        });
      })
    });


    function radicacionfuente(sel) {
          if (sel.value=="OFICIO"){
               divC = document.getElementById("OFICIO");
               divC.style.display = "";
               document.getElementById("CORREO").value = "";
               document.getElementById("EXPEDIENTE").value = "";
               document.getElementById("OTRO").value = "";
               divC = document.getElementById("CORREO");
               divC.style.display = "none";
               divC = document.getElementById("EXPEDIENTE");
               divC.style.display = "none";
               divC = document.getElementById("OTRO");
               divC.style.display = "none";

          }else if (sel.value=="CORREO") {
            divC = document.getElementById("CORREO");
            divC.style.display = "";
            divC = document.getElementById("OFICIO");
            divC.style.display = "none";
            divC = document.getElementById("EXPEDIENTE");
            divC.style.display = "none";
            divC = document.getElementById("OTRO");
            divC.style.display = "none";

          }else if (sel.value=="EXPEDIENTE") {
            divC = document.getElementById("EXPEDIENTE");
            divC.style.display = "";
            divC = document.getElementById("CORREO");
            divC.style.display = "none";
            divC = document.getElementById("OFICIO");
            divC.style.display = "none";
            divC = document.getElementById("OTRO");
            divC.style.display = "none";

          }else if (sel.value=="OTRO") {
            divC = document.getElementById("OTRO");
            divC.style.display = "";
            divC = document.getElementById("CORREO");
            divC.style.display = "none";
            divC = document.getElementById("EXPEDIENTE");
            divC.style.display = "none";
            divC = document.getElementById("OFICIO");
            divC.style.display = "none";

          }

    }



    function openart35(sel) {
          if (sel.value=="CONCLUSION"){
               divC = document.getElementById("CONCLUSION_ART35");
               divC.style.display = "";
               divC = document.getElementById("OTHERART35");
               divC.style.display="none";
               document.getElementById("CONCLUSION_ART35z").value = '';
               document.getElementById("CONCLUSION_ART351").value = '';



          }else{

               divC = document.getElementById("CONCLUSION_ART35");
               divC.style.display="none";
               divC = document.getElementById("OTHERART35");
               divC.style.display="none";
               document.getElementById("CONCLUSION_ART35").value = '';
               document.getElementById("CONCLUSION_ART351").value = '';
          }
    }

    function otherart35(sel) {
          if (sel.value=="IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || sel.value=="OTRO"){
               divC = document.getElementById("OTHERART35");
               divC.style.display = "";
               document.getElementById("OTHER_ART35").value = '';
               //

          }else{

               divC = document.getElementById("OTHERART35");
               divC.style.display="none";
          }
    }


    function showInp(){
      getSelectValue = document.getElementById("FUENTE").value;
      if(getSelectValue=="OFICIO"){
        document.getElementById("OFICIO").style.display = "inline-block";
        document.getElementById("OFICIO1").value = '';
        document.getElementById("CORREO").style.display = "none";
        document.getElementById("EXPEDIENTE").style.display = "none";
        document.getElementById("OTRO").style.display = "none";
      }else if(getSelectValue=="CORREO"){
        document.getElementById("OFICIO").style.display = "none";
        document.getElementById("CORREO").style.display = "inline-block";
        document.getElementById("CORREO1").value = '';
        document.getElementById("EXPEDIENTE").style.display = "none";
        document.getElementById("OTRO").style.display = "none";
      }else if(getSelectValue=="EXPEDIENTE"){
        document.getElementById("OFICIO").style.display = "none";
        document.getElementById("CORREO").style.display = "none";
        document.getElementById("EXPEDIENTE").style.display = "inline-block";
        document.getElementById("EXPEDIENTE1").value = '';
        document.getElementById("OTRO").style.display = "none";
      }else if(getSelectValue=="OTRO"){
        document.getElementById("OFICIO").style.display = "none";
        document.getElementById("CORREO").style.display = "none";
        document.getElementById("EXPEDIENTE").style.display = "none";
        document.getElementById("OTRO").style.display = "inline-block";
        document.getElementById("OTRO1").value = '';
      }
    }

    function OTHERPAIS(sel) {
          if (sel.value=="33"){
               divC = document.getElementById("other_pais");
               divC.style.display = "";
               divC = document.getElementById("municipio");
               divC.style.display = "none";


          }else{
            divC = document.getElementById("other_pais");
            divC.style.display = "none";
            divC = document.getElementById("municipio");
            divC.style.display = "";

          }
    }

// domicilio ACTUAL
function domicilioactual(sel) {
      if (sel.value=="SI"){
        divC = document.getElementById("domestado");
        divC.style.display="none";
        divC = document.getElementById("dommunicipio");
        divC.style.display="none";
        divC = document.getElementById("domlocalidad");
        divC.style.display="none";
        divC = document.getElementById("domcalle");
        divC.style.display="none";
        divC = document.getElementById("domcp");
        divC.style.display="none";
        divC = document.getElementById("reclusorio");
        divC.style.display="";
        divC = document.getElementById("criterio_oport");
        divC.style.display="";
      }else{
           divC = document.getElementById("reclusorio");
           divC.style.display="none";
           divC = document.getElementById("criterio_oport");
           divC.style.display="none";
           divC = document.getElementById("domestado");
           divC.style.display="";
           divC = document.getElementById("dommunicipio");
           divC.style.display="";
           divC = document.getElementById("domlocalidad");
           divC.style.display="";
           divC = document.getElementById("domcalle");
           divC.style.display="";
           divC = document.getElementById("domcp");
           divC.style.display="";
           divC = document.getElementById("fecha_crit");
           divC.style.display="none";
      }
}
// modificacion del domicilio ACTUAL
function mod_domicilioactual(sel) {
      if (sel.value=="SI"){
        divC = document.getElementById("mod_reclusorio");
        divC.style.display="";
        divC = document.getElementById("act_estado");
        divC.style.display="none";
        divC = document.getElementById("act_municipio");
        divC.style.display="none";
        divC = document.getElementById("act_localidad");
        divC.style.display="none";
        divC = document.getElementById("act_calle");
        divC.style.display="none";
        divC = document.getElementById("act_cp");
        divC.style.display="none";
        divC = document.getElementById("mod_reclusorio_s");
        divC.style.display="none";
        divC = document.getElementById("dir_reclusorio");
        divC.style.display="none";
      }else if (sel.value=='NO') {
        divC = document.getElementById("act_estado");
        divC.style.display="";
        divC = document.getElementById("act_municipio");
        divC.style.display="";
        divC = document.getElementById("act_localidad");
        divC.style.display="";
        divC = document.getElementById("act_calle");
        divC.style.display="";
        divC = document.getElementById("act_cp");
        divC.style.display="";
        divC = document.getElementById("mod_reclusorio");
        divC.style.display="none";
        divC = document.getElementById("estado_s");
        divC.style.display="none";
        divC = document.getElementById("municipio_s");
        divC.style.display="none";
        divC = document.getElementById("localidad_s");
        divC.style.display="none";
        divC = document.getElementById("calle_s");
        divC.style.display="none";
        divC = document.getElementById("cp_s");
        divC.style.display="none";
        divC = document.getElementById("mod_reclusorio_s");
        divC.style.display="none";
        divC = document.getElementById("dir_reclusorio");
        divC.style.display="none";
      }
}


var ConclusioCancelacion = document.getElementById('CONCLUSION_CANCELACION').value;

      if (ConclusioCancelacion === "CONCLUSION"){


        document.getElementById("CONCLUSION_ART35z").disabled = true;
        document.getElementById("FECHA_DESINCORPORACION_UNO").disabled = true;


      }
      else {
        document.getElementById("FECHA_DESINCORPORACION_UNO").disabled = true;
      }

function fecha_criterio(sel){
  if (sel.value === "OTORGADO") {
    divC = document.getElementById("fecha_crit");
    divC.style.display="";
  }else {
    divC = document.getElementById("fecha_crit");
    divC.style.display="none";
  }
}
