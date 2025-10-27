<?php
//////////////////////////////////////////////////////////////////////
$exp2021 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2021";
$rexp2021 = $mysqli->query($exp2021);
$fexp2021 = $rexp2021->fetch_assoc();
//////////////////////////////////////////////////////////////////////
$exp2022 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2022";
$rexp2022 = $mysqli->query($exp2022);
$fexp2022 = $rexp2022->fetch_assoc();
//////////////////////////////////////////////////////////////////////
$exp2023 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2023";
$rexp2023 = $mysqli->query($exp2023);
$fexp2023 = $rexp2023->fetch_assoc();
//////////////////////////////////////////////////////////////////////
$exp2024 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2024";
$rexp2024 = $mysqli->query($exp2024);
$fexp2024 = $rexp2024->fetch_assoc();
//////////////////////////////////////////////////////////////////////
$exp2025 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2025";
$rexp2025 = $mysqli->query($exp2025);
$fexp2025 = $rexp2025->fetch_assoc();
echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'DEL 01 DE JUNIO AL 31 DE DICIEMBRE DE 2021'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp2021['t']; echo "</td>";
echo "</tr>";

echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'DEL 01 DE ENERO AL 31 DE DICIEMBRE DE 2022'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp2022['t']; echo "</td>";
echo "</tr>";

echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'DEL 01 DE ENERO AL 31 DE DICIEMBRE DE 2023'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp2023['t']; echo "</td>";
echo "</tr>";

echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'DEL 01 DE ENERO AL 31 DE DICIEMBRE DE 2024'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp2024['t']; echo "</td>";
echo "</tr>";

echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'DEL 01 DE ENERO AL 31 DE DICIEMBRE DE 2025'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp2025['t']; echo "</td>";
echo "</tr>";

?>
