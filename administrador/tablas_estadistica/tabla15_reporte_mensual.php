<?php
$consecutivo = 0;
$expedientes2023 = "SELECT * FROM expediente WHERE fecha_nueva BETWEEN '2023-01-01' AND '2023-12-31'";
$rexpedientes2023 = $mysqli->query($expedientes2023);
while ($fexpedientes2023 = $rexpedientes2023->fetch_assoc()) {
  $consecutivo = $consecutivo + 1;
  $folioexpediente = $fexpedientes2023['fol_exp'];
  //////////////////////////////////////////////////////////////////////////////
  $autoridad = "SELECT * FROM autoridad WHERE folioexpediente = '$folioexpediente'";
  $rautoridad = $mysqli->query($autoridad);
  $fautoridad = $rautoridad->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $delito = "SELECT * FROM procesopenal WHERE folioexpediente = '$folioexpediente'";
  $rdelito = $mysqli->query($delito);
  $fdelito = $rdelito->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $perspropuestas = "SELECT COUNT(*) AS t FROM datospersonales WHERE folioexpediente = '$folioexpediente'";
  $rperspropuestas = $mysqli->query($perspropuestas);
  $fperspropuestas = $rperspropuestas->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $sujincorporados = "SELECT COUNT(*) AS t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.folioexpediente = '$folioexpediente' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
  $rsujincorporados = $mysqli->query($sujincorporados);
  $fsujincorporados = $rsujincorporados->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalmedidasexp = "SELECT COUNT(*) AS t FROM medidas WHERE folioexpediente = '$folioexpediente'";
  $rtotalmedidasexp = $mysqli->query($totalmedidasexp);
  $ftotalmedidasexp = $rtotalmedidasexp->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $estatusexp = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$folioexpediente'";
  $restatusexp = $mysqli->query($estatusexp);
  $festatusexp = $restatusexp->fetch_assoc();
  echo "<tr>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $consecutivo; "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fexpedientes2023['fol_exp']; "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fautoridad['nombreautoridad'];"</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fexpedientes2023['fecharecep']; "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; if ($fdelito['delitoprincipal'] === 'OTRO') {
    echo $fdelito['otrodelitoprincipal'];
  }else {
    echo $fdelito['delitoprincipal'];
  }  "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fperspropuestas['t']; "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fsujincorporados['t']; "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $ftotalmedidasexp['t']; "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $festatusexp['status']; "</td>";
  echo "</tr>";
}
?>
