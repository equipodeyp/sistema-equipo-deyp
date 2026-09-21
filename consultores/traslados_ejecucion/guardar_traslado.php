<?php
// 1. INCLUYE TU ARCHIVO DE CONEXIÓN AQUÍ
require_once '../conexion.php';

if (!isset($mysqli) || $mysqli->connect_error) {
    die("<div style='color:red; font-family:sans-serif;'>Error de conexión con la base de datos.</div>");
}
// 1. INICIAR LA SESIÓN SIEMPRE EN LA PRIMERA LÍNEA
session_start();
$name = $_SESSION['usuario'];
$fecha_alta = date('Y/m/d');
$year_alta = date('Y');
// 2. RECUPERAR Y SANEAR DATOS FIJOS DEL PASO 1
$fecha_traslado   = $mysqli->real_escape_string($_POST['fecha_traslado'] ?? '');
$lugar_salida     = $mysqli->real_escape_string($_POST['lugar_salida'] ?? '');
$hora_inicio      = $mysqli->real_escape_string(($_POST['ini_hh'] ?? '00') . ':' . ($_POST['ini_mm'] ?? '00'));
$hora_fin         = $mysqli->real_escape_string(($_POST['fin_hh'] ?? '00') . ':' . ($_POST['fin_mm'] ?? '00'));
$kilometros       = $mysqli->real_escape_string($_POST['kilometros'] ?? '');

$dato_extra_1     = $mysqli->real_escape_string($_POST['dato_extra_1'] ?? '');
$dato_extra_2     = $mysqli->real_escape_string($_POST['dato_extra_2'] ?? '');
$dato_extra_3     = $mysqli->real_escape_string($_POST['dato_extra_3'] ?? '');

// 3. RECUPERAR Y SANEAR DATOS DEL PASO 2 (MÓDULO SELECT IZQUIERDO Y DERECHO)
$instancia_traslado = $mysqli->real_escape_string($_POST['select_instancia'] ?? '');
$detalle_instancia  = $mysqli->real_escape_string($_POST['select_dependiente_detalle'] ?? '');

$lugar_destino      = $mysqli->real_escape_string($_POST['lugar_destino'] ?? '');
$domicilio_destino  = $mysqli->real_escape_string($_POST['domicilio_destino'] ?? '');
$municipio_destino  = $mysqli->real_escape_string($_POST['municipio_destino'] ?? '');

// --- VIGILANCIA COMPLETA: Saneamiento de las notas opcionales del Textarea ---
$observaciones_traslado = $mysqli->real_escape_string($_POST['observaciones_traslado'] ?? '');

// --- INVOCACIÓN DEL SEGUNDO ARCHIVO MODULAR ---
// Este archivo procesará el conteo de sujetos y generará las variables dinámicas $compartidoX
require_once 'procesar_variables_compartidas.php';

// =========================================================================
// 🚨 PROCESAMIENTO SECUENCIAL DE FOLIOS ANUALES Y TEXTO PLANO <BR>
// =========================================================================
date_default_timezone_set('America/Mexico_City');
$a = date("Y");

$sql = "select * from react_traslados where id in (select MAX(id) from react_traslados)";
$result = $mysqli->query($sql);
$mostrar = $result->fetch_assoc();

$yearactual = $mostrar['year'] ?? '';
$id_traslado = $mostrar["id"] ?? 0;

if ($a == $yearactual) {
    $n = $mostrar['num_consecutivo'];
    $partes = explode('-', $n);
    $numero_actual = (int)$partes[0];
    $nuevo_numero = str_pad($numero_actual + 1, 3, '0', STR_PAD_LEFT);
    $n_con = $nuevo_numero;
} else {
    $num_consecutivo = 0;
    $n = $num_consecutivo;
    $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
}

$idtrasladounico = $n_con.'-'.$a;
$lugar_salida;

$getlugarsalida = "SELECT * FROM react_traslados_lugar WHERE lugar = '$lugar_salida'";
$rgetlugarsalida = $mysqli->query($getlugarsalida);
$fgetlugarsalida = $rgetlugarsalida->fetch_assoc();

