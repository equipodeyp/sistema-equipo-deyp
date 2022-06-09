<?php
//
$st_ptotal2021 = "SELECT COUNT(*) as total2021 FROM datospersonales
INNER JOIN expediente ON expediente.fol_exp = datospersonales.folioexpediente
WHERE expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$res_stptotal2021 = $mysqli->query($st_ptotal2021);
$fila_st_ptotal2021 = $res_stptotal2021->fetch_assoc();
//
$st_ptotal2022 = "SELECT COUNT(*) as total2022 FROM datospersonales
INNER JOIN expediente ON expediente.fol_exp = datospersonales.folioexpediente
WHERE datospersonales.relacional = 'NO' AND expediente.fecha_nueva BETWEEN '2022-01-01' AND '2022-12-31'";
$res_stptotal2022 = $mysqli->query($st_ptotal2022);
$fila_st_ptotal2022 = $res_stptotal2022->fetch_assoc();
//
$st_ptotalexp = "SELECT COUNT(*) as totalexp FROM datospersonales
INNER JOIN expediente ON expediente.fol_exp = datospersonales.folioexpediente
WHERE datospersonales.relacional = 'NO'";
$res_stptotalexp = $mysqli->query($st_ptotalexp);
$fila_st_ptotalexp = $res_stptotalexp->fetch_assoc();
// 
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:left'>"; echo 'TOTAL DE PERSONAS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fila_st_ptotal2021['total2021']; "</td>";
echo "<td style='text-align:center'>"; echo $fila_st_ptotal2022['total2022']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fila_st_ptotalexp['totalexp']; "</td>";
echo "</tr>";
//
$estatus_persona = "SELECT * from estatuspersona";
$res_est = $mysqli->query($estatus_persona);
while ($fila_est = $res_est ->fetch_assoc()) {
  $rtp = $fila_est['nombre'];

  $st_p = "SELECT COUNT(*) as total FROM datospersonales
  INNER JOIN expediente ON expediente.fol_exp = datospersonales.folioexpediente
  WHERE datospersonales.estatus = '$rtp' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
  $res_stp = $mysqli->query($st_p);
  //
  $st_p2022 = "SELECT COUNT(*) as total FROM datospersonales
  INNER JOIN expediente ON expediente.fol_exp = datospersonales.folioexpediente
  WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = '$rtp' AND expediente.fecha_nueva BETWEEN '2022-01-01' AND '2022-12-31'";
  $res_stp2022 = $mysqli->query($st_p2022);
  $fila_st_p2022 = $res_stp2022->fetch_assoc();
  //
  $st_ptotal = "SELECT COUNT(*) as total FROM datospersonales
  INNER JOIN expediente ON expediente.fol_exp = datospersonales.folioexpediente
  WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = '$rtp'";
  $res_stptotal = $mysqli->query($st_ptotal);
  $fila_st_ptotal = $res_stptotal->fetch_assoc();
  //

  //

  //

  //
  if ($res_stp) {
    while ($fila_stp = mysqli_fetch_assoc($res_stp)) {
      echo "<tr>";
      echo "<td style='text-align:left'>"; echo $fila_est['nombre']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fila_stp['total']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fila_st_p2022['total']; echo "</td>";
      echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fila_st_ptotal['total']; echo "</td>";
      echo "</tr>";
    }
  }
}
?>
