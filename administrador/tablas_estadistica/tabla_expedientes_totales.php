<?php
$cont = 0;
$exps = "SELECT DISTINCT a.fol_exp, a.fecharecep, a.sede,
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
  echo "<tr>";
  echo "<td style='text-align:center'>"; echo $cont; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['fol_exp']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['fecharecep']; echo "</td>";
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
  echo "<td style='text-align:center'>"; echo $fexps['fecha_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['id_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['convenio']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['fecha_convenio']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['vigencia']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['fecha_termino_convenio']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['conclu_cancel']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['conclusionart35']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['otherart35']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['date_desincorporacion']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fexps['status']; echo "</td>";
  echo "</tr>";
}
?>