if ($lugar_salida === 'OTRO') {
    $idanterior = $fgetlugarsalida['id'] ?? 0;
    $updateid_otro = $idanterior + 1;
    // Convertir la variable a mayúsculas respetando acentos y la Ñ
    $lugarsaltraslado = mb_strtoupper($dato_extra_1, 'UTF-8');
    $domiciliosaltraslado = mb_strtoupper($dato_extra_2, 'UTF-8');
    $municipiosaltraslado = mb_strtoupper($dato_extra_3, 'UTF-8');
    // aumentar 1 al id de otro
    $updatelugarid_otro = "UPDATE react_traslados_lugar SET id = '$updateid_otro' WHERE lugar = 'OTRO'";
    $res_updatelugarid_otro = $mysqli->query($updatelugarid_otro);
    // agregar el nuevo lugar de salida y asignarle el id anterior
    $actualizartablelugarsalida = "INSERT INTO react_traslados_lugar(id, lugar, domicilio, municipio)
            VALUES ('$idanterior', '$lugarsaltraslado', '$domiciliosaltraslado', '$municipiosaltraslado')";
    $ractualizartablelugarsalida = $mysqli->query($actualizartablelugarsalida);
} else {
    $lugarsaltraslado = $fgetlugarsalida['lugar'] ?? '';
    $domiciliosaltraslado = $fgetlugarsalida['domicilio'] ?? '';
    $municipiosaltraslado = $fgetlugarsalida['municipio'] ?? '';
}
// 5. RECUPERAR DATOS ADICIONALES DE TEXTO ADMINISTRATIVO
$diligencia_tipo   = $_POST['diligencia_tipo'] ?? [];
$tipo_admin_texto  = !empty($diligencia_tipo) ? implode(', ', $diligencia_tipo) : '';

$lugar_dest_admin  = $mysqli->real_escape_string($_POST['lugar_destino_admin'] ?? '');
$dom_dest_admin    = $mysqli->real_escape_string($_POST['domicilio_destino_admin'] ?? '');
$mun_dest_admin    = $mysqli->real_escape_string($_POST['municipio_destino_admin'] ?? '');

///////////////////////////////////////tabla react_traslados//////////////////////////////////////////////////
// inserccion a la tabla de traslados de la bd
$addtraslado = "INSERT INTO react_traslados(idtrasladounico,fecha, lugar_salida, domicilio_salida, municipio_salida, hora_salida, hora_llegada, kilometros, usuario, fecha_alta, year, num_consecutivo)
        VALUES ('$idtrasladounico', '$fecha_traslado', '$lugarsaltraslado', '$domiciliosaltraslado', '$municipiosaltraslado', '$hora_inicio', '$hora_fin', '$kilometros', '$name', '$fecha_alta', '$year_alta', '$idtrasladounico')";
