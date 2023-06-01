<?php
////////////////////////////////////////////////////////////////////////////////
$inicialanterior = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE procesopenal.etapaprocedimiento = 'INICIAL' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
$rinicialanterior = $mysqli->query($inicialanterior);
$finicialanterior = $rinicialanterior ->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$inicialreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE procesopenal.etapaprocedimiento = 'INICIAL' AND expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
$rinicialreporte = $mysqli->query($inicialreporte);
$finicialreporte = $rinicialreporte ->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalinicial = $finicialanterior['t'] + $finicialreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$intermediaanterior = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE procesopenal.etapaprocedimiento = 'INTERMEDIA' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
$rintermediaanterior = $mysqli->query($intermediaanterior);
$fintermediaanterior = $rintermediaanterior ->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$intermediareporte = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE procesopenal.etapaprocedimiento = 'INTERMEDIA' AND expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
$rintermediareporte = $mysqli->query($intermediareporte);
$fintermediareporte = $rintermediareporte ->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalintermedia = $fintermediaanterior['t'] + $fintermediareporte['t'];
////////////////////////////////////////////////////////////////////////////////
$juiciooralanterior = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE procesopenal.etapaprocedimiento = 'JUICIO ORAL' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
$rjuiciooralanterior = $mysqli->query($juiciooralanterior);
$fjuiciooralanterior = $rjuiciooralanterior ->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$juiciooralreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE procesopenal.etapaprocedimiento = 'JUICIO ORAL' AND expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
$rjuiciooralreporte = $mysqli->query($juiciooralreporte);
$fjuiciooralreporte = $rjuiciooralreporte ->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totaljuiciooral = $fjuiciooralanterior['t'] + $fjuiciooralreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $finicialanterior['t'] + $fintermediaanterior['t'] + $fjuiciooralanterior['t'];
////////////////////////////////////////////////////////////////////////////////
$totalreporte = $finicialreporte['t'] + $fintermediareporte['t'] + $fjuiciooralreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $totalanterior + $totalreporte;
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "INICIAL"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $finicialanterior['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $finicialreporte['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalinicial; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "INTERMEDIA"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fintermediaanterior['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fintermediareporte['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalintermedia; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "JUICIO ORAL"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fjuiciooralanterior['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fjuiciooralreporte['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totaljuiciooral; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL DE EXPEDIENTES</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $totalanterior; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $totalreporte; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
?>
