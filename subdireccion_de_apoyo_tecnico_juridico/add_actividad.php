<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("./conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
//Si la variable de sesión no existe,
//Se presume que la página aún no se ha actualizado.
if(!isset($_SESSION['already_refreshed'])){
  ////////////////////////////////////////////////////////////////////////////////
  $sentenciar=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
  $resultr = $mysqli->query($sentenciar);
  $rowr=$resultr->fetch_assoc();
  $areauser = $rowr['area'];
  $fecha = date('y/m/d H:i:sa');
  ////////////////////////////////////////////////////////////////////////////////
  $saveiniciosession = "INSERT INTO inicios_sesion(usuario, area, fecha_entrada)
                VALUES ('$name', '$areauser', '$fecha')";
  $res_saveiniciosession = $mysqli->query($saveiniciosession);
  ////////////////////////////////////////////////////////////////////////////////
//Establezca la variable de sesión para que no
//actualice de nuevo.
  $_SESSION['already_refreshed'] = true;
}
$check_actividad = 1;
$_SESSION["check_actividad"] = $check_actividad;
// TRAER EL UMTIMO REGISTRO DE UN TRASLADO
date_default_timezone_set('America/Mexico_City');
$a = date("Y");
$sql="select * from react_actividad where id in (select MAX(id) from react_actividad)";
$result = $mysqli->query($sql);
$mostrar=$result->fetch_assoc();
 $yearactual = $mostrar['year'];
 $id_traslado =$mostrar["id"];
 if ($a === $yearactual){
   $n=$id_traslado;
   $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
   $n_con;
 } else {
   $num_consecutivo = 0;
   $n=$num_consecutivo;
   $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
 }
 $idtrasladounico = $n_con.'-'.$a;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>REGISTRO TRASLADO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/funciones_react.js"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <!-- font-awesome -->
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
  <!-- estilos de diseño add traslados -->
  <link rel="stylesheet" href="../css/react_add_traslados.css">
</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div class="user">
        <?php
        $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];

        if ($genero=='mujer') {
          echo "<img style='text-align:center;' src='../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          // $foto = ../image/user.png;
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>

      <nav class="menu-nav">
        <br><br>
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container">
        <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1>
          <h4 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h4>
        </div>
      </div>
      <div class="">
        <h1 style="text-align:center">REGISTRAR ACTIVIDAD</h1>
        <center>
  <div style="text-align:center;padding:15px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">

    <form method="POST" action="guardar_actividad.php" enctype= "multipart/form-data">
      <!-- Text input-->

       <?php
              $select = "SELECT * FROM react_subdireccion where id = '2'";
              $answer = $mysqli->query($select);
              $valores = $answer->fetch_assoc();
                                 ?>     
       <div class="form-group" >
        <label class="col-md-3 control-label">SUBDIRECCIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="subdireccion" id="subdireccion" type="text" class="form-control" value="<?php echo $valores['subdireccion'];?>" readonly>                         
          </div>
        </div>
      </div>
       <!-- </div> -->

       <div class="form-group">
        <label class="col-md-3 control-label">ACTIVIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
              <select name="idactividad" id="idactividad" class="form-control" required onchange="selectNit(event)">
              <option  disabled selected value="">SELECCIONA ACTIVIDAD</option>
              <?php
              $se = "SELECT * FROM react_actividad_apoyo";
              $answer1 = $mysqli->query($se);
              while ($val = $answer1->fetch_assoc()){
                echo "<option value='".$val['id']."'>".$val['nombre']."</option>";
                              }
                                 ?>   
              </select>   
            </div>          
         </div>
        </div>
      


  <div class="form-group">
        <label class="col-md-3 control-label">FUNCIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
             <input  name="funcion_apoyo" id="funcion_apoyo" value="" class="form-control" type="text"  >
          </div>
        </div>
      </div>  



      <div class="form-group" >
        <label class="col-md-3 control-label">UNIDAD DE MEDIDA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt" ></i></span>
            <input name="unidad_medida" id="unidad_medida" value="" class="form-control" type="text"  >
          </div>
        </div>
      </div>


<div class="form-group">
        <label class="col-md-3 control-label">REPORTE DE METAS</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="reporte_metas" id="reporte_metas" value="" class="form-control" type="text"  >
                   </div>
        </div>
      </div>



<div class="form-group" >
        <label class="col-md-3 control-label">FECHA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>
            <input  name="fecha_actividad" id="fechaactividad" class="form-control" type="date" required>
          </div>
        </div>
      </div>


<div class="form-group">
        <label class="col-md-3 control-label">CANTIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
           <span class="input-group-addon"><i class="fas fa-map-marker-alt" che></i></span>
            <input name="cantidad_actividad" id="cantidad_actividad" value="" class="form-control" type="text"  >
          </div>
        </div>
      </div>


 <div class="form-group" >
        <label class="col-md-3 control-label">CLASIFICACION</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt" che></i></span>
            <input name="clasificacion" id="clasificacion" value="" class="form-control" type="text"  >
          </div>
        </div>
      </div>




<div class="form-group" id="folio_expediente_actividad">
        <label class="col-md-3 control-label">FOLIO DEL EXPEDIENTE</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-folder"></i></span>
            <select class="form-control" name="folio_expediente" id="folio_expediente">
              <option disabled selected value>SELECCIONE EL EXPEDIENTE</option>
                <?php
                    $select1 = "SELECT DISTINCT datospersonales.folioexpediente
                    FROM datospersonales
                    WHERE datospersonales.estatus = 'SUJETO PROTEGIDO'
                    ORDER BY datospersonales.id ASC";
                      $answer1 = $mysqli->query($select1);
                      while($valores1 = $answer1->fetch_assoc()){
                        $result_folio = $valores1['folioexpediente'];
                        echo "<option value='$result_folio'>$result_folio</option>";
                      }
                ?>
            </select>
          </div>
        </div>
      </div>


<div class="form-group" id="id_sujeto_actividad">
        <label class="col-md-3 control-label">ID SUJETO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>
            <select name="id_sujeto" id="id_sujeto" class="form-control">
            </select>
          </div>
        </div>
      </div>


 <div class="form-group">
        <label class="col-md-3 control-label">ID EVIDENCIA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="idevidencia_actividad" id="idevidencia_actividad" class="form-control" type="text" >
          </div>
        </div>
      </div>



 <div class="form-group">
        <label class="col-md-3 control-label">OBSERVACIONES</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-comments"></i></span>
            <textarea name="observaciones_actividad" id="observaciones_actividad" class="form-control" type="text"  rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
          </div>
        </div>
      </div>



 <div class="form-group">
        <label class="col-md-3 control-label">MUNICIPIO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="entidadmunicipio" id="entidadmunicipio" class="form-control" type="text" >
          </div>
        </div>
      </div>

<div class="form-group">
        <label class="col-md-3 control-label">EVIDENCIA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="evidencia" id="evidencia" class="form-control" type="text" >
          </div>
        </div>
      </div>




      <div class="form-group">
        <label class="col-md-3 control-label">KILOMETROS</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="kilometraje" id="kilometraje" class="form-control" type="text" >
          </div>
        </div>
      </div>


   <div class="form-group">
        <label class="col-md-3 control-label">INFORME ANUAL</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="informe_anual" id="informe_anual" class="form-control" type="text" >
          </div>
        </div>
      </div>



 <div class="form-group">
        <label class="col-md-3 control-label">CONSECUTIVO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="consecutivosub" id="consecutivosub" class="form-control" type="text" >
          </div>
        </div>
      </div>



 <div class="form-group">
        <label class="col-md-3 control-label">FECHA ALTA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
            <input name="fecha_alta" id="fecha_alta" class="form-control" type="text" >
          </div>
        </div>
      </div>



<!-- 

<br><br>
     


     





 -->



      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <button type="submit" class="btn btn-success">REGISTRAR <span class="glyphicon glyphicon-ok"></span></button>
        </div>
      </div>
    </form>
  </div>




</center>


      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="menu.php" class="btn-flotante-regresar color-btn-success-gray"> REGRESAR</a>     
  </div>



   <script type="text/javascript">
	$(document).ready(function(){
		$('#folio_expediente').val(1);
		recargarLista();

		$('#folio_expediente').change(function(){
			recargarLista();
		});


	})
</script>


<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"./get_id_sujeto.php",
			data:"folio=" + $('#folio_expediente').val(),
			success:function(r){
				$('#id_sujeto').html(r);
			}
		});
	}
</script>



<script type="text/javascript">

    function selectNit(e) {
      var idfuncion = document.getElementById("idactividad").value;
      
      console.log(idfuncion);
      
      if (idfuncion === '1') {
        document.getElementById("funcion_apoyo").value = "Elaboración y suscripción de convenios";
        document.getElementById("unidad_medida").value = "Convenio";
       
      }else if (idfuncion === '2') {
        document.getElementById("funcion_apoyo").value = "Integración del expediente de protección";
        document.getElementById("unidad_medida").value = "Documento";
       
      }else if (idfuncion === '3') {
        document.getElementById("funcion_apoyo").value = "Diligencias administrativas";
        document.getElementById("unidad_medida").value = "Traslado";
        
      }else if (idfuncion === '4') {
        document.getElementById("funcion_apoyo").value = "Otorgar medidas de asistencia";
        document.getElementById("unidad_medida").value = "Asesoria";
            }
       document.getElementById("reporte_metas").value = "SI";
  }

  </script>



</body>
</html>