$raddtraslado = $mysqli->query($addtraslado);
if($raddtraslado) {
  // traer el id del traslado registrado
  $qry = "select max(ID) As id from react_traslados";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $id_traslado = $row["id"];
  if ($instancia_traslado === 'VISITA FAMILIAR') {
    // archivo con toda la validacion parA AGREGRAR INFORMACION DE SUJETOS DESTINOS Y PDIS
    require_once 'add_visitafamiliar.php';
  }elseif ($instancia_traslado === 'DILIGENCIA MINISTERIAL') {
    // archivo con toda la validacion parA AGREGRAR INFORMACION DE SUJETOS DESTINOS Y PDIS
    require_once 'add_diligenciaministerial.php';
  }elseif ($instancia_traslado === 'DILIGENCIA JUDICIAL') {
    // archivo con toda la validacion parA AGREGRAR INFORMACION DE SUJETOS DESTINOS Y PDIS
    require_once 'add_diligenciajudicial.php';
  }elseif ($instancia_traslado === 'CUSTODIA POLICIAL') {
    // archivo con toda la validacion parA AGREGRAR INFORMACION DE SUJETOS DESTINOS Y PDIS
    require_once 'add_custodiapolicial.php';
  }elseif ($instancia_traslado === 'ASISTENCIA MEDICA') {
    // archivo con toda la validacion parA AGREGRAR INFORMACION DE SUJETOS DESTINOS Y PDIS
    require_once 'add_asistenciamedica.php';
  }

  if ($instancia_traslado ==='' && $diligencia_tipo !=='') {
    $dilcomplete = $diligencia_tipo[0];
    if ($tipo_admin_texto ==='CON_SUJETO') {
      $motivodiladm = 'DILIGENCIA ADMINISTRATIVA CON SUJETO';
    }else {
      $motivodiladm = 'DILIGENCIA ADMINISTRATIVA SIN SUJETO';
    }    
    // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
    $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                               VALUES ('$id_traslado', '$lugar_dest_admin', '$dom_dest_admin', '$mun_dest_admin', '$motivodiladm', '$fecha_alta', '$name')";
    $radddestinotraslado = $mysqli->query($adddestinotraslado);
    $contardiladm = 0;
    if ($radddestinotraslado) {
      $getiddesult2 = "select max(ID) As id from react_destinos_traslados";
      $rgetiddesult2 = $mysqli->query($getiddesult2);
      $fgetiddesult2 = $rgetiddesult2->fetch_assoc();
      $id_destrasladoult2 = $fgetiddesult2["id"];
      if (!empty($bloque_derecho_data['sujetos_ids'])) {
        $longitudder = count($bloque_derecho_data['sujetos_ids']);
        foreach ($bloque_derecho_data['sujetos_ids'] as $sujeto_id) {
          if ($longitudder > 1) {
            $contardiladm = $contardiladm + 1;
            $varcompartidoadm = 'COMPARTIDO-'.$idtrasladounico.'-'.$contardiladm;
          }else {
            $varcompartidoadm = 'UNICO';
          }
          // Limpiamos el ID actual por seguridad, siguiendo tu estructura con $mysqli
          $id_seguro = $mysqli->real_escape_string($sujeto_id);
          // Definimos la consulta SQL utilizando la variable actual
          $qry_sujeto = "SELECT * FROM datospersonales WHERE id = '$id_seguro'";
          // Ejecutamos la consulta
          $result_sujeto = $mysqli->query($qry_sujeto);
          // Obtenemos los campos de la fila (igual que tu ejemplo con fetch_assoc)
          if ($row_sujeto = $result_sujeto->fetch_assoc()){
            $folexpsujder = $row_sujeto['folioexpediente'];
            $idsujder = $row_sujeto['id'];
            $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                                      WHERE id_persona = '$id_seguro' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
            $rcheckalojamiento = $mysqli->query($checkalojamiento);
            $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
            if ($fcheckalojamiento['t'] > 0) {
              $alojamiento_suj = 'SI';
            }else {
              $alojamiento_suj = 'NO';
            }
            $addsujetosentraslado = "INSERT INTO react_sujetos_traslado(id_traslado, folio_expediente, id_sujeto, resguardado, usuario, fecha_alta, id_destino, id_asistenciamedica, compartido)
            VALUES ('$id_traslado', '$folexpsujder', '$idsujder', '$alojamiento_suj', '$name', '$fecha_alta', '$id_destrasladoult2', 'N/A', '$varcompartidoadm')";
            $raddsujetosentraslado = $mysqli->query($addsujetosentraslado);
          }
        }
      }
    }
  }

}

// 6. RECUPERAR PASO 3 (DPIS ACUMULATIVOS)
$pdis_seleccionados = $_POST['pdis_seleccionados'] ?? [];
$nombres_pdis = [];

if (!empty($pdis_seleccionados)) {
    $pdis_ids_filtrados = array_map('intval', $pdis_seleccionados);
    $str_pdis_ids = implode(',', $pdis_ids_filtrados);
    $query_pdis = $mysqli->query("SELECT nombre FROM react_grupo_translados WHERE id IN ($str_pdis_ids)");
    if ($query_pdis) {
        while($row = $query_pdis->fetch_assoc()) {
          // $nombres_pdis[] = $row['nombre'];
          $namepditraslado = $row['nombre'];
          $addpdistraslado = "INSERT INTO react_pdi_traslado(id_traslado, nombrepdi, usuario, fecha_alta)
          VALUES ('$id_traslado', '$namepditraslado', '$name', '$fecha_alta')";
          $raddpdistraslado = $mysqli->query($addpdistraslado);
        }
    }
}
/////////////////////////////////////////////////////////////////////////////////////

