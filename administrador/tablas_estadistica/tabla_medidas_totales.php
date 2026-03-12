<?php
$cont = 0;
$tabla="SELECT * FROM medidas";
$var_resultado = $mysqli->query($tabla);

while ($var_fila=$var_resultado->fetch_array())
{
  $cont = $cont + 1;
  $id_persona = $var_fila['id_persona'];
  $id_medida = $var_fila['id'];
  $p = "SELECT * FROM datospersonales WHERE id= '$id_persona'";
  $rp = $mysqli->query($p);
  $fp = $rp->fetch_assoc();
  $mm = "SELECT * FROM multidisciplinario_medidas WHERE id_medida = '$id_medida'";
  $rmm = $mysqli->query($mm);
  $fmm = $rmm->fetch_assoc();

  // multidisciplinario de la medida
      echo "<tr>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $cont; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['folioexpediente']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['nombrepersona']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['paternopersona']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['maternopersona']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['calidadpersona']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['identificador']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['categoria']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['tipo']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['clasificacion']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['medida']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; if ($var_fila['medida'] === 'XIII. OTRAS MEDIDAS' || $var_fila['medida'] === 'VI. OTRAS') {
        echo ''; echo "</td>";
      }else {
        echo $var_fila['descripcion']; echo "</td>";
      }
      echo "<td style='text-align:center; border: 1px solid black;'>"; if ($var_fila['medida'] === 'XIII. OTRAS MEDIDAS' || $var_fila['medida'] === 'VI. OTRAS') {
        echo $var_fila['descripcion']; echo "</td>";
      }else {
        echo ''; echo "</td>";
      }
      echo "<td style='text-align:center; border: 1px solid black;'>";
      if ($var_fila['date_provisional'] == '0000-00-00') {
        echo date("d/m/Y", strtotime($var_fila['date_definitva']));
      }else {
        echo date("d/m/Y", strtotime($var_fila['date_provisional']));
      }
      echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>";
      if ($var_fila['date_provisional'] != '0000-00-00') {
        echo date("d/m/Y", strtotime($var_fila['date_provisional']));
      } echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>";
      if ($var_fila['date_definitva'] != '') {
        echo date("d/m/Y", strtotime($var_fila['date_definitva']));
      } echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fmm['acuerdo']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fmm['conclusionart35']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fmm['otherart35']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>";
      if ($fmm['date_close'] !== '0000-00-00') {
        echo date("d/m/Y", strtotime($fmm['date_close']));
      }
       echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['estatus']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['ejecucion']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>";
      if ($var_fila['date_ejecucion'] != '0000-00-00') {
        echo date("d/m/Y", strtotime($var_fila['date_ejecucion']));
      } echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['edadpersona']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['sexopersona']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['grupoedad']; echo "</td>";
      echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fp['estatus']; echo "</td>";
      echo "</tr>";
}
?>
