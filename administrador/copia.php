
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
  		<link href="../css/bootstrap-theme.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
      <link href="../css/CSSDEMASCARA1BASE.css" rel="stylesheet">
  		<script src="../js/jquery.dataTables.min.js"></script>
  		<script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" href="../css/expediente.css">
    	<link rel="stylesheet" href="../css/font-awesome.css">
    	<link rel="stylesheet" href="../css/cli.css">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script src="../js/expediente.js"></script>
      <script src="../js/solicitud.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="../css/cli.css">
<link rel="stylesheet" href="../css/solicitud.css">
</head>
<body >
<div class="contenedor">
  <div class="sidebar ancho">
    <div class="logo text-warning">
    </div>
    <div class="user">
      <img src="../image/USER.jpg" alt="" width="100" height="100">
    <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
    </div>
    <nav class="menu-nav">
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
        <img src="../image/ups.png" alt="" width="1400" height="150">
    </div>

  <div class="contenedor">
      <form class="container well form-horizontal" method="POST" action="save_persona.php?folio=<?php echo $fol_exp; ?>" enctype= "multipart/form-data">
        <div id="verificador_edad">
        	<p>REGISTRO DE LAS MEDIDAS</p>
        	<div class="content">
            <div class="container">
              <div class="demo-headline">

                <footer>
                  <div class="row">
                    <div class="col">

            <hr class="mb-4">
            <div class="row">
            <h4 class="col-md-12 text-left mb-4">Datos del sujeto incorporado</h4>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3 validar"><label for="SIGLAS DE LA UNIDAD">ID EXPEDIENTE<span class=
            "required"></span></label> <input class="form-control" id="ID EXPEDIENTE" name=
            "ID EXPEDIENTE" placeholder="" required="" type="text" value="<?php echo $fol_exp; ?>" disabled></div>

            <div class="col-md-6 mb-3 validar"><label for="SIGLAS DE LA UNIDAD">NOMBRE SUJETO PROTEGIDO<span class=
            "required"></span></label> <input class="form-control" id="ID_SOLICITUD" name=
            "ID_SOLICITUD" placeholder="" required="" type="text" value="<?php echo $ro_persona['nombrepersona']; ?>" disabled></div>

            <div class="col-md-6 mb-3 validar"><label for="SIGLAS DE LA UNIDAD">APELLIDO_PATERNO<span class=
            "required"></span></label> <input class="form-control" id="APELLIDO_PATERNO" name=
            "APELLIDO_PATERNO" placeholder="" required="" type="text" value="<?php echo $ro_persona['paternopersona']; ?>" disabled></div>

            <div class="col-md-6 mb-3 validar"><label for="SIGLAS DE LA UNIDAD">APELLIDO_MATERNO<span class=
            "required"></span></label> <input class="form-control" id="APELLIDO_MATERNO" name=
            "APELLIDO_MATERNO" placeholder="" required="" type="text" value="<?php echo $ro_persona['maternopersona']; ?>" disabled></div>


            <div class="col-md-6 mb-3 validar">
              <label for="CALIDAD_DEL_SUJETO">CALIDAD_DEL_SUJETO<span class="required"></span></label>
              <select class="form-control" id="CALIDAD_DEL_SUJETO" name="CALIDAD_DEL_SUJETO" disabled>
  							<option value=""><?php echo $ro_persona['calidadpersona']; ?></option>
  							<?php
  							$select = "SELECT * FROM calidadpersona";
  							$answer = $mysqli->query($select);
  							while($valores = $answer->fetch_assoc()){
  							 echo "<option value='".$valores['id']."'>".$valores['nombre']."</option>";
  						 }
  						 ?>
  						</select>
            </div>



            <hr class="mb-4">
            <div class="row">

            </div>
            <div id="cabecera">
      				<div class="row">
      					<h3 style="text-align:center">MEDIDAS</h3>
      				</div>
      		  </div>
            <div id="contenido">
      		  	<table class="table table-striped table-bordered ">
      		  		<thead >
      		  			<th>ID</th>
      		  			<th>TIPO DE MEDIDA</th>
      		  			<th>CLASIFICACION MEDIDA</th>
      		        <th>ESTATUS MEDIDA</th>
      		  			<th>MUNICIPIO</th>
      		  			<th>FECHA INICIO</th>
      		  			<th> <a href="registro_medida.php?folio=<?php echo $fol_exp; ?>"> <button type="button" class="btn btn-info">Nueva Medida</button> </a> </th>
      		  		</thead>


      		  		<?php

      		      $tabla="SELECT * FROM datospersonales WHERE folioexpediente ='$fol_exp'";

      		       $var_resultado = $mysqli->query($tabla);

      		      while ($var_fila=$var_resultado->fetch_array())
      		      {
      		        echo "<tr>";
      		          echo "<td>"; echo $var_fila['id']; echo "</td>";
      		          echo "<td>"; echo $var_fila['nombrepersona']; echo "</td>";
      		          echo "<td>"; echo $var_fila['paternopersona']; echo "</td>";
      		          echo "<td>"; echo $var_fila['maternopersona']; echo "</td>";
      		          echo "<td>"; echo $var_fila['edadpersona']; echo "</td>";
      		          echo "<td>"; echo $var_fila['telefonocelular']; echo "</td>";
      		          echo "<td>  <a href='modif_prod1.php?no=".$var_fila['id']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";

      		        echo "</tr>";
      		      }

      		      ?>
      		  	</table>
      		  </div>

      			<div id="footer">

      		  	</div>


            <div class="col-md-6 mb-3 validar"><label for="NUMERO_MEDIDA_OTROGADA">NUMERO_MEDIDA_OTROGADA<span class="required"></span></label>
            <input class="form-control" id="docIdent" name="NUMERO_MEDIDA_OTROGADA" placeholder=""
            required="" type="number"></div>

            <div class="col-md-6 mb-3 validar"><label for="TIPO DE MEDIDA">TIPO DE MEDIDA
                <span class="required"></span></label> <select class=
                "custom-select d-block w-100" id="SEDE" name="TIPO DE MEDIDA"
                required="">
                <option value="blank"></option>
                <option value="PROVISIONAL">PROVISIONAL</option>
                <option value="DICTAMINADA">DICTAMINADA</option>
                </select>
            </div>

            <div class="col-md-6 mb-3 validar"><label for="CLASIFICACION_MEDIDA">CLASIFICACION_MEDIDA
                <span class="required"></span></label> <select class=
                "custom-select d-block w-100" id="SEDE" name="CLASIFICACION_MEDIDA"
                required="">
                <option value="blank"></option>
                <option value="ASITENCIA">ASITENCIA</option>
                <option value="RESGUARDO">RESGUARDO</option>
                </select>
            </div>


            <div class="col-md-6 mb-3 validar"><label for="MEDIDAS_ASITENCIA">MEDIDAS_ASITENCIA
                <span class="required"></span></label> <select class=
                "custom-select d-block w-100" id="MEDIDAS_ASITENCIA" name="ESTADO_MEDIDA"
                required="">
                <option value="blank"></option>
                <option value="TRATAMIENTO PSICOLOGICO">TRATAMIENTO PSICOLOGICO</option>
                <option value="TRATAMIENTO MEDICO">TRATAMIENTO MEDICO</option>
                <option value="TRATAMIENTO SANITARIO">TRATAMIENTO SANITARIO</option>
                <option value="II ASESORAMIENTO JURIDICO GRATUITO">II ASESORAMIENTO JURIDICO</option>
                <option value="III GESTION DE TRAMITES">III GESTION DE TRAMITES</option>
                <option value="IV AYUDA DE SERVICIOS ">IV AYUDA DE SERVICIOS </option>
                <option value="V APOYO ECONOMICO">V APOYO ECONOMICO</option>
                <option value="VI OTRAS">VI OTRAS</option>
                </select>
            </div>

            <div class="col-md-6 mb-3 validar"><label for="MEDIDAS_ASITENCIA">MEDIDAS_RESGUARDO
                <span class="required"></span></label> <select class=
                "custom-select d-block w-100" id="MEDIDAS_RESGUARDO" name="MEDIDAS_RESGUARDO"
                required="">
                <option value="blank"></option>
                <option value="I SALVAGUARDA DE LA INTEGRIDAD PERSONAL">I SALVAGUARDA DE LA INTEGRIDAD PERSONAL</option>
                <option value="II VIGILANCIA">II VIGILANCIA</option>
                <option value="III TRASLADO DEL SUJETO">III TRASLADO DEL SUJETO</option>
                <option value="IV CUSTODIA POLICIAL O DOMICILIARIA">IV CUSTODIA POLICIAL O DOMICILIARIA</option>
                <option value="V REUBICACION">V REUBICACION</option>
                <option value="VI MECANISMOS DE COMUNICACION INMEDIATA">VI MECANISMOS DE COMUNICACION INMEDIATA</option>
                <option value="VII CAMBIO DE NUMERO DE TELEFONO">VII CAMBIO DE NUMERO DE TELEFONO</option>
                <option value="VI OTRAS">VI OTRAS</option>
                <option value="VIII ALOJAMIENTO TEMPORAL">VIII ALOJAMIENTO TEMPORAL</option>
                <option value="VI OTRAS">VI OTRAS</option>
                <option value="IX CAPACITACION DE MEDIDAS">IX CAPACITACION DE MEDIDAS</option>
                <option value="X NUEVA IDENTIDAD DEL SUJETO">X NUEVA IDENTIDAD DEL SUJETO</option>
                <option value="XI RESERVA DE LA IDENTIDAD">XI RESERVA DE LA IDENTIDAD</option>
                <option value="XII SEPARAR DE LA PROBLACION GERAL O TRASLADAR A OTRO CENTRO PENITENCIARIO">XII SEPARAR DE LA PROBLACION GERAL O TRASLADAR A OTRO CENTRO PENITENCIARIO</option>
                <option value="V APOYO ECONOMICO">V APOYO ECONOMICO</option>
                <option value="VI OTRAS">XIII OTRAS QUE PROTEGAN LA VIDA E INTEGRIDAD</option>
                </select>
            </div>

            <div class="col-md-6 mb-3 validar"><label for="INCISO MEDIDAS DE RESGUARDO XI y XII">INCISO_MEDIDAS_RESGUARDO_XI_XII
                <span class="required"></span></label> <select class=
                "custom-select d-block w-100" id="INCISO MEDIDAS DE RESGUARDO XI y XII" name="INCISO MEDIDAS DE RESGUARDO XI y XII"
                required="">
                <option value="blank"></option>
                <option value="XI A RESERVA DE LA IDENTIDAD">XI A RESERVA DE LA IDENTIDAD</option>
                <option value="XI B IMPOSIBILITAR LA IDENTIFICACION">XI B IMPOSIBILITAR LA IDENTIFICACION</option>
                <option value="XI C MECANISMOS TECNOLOGICOS">XI C MECANISMOS TECNOLOGICOS</option>
                <option value="XI D DOMICILIAR EN LA UNIDAD">XI D DOMICILIAR EN LA UNIDAD</option>
                <option value="XI E OTRAS QUE GARANTICEN LA SEGURIDAD">XI E OTRAS QUE GARANTICEN LA SEGURIDAD</option>
                <option value="XII A SEPARAR DE LA POBLACION GENERAL DE LA PRISION">XII A SEPARAR DE LA POBLACION GENERAL DE LA PRISION</option>
                <option value="XII B TRASLADO A OTRO CENTRO PENITENCIARIO">XII B TRASLADO A OTRO CENTRO PENITENCIARIO</option>
                <option value="XII C OTRAS QUE GARANTICEN LA PROTECCION">XII C OTRAS QUE GARANTICEN LA PROTECCION</option>
                </select>
            </div>

            <div class="col-md-6 mb-3 validar"><label for="AÑO">INICIO_EJECUCION_MEDIDA<span class=
            "required"></span></label> <input class="form-control" id="INICIO_EJECUCION_MEDIDA" name=
            "INICIO_EJECUCION_MEDIDA" placeholder="" required="" type="date"></div>

            <div class="col-md-6 mb-3 validar"><label for="AÑO">FECHA_ACTUALIZACION_MEDIDA<span class=
            "required"></span></label> <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA" name=
            "FECHA_ACTUALIZACION_MEDIDA" placeholder="" required="" type="date"></div>

            <div class="col-md-6 mb-3 validar"><label for="ESTADO_MEDIDA">ESTATUS_MEDIDA
                <span class="required"></span></label> <select class=
                "custom-select d-block w-100" id="CALIDAD_PERSONA" name="ESTATUS_MEDIDA"
                required="">
                <option value="blank"></option>
                <option value="EJECUCION">EN EJECUCION</option>
                <option value="TERMINADA">REALIZADA</option>
                <option value="CONCLUIDA">CONCLUIDA</option>
                </select>
            </div>

            <div class="col-md-6 mb-3 validar"><label for="MUNICIPIO_PERSONA">MUNIPIO_EJECUCION_MEDIDA
            <span class="required"></span></label> <select class=
            "custom-select d-block w-100" id="MUNIPIO_EJECUCION_MEDIDA" name="MUNIPIO_EJECUCION_MEDIDA"
            required="">
                <option value="blank"></option>
                          <option value="ACAMBAY">ACAMBAY</option>
                          <option value="ACOLMAN">ACOLMAN</option>
                          <option value="ACOLMAN">ACOLMAN</option>
                          <option value="ALMOLOYA DE ALQUISIRAS">ALMOLOYA DE ALQUISIRAS</option>
                          <option value="ALMOLOYA DE JUAREZ">ALMOLOYA DE JUAREZ</option>
                          <option value="ALMOLOYA DEL RIO">ALMOLOYA DEL RIO</option>
                          <option value="AMANALCO">AMANALCO</option>
                          <option value="AMATEPEC">AMATEPEC</option>
                          <option value="AMECAMECA">AMECAMECA</option>
                          <option value="APAXCO">APAXCO</option>
                          <option value="ATENCO">ATENCO</option>
                          <option value="ATIZAPAN">ATIZAPAN</option>
                          <option value="ATIZAPAN DE ZARAGOZA">ATIZAPAN DE ZARAGOZA</option>
                          <option value="ATLACOMULCO">ATLACOMULCO</option>
                          <option value="ATLAUTLA">ATLAUTLA</option>
                          <option value="AXAPUSCO">AXAPUSCO</option>
                          <option value="AYAPANGO">AYAPANGO</option>
                          <option value="CALIMAYA">CALIMAYA</option>
                          <option value="CAPULHUAC">CAPULHUAC</option>
                          <option value="CHALCO">CHALCO</option>
                          <option value="CHAPA DE MOTA">CHAPA DE MOTA</option>
                          <option value="CHAPULTEPEC">CHAPULTEPEC</option>
                          <option value="CHIAUTLA">CHIAUTLA</option>
                          <option value="CHICOLOAPAN">CHICOLOAPAN</option>
                          <option value="CHICONCUAC">CHICONCUAC</option>
                          <option value="CHIMALHUACAN">CHIMALHUACAN</option>
                          <option value="COACALCO DE BERRIOZABAL">COACALCO DE BERRIOZABAL</option>
                          <option value="COATEPEC HARINAS">COATEPEC HARINAS</option>
                          <option value="COCOTITLAN">COCOTITLAN</option>
                          <option value="COYOTEPEC">COYOTEPEC</option>
                          <option value="CUAUTITLAN">CUAUTITLAN</option>
                          <option value="CUAUTITLAN IZCALLI">CUAUTITLAN IZCALLI</option>
                          <option value="DONATO GUERRA">DONATO GUERRA</option>
                          <option value="ECATEPEC DE MORELOS">ECATEPEC DE MORELOS</option>
                          <option value="ECATZINGO">ECATZINGO</option>
                          <option value="EL ORO">EL ORO</option>
                          <option value="HUEHUETOCA">HUEHUETOCA</option>
                          <option value="HUEYPOXTLA">HUEYPOXTLA</option>
                          <option value="HUIXQUILUCAN">HUIXQUILUCAN</option>
                          <option value="ISIDRO FABELA">ISIDRO FABELA</option>
                          <option value="IXTAPALUCA">IXTAPALUCA</option>
                          <option value="IXTAPAN DE LA SAL">IXTAPAN DE LA SAL</option>
                          <option value="IXTAPAN DEL ORO">IXTAPAN DEL ORO</option>
                          <option value="IXTLAHUACA">IXTLAHUACA</option>
                          <option value="JALTENCO">JALTENCO</option>
                          <option value="JILOTEPEC">JILOTEPEC</option>
                          <option value="JILOTZINGO">JILOTZINGO</option>
                          <option value="JIQUIPILCO">JIQUIPILCO</option>
                          <option value="JOCOTITLAN">JOCOTITLAN</option>
                          <option value="JOQUICINGO">JOQUICINGO</option>
                          <option value="JUCHITEPEC">JUCHITEPEC</option>
                          <option value="LA PAZ">LA PAZ</option>
                          <option value="LERMA">LERMA</option>
                          <option value="LUVIANOS">LUVIANOS</option>
                          <option value="MALINALCO">MALINALCO</option>
                          <option value="MELCHOR OCAMPO">MELCHOR OCAMPO</option>
                          <option value="METEPEC">METEPEC</option>
                          <option value="MEXICALTZINGO">MEXICALTZINGO</option>
                          <option value="MORELOS">MORELOS</option>
                          <option value="NAUCALPAN DE JUAREZ">NAUCALPAN DE JUAREZ</option>
                          <option value="NEXTLALPAN">NEXTLALPAN</option>
                          <option value="NEZAHUALCOYOTL">NEZAHUALCOYOTL</option>
                          <option value="NICOLAS ROMERO">NICOLAS ROMERO</option>
                          <option value="NOPALTEPEC">NOPALTEPEC</option>
                          <option value="OCOYOACAC">OCOYOACAC</option>
                          <option value="OCUILAN">OCUILAN</option>
                          <option value="OTUMBA">OTUMBA</option>
                          <option value="OTZOLOAPAN">OTZOLOAPAN</option>
                          <option value="OTZOLOTEPEC">OTZOLOTEPEC</option>
                          <option value="PAPALOTLA">PAPALOTLA</option>
                          <option value="POLOTITLAN">POLOTITLAN</option>
                          <option value="RAYON">RAYON</option>
                          <option value="SAN ANTONIO LA ISLA">SAN ANTONIO LA ISLA</option>
                          <option value="SAN FELIPE DEL PROGRESO">SAN FELIPE DEL PROGRESO</option>
                          <option value="SAN JOSE DEL RINCON">SAN JOSE DEL RINCON</option>
                          <option value="SAN MARTIN DE LAS PIRAMIDES">SAN MARTIN DE LAS PIRAMIDES</option>
                          <option value="SAN MATEO ATENCO">SAN MATEO ATENCO</option>
                          <option value="SAN SIMON DE GUERRERO">SAN SIMON DE GUERRERO</option>
                          <option value="SANTO TOMAS">SANTO TOMAS</option>
                          <option value="SOYANIQUILPAN DE JUAREZ">SOYANIQUILPAN DE JUAREZ</option>
                          <option value="SULTEPEC">SULTEPEC</option>
                          <option value="TECAMAC">TECAMAC</option>
                          <option value="TEJUPILCO">TEJUPILCO</option>
                          <option value="TEMAMATLA">TEMAMATLA</option>
                          <option value="TEMASCALAPA">TEMASCALAPA</option>
                          <option value="TEMASCALCINGO">TEMASCALCINGO</option>
                          <option value="QUINTANA ROO">QUINTANA ROO</option>
                          <option value="TEMASCALCINGO">TEMASCALCINGO</option>
                          <option value="TEMASCALTEPEC">TEMASCALTEPEC</option>
                          <option value="TEMOAYA">TEMOAYA</option>
                          <option value="TENANCINGO">TENANCINGO</option>
                          <option value="TENANGO DEL AIRE">TENANGO DEL AIRE</option>
                          <option value="TENANGO DEL VALLE">TENANGO DEL VALLE</option>
                          <option value="TEOLOYUCAN">TEOLOYUCAN</option>
                          <option value="TEOTIHUACAN">TEOTIHUACAN</option>
                          <option value="TEPETLAOXTOC">TEPETLAOXTOC</option>
                          <option value="TEPETLIXPA">TEPETLIXPA</option>
                          <option value="TEPOTZOTLAN">TEPOTZOTLAN</option>
                          <option value="TEQUIXQUIAC">TEQUIXQUIAC</option>
                          <option value="TEXCALTITLAN">TEXCALTITLAN</option>
                          <option value="TEXCALYACAC">TEXCALYACAC</option>
                          <option value="TEXCOCO">TEXCOCO</option>
                          <option value="TEZOYUCA">TEZOYUCA</option>
                          <option value="TIANGUISTENCO">TIANGUISTENCO</option>
                          <option value="TIMILPAN">TIMILPAN</option>
                          <option value="TLALMANALCO">TLALMANALCO</option>
                          <option value="TLALNEPANTLA DE BAZ">TLALNEPANTLA DE BAZ</option>
                          <option value="TLATLAYA">TLATLAYA</option>
                          <option value="TOLUCA">TOLUCA</option>
                          <option value="TONANITLA">TONANITLA</option>
                          <option value="TONATICO">TONATICO</option>
                          <option value="TULTEPEC">TULTEPEC</option>
                          <option value="TULTITLAN">TULTITLAN</option>
                          <option value="VALLE DE BRAVO">VALLE DE BRAVO</option>
                          <option value="VALLE DE CHALCO SOLIDARIDAD">VALLE DE CHALCO SOLIDARIDAD</option>
                          <option value="VILLA DE ALLENDE">VILLA DE ALLENDE</option>
                          <option value="VILLA DEL CARBON">VILLA DEL CARBON</option>
                          <option value="VILLA GUERRERO">VILLA GUERRERO</option>
                          <option value="VILLA VICTORIA">VILLA VICTORIA</option>
                          <option value="XALATLACO">XALATLACO</option>
                          <option value="XONACATLAN">XONACATLAN</option>
                          <option value="ZACAZONAPAN">ZACAZONAPAN</option>
                          <option value="ZACUALPAN">ZACUALPAN</option>
                          <option value="ZINACANTEPEC">ZINACANTEPEC</option>
                          <option value="ZUMPAHUACAN">ZUMPAHUACAN</option>
                          <option value="ZUMPANGO">ZUMPANGO</option>
                       </select>
                </div>

                <div class="col-md-6 mb-3 validar"><label for="MEDIDA_MODOIFICADA">MEDIDA_MODOIFICADA
                    <span class="required"></span></label> <select class=
                    "custom-select d-block w-100" id="MEDIDA_MODOIFICADA" name="MEDIDA_MODOIFICADA"
                    required="">
                    <option value="blank"></option>
                    <option value="EJECUCION">SI</option>
                    <option value="TERMINADA">NO</option>
                    </select>
                </div>





            <div class="col-md-6 mb-3 validar"><label for="FECHA_MODIFICACION">FECHA_MODIFICACION<span class=
            "required"></span></label> <input class="form-control" id="FECHA_MODIFICACION" name=
            "FECHA_MODIFICACION" placeholder="" required="" type="date"></div>

            <div class="col-md-6 mb-3 validar"><label for="TIPO_MODIFICACION">TIPO_MODIFICACION<span class="required"></span></label>
            <input class="form-control" id="docIdent" name="TIPO_MODIFICACION" placeholder=""
            required="" type="text"></div>

        <br>

        <div>
            <br>
        <br>

          <button id="enter" type="submit">GUARDAR</button>

        </div>

        <body>

        <link href="registrosolicitud1.css" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- Bootstrap 4 requires Popper.js -->
        <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
        <script src="dist/scripts/flat-ui.js"></script>
        <script src="docs/assets/js/application.js"></script>
        <script src="solicitudregistro2.js"></script>

        </body>
      </form>
  </div>
  </div>
</div>
<div class="contenedor">
<a href="admin.php" class="btn-flotante">CANCELAR</a>
</div>
</body>
</html>