if (!empty($observaciones_traslado)) {
  $observaciones = mb_strtoupper($observaciones_traslado, 'UTF-8');
  // insercciona  la tabla de destinos de4 la bd
  $addobservacionestraslado = "INSERT INTO react_observaciones_traslado(id_traslado, observacion, fecha_alta, usuario)
                                      VALUES ('$id_traslado', '$observaciones', '$fecha_alta', '$name')";
  $raddobservacionestraslado = $mysqli->query($addobservacionestraslado);
}
//////////////////////////////////////////////////////////////////////////////////////////////////

// // 7. INVOCACIÓN DE LA INTERFAZ DE VISUALIZACIÓN SEPARADA EN TABLA
// // include 'vista_reporte.php';
// if($raddpdistraslado){
//   echo ("<script type='text/javaScript'>
//    window.location.href='add_traslado.php';
//  </script>");
// }
// =========================================================================
// 🚨 INTERFAZ DE CONFIRMACIÓN: MODAL DE REGISTRO EXITOSO NATIVO
// =========================================================================

// Reemplazamos la redirección silenciosa y el include anterior por tu bloque de validación
if ($raddpdistraslado) {
    echo "
    <!-- Contenedor general atenuado con desenfoque moderno -->
    <div id='overlay-modal-exito-servidor' style='position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(26, 26, 26, 0.8); display:flex; align-items:center; justify-content:center; z-index:999999; backdrop-filter:blur(5px); font-family:sans-serif;'>

        <!-- Tarjeta de la modal corporativa -->
        <div style='background:#ffffff; border-radius:8px; padding:30px; width:90%; max-width:400px; box-shadow:0 15px 35px rgba(0,0,0,0.3); text-align:center; box-sizing:border-box; animation:entradaSuaveLoader 0.4s ease-out;'>

            <!-- Icono o Spinner Circular de Éxito Premium -->
            <div style='width:60px; height:60px; border-radius:50%; background:#d4edda; border:2px solid #28a745; display:flex; align-items:center; justify-content:center; margin:0 auto 18px auto;'>
                <span style='color:#28a745; font-size:32px; font-weight:bold; line-height:1;'>✓</span>
            </div>

            <!-- Título Institucional -->
            <div style='font-size:16px; font-weight:bold; color:#1a1a1a; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:10px; border-bottom:1px solid #eaeaea; padding-bottom:10px;'>
                ¡REGISTRO EXITOSO!
            </div>

            <!-- Mensaje Descriptivo -->
            <div style='font-size:13.5px; color:#555555; margin-bottom:22px; line-height:1.5;'>
                La información del traslado ha sido guardada de forma exitosa.
            </div>

            <!-- Botón Único de Acción para Redirección de Destino -->
            <button type='button' onclick='window.location.href=\"add_traslado.php\";' style='width:100%; padding:12px; background-color:#28a745; color:#ffffff; border:none; border-radius:4px; font-weight:bold; font-size:13px; text-transform:uppercase; cursor:pointer; letter-spacing:0.3px; box-shadow:0 2px 4px rgba(40,167,69,0.2); transition:background 0.2s;'>
                Aceptar
            </button>
        </div>
    </div>

    <!-- Animación CSS embebida para una entrada fluida sin parpadeos -->
    <style>
        @keyframes entradaSuaveLoader {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        button:hover { background-color: #218838 !important; }
    </style>
    ";

    // Finalizar la ejecución de PHP para asegurar que no se carguen vistas fantasma residuales abajo
    exit;
} else {
    // Si la inserción falló, invoca a tu vista tradicional como respaldo
    include 'vista_reporte.php';
}
?>
