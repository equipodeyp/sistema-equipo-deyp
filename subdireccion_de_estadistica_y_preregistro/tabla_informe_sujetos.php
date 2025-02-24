<?php
$contador = 0;
$infsuj = "SELECT * FROM datospersonales
                    WHERE estatus = 'SUJETO PROTEGIDO' OR estatus = 'PERSONA PRPUESTA'";
$finfsuj = $mysqli->query($infsuj);
while ($rinfsuj = $finfsuj-> fetch_assoc()) {
  $contador = $contador + 1;
  // varialbes de consulta
  $folexp = $rinfsuj['folioexpediente'];
  $idsuj = $rinfsuj['id'];
  // consulta a tabla de expedientes
  $datexp = "SELECT * FROM expediente WHERE fol_exp = '$folexp'";
  $fdatexp = $mysqli->query($datexp);
  $rdatexp = $fdatexp->fetch_assoc();
  // consulta a tabla de autoridad
  $dataut = "SELECT * FROM autoridad WHERE id_persona = '$idsuj'";
  $fdataut = $mysqli -> query ($dataut);
  $rdataut = $fdataut ->fetch_assoc();
  // consulta para verificar si esta alojado en un centro de proteccion
  $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                            WHERE id_persona = '$idsuj' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
  $rcheckalojamiento = $mysqli->query($checkalojamiento);
  $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
  if ($fcheckalojamiento['t'] > 0) {
    $alojamiento_suj = 'SI';
  }else {
    $alojamiento_suj = 'NO';
  }
  //
  echo "<tr>";
  echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['folioexpediente']; echo "</td>";
  echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($rdatexp['fecha_nueva'])); echo "</td>";
  echo "<td style='text-align:center'>"; echo $rdataut['nombreautoridad']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['calidadpersona']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['sexopersona']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['identificador']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['estatus']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['relacional']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['estatus']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['reingreso']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $alojamiento_suj; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['edadpersona']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $rinfsuj['grupoedad']; echo "</td>";
  echo "</tr>";
}




?>
