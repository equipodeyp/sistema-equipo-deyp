<?php
// error_reporting(0);
$v1 = "SELECT folioexpediente, COUNT( folioexpediente ) AS total
FROM  evaluacion_expediente
GROUP BY folioexpediente
ORDER BY total DESC
LIMIT 1";
$rv1 = $mysqli->query($v1);
$fv1 = $rv1->fetch_assoc();
$iterac = $fv1['total'].'<br />';
$cont = 0;
$exps = "SELECT DISTINCT a.fol_exp, a.fecha_nueva, a.sede,
b.nombreautoridad,
c.delitoprincipal, c.otrodelitoprincipal, c.etapaprocedimiento, c.nuc, c.numeroradicacion,
e.resultadovaloracion, e.motivoprocedencia,
d.personas_propuestas, d.analisis, d.incorporacion, d.fecha_analisis, d.id_analisis, d.convenio, d.fecha_convenio, d.vigencia , d.fecha_termino_convenio,
f.conclu_cancel, f.conclusionart35, f.otherart35, f.date_desincorporacion, f.status
FROM expediente a
INNER JOIN autoridad b on a.fol_exp = b.folioexpediente
INNER JOIN procesopenal c on b.folioexpediente = c.folioexpediente
INNER JOIN analisis_expediente d on c.folioexpediente = d.folioexpediente
INNER JOIN valoracionjuridica e on d.folioexpediente = e.folioexpediente
INNER JOIN statusseguimiento f on e.folioexpediente = f.folioexpediente
ORDER by a.id ASC";
$rexps = $mysqli->query($exps);
while ($fexps = $rexps->fetch_assoc()) {
  $cont = $cont + 1;
  $expedienteest = $fexps['fol_exp'];
  // echo $expedienteest;
  $aexp = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$expedienteest'";
  $raexp = $mysqli->query($aexp);
  $faexp = $raexp->fetch_assoc();
  // echo $faexp['fecha_inicio'];
  $v = "SELECT COUNT(*) as t
  FROM  evaluacion_expediente
  WHERE folioexpediente = '$expedienteest'";
  $rv = $mysqli->query($v);
  $fv = $rv->fetch_assoc();

  // echo $fv['t'].'<br />';

  echo "<tr>";
  echo "<td style='text-align:center'>"; echo $cont; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['fol_exp']; echo "</td>";
  echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fexps['fecha_nueva'])); echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['sede']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['nombreautoridad']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['delitoprincipal']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['otrodelitoprincipal']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['etapaprocedimiento']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['nuc']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['numeroradicacion']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['resultadovaloracion']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['motivoprocedencia']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['personas_propuestas']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['incorporacion']; echo "</td>";
  echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fexps['fecha_analisis'])); echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['id_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['convenio']; echo "</td>";
  echo "<td style='text-align:center'>";
  if ($fexps['fecha_convenio'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($fexps['fecha_convenio']));
  } echo "</td>";
  echo "<td style='text-align:center'>";
  if ($faexp['fecha_inicio'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($faexp['fecha_inicio']));
  } echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['vigencia']; echo "</td>";
  echo "<td style='text-align:center'>";
  if ($fexps['fecha_termino_convenio'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($fexps['fecha_termino_convenio']));
  } echo "</td>";
  if ($fv) {
    // echo 'el '. $expedienteest ."tiene ". $fv['t']. '  estudios'. '<br />';
    // if ($fv['t'] > 0) {
      $t = "SELECT * FROM evaluacion_expediente
      WHERE folioexpediente = '$expedienteest'";
      $rt = $mysqli->query($t);
      while ($ft = $rt->fetch_assoc()) {
        // code...
        // echo $ft['fecha_aut'].'<br />';
        // echo "<td style='text-align:center' bgcolor='yellow'>"; echo $ft['analisis'];  echo "</td>";
        // echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($ft['fecha_aut'])); echo "</td>";
        // echo "<td style='text-align:center'>"; echo $ft['id_analisis']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $ft['tipo_convenio']; echo "</td>";
        // echo "<td style='text-align:center'>";
        // if ($ft['fecha_firma'] != '0000-00-00') {
        //   echo date("d/m/Y", strtotime($ft['fecha_firma']));
        // }echo "</td>";
        // echo "<td style='text-align:center'>";
        // if ($ft['fecha_inicio'] != '0000-00-00') {
        //   echo date("d/m/Y", strtotime($ft['fecha_inicio']));
        // }echo "</td>";
        // echo "<td style='text-align:center'>"; echo $ft['vigencia']; echo "</td>";
        // echo "<td style='text-align:center'>";
        // if ($ft['fecha_vigencia'] != '0000-00-00') {
        //   echo date("d/m/Y", strtotime($ft['fecha_vigencia']));
        // }echo "</td>";
        // echo "<td style='text-align:center'>"; echo $ft['total_convenios']; echo "</td>";
      }

        // for ($i=$fv['t']+1; $i < $iterac; $i++) {
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
        // }

    // }
  }
  // if ($fv['t'] <= $iterac) {
  //   for ($i=0; $i < $iterac; $i++) {
  //     echo "<td style='text-align:center' bgcolor='yellow'>"; echo "prueba";  echo "</td>";
  //     echo "<td style='text-align:center'>";  echo "</td>";
  //     echo "<td style='text-align:center'>";  echo "</td>";
  //     echo "<td style='text-align:center'>";  echo "</td>";
  //     echo "<td style='text-align:center'>";  echo "</td>";
  //     echo "<td style='text-align:center'>";  echo "</td>";
  //     echo "<td style='text-align:center'>";  echo "</td>";
  //     echo "<td style='text-align:center'>";  echo "</td>";
  //   }
  // }

  echo "<td style='text-align:center'>"; echo $fexps['conclu_cancel']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['conclusionart35']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['otherart35']; echo "</td>";
  echo "<td style='text-align:center'>";
  if ($fexps['date_desincorporacion'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($fexps['date_desincorporacion']));
  }echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['status']; echo "</td>";
  echo "</tr>";
}
?>
