<?php
      ////////////////////////////conteo de sujetos incorporados al programa
      $menoredad = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
      $rmenoredad = $mysqli->query($menoredad);
      $fmenoredad = $rmenoredad->fetch_assoc();
      //
      $menoredadmujer = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND datospersonales.sexopersona = 'MUJER'";
      $rmenoredadmujer = $mysqli->query($menoredadmujer);
      $fmenoredadmujer = $rmenoredadmujer->fetch_assoc();
      //
      $menoredadhombre = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND datospersonales.sexopersona = 'HOMBRE'";
      $rmenoredadhombre = $mysqli->query($menoredadhombre);
      $fmenoredadhombre = $rmenoredadhombre->fetch_assoc();
      //
      $mayoredad = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND datospersonales.relacional = 'NO'";
      $rmayoredad = $mysqli->query($mayoredad);
      $fmayoredad = $rmayoredad->fetch_assoc();
      //
      $mayoredadmujer = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND datospersonales.relacional = 'NO' AND datospersonales.sexopersona = 'MUJER'";
      $rmayoredadmujer = $mysqli->query($mayoredadmujer);
      $fmayoredadmujer = $rmayoredadmujer->fetch_assoc();
      //
      $mayoredadhombre = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND datospersonales.relacional = 'NO' AND datospersonales.sexopersona = 'HOMBRE'";
      $rmayoredadhombre = $mysqli->query($mayoredadhombre);
      $fmayoredadhombre = $rmayoredadhombre->fetch_assoc();
      //
      $total = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE determinacionincorporacion.convenio = 'FORMALIZADO' AND relacional = 'NO'";
      $rtotal = $mysqli->query($total);
      $ftotal = $rtotal->fetch_assoc();
      //
      $totalmujer = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE determinacionincorporacion.convenio = 'FORMALIZADO' AND relacional = 'NO' AND datospersonales.sexopersona = 'MUJER'";
      $rtotalmujer = $mysqli->query($totalmujer);
      $ftotalmujer = $rtotalmujer->fetch_assoc();
      //
      $totalhombre = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      WHERE determinacionincorporacion.convenio = 'FORMALIZADO' AND relacional = 'NO' AND datospersonales.sexopersona = 'HOMBRE'";
      $rtotalhombre = $mysqli->query($totalhombre);
      $ftotalhombre = $rtotalhombre->fetch_assoc();
      ////////////////////////////fin conteo de sujetos incorporados al programa
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////conteo de sujetos en centros de resguardo
      $menedadaloj = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.grupoedad = 'MENOR DE EDAD'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'";
      $rmenedadaloj = $mysqli -> query($menedadaloj);
      $fmenedadaloj = $rmenedadaloj ->fetch_assoc();
      //
      $menedadalojmujer = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.grupoedad = 'MENOR DE EDAD'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'MUJER'";
      $rmenedadalojmujer = $mysqli -> query($menedadalojmujer);
      $fmenedadalojmujer = $rmenedadalojmujer ->fetch_assoc();
      //
      $menedadalojhombre = "SELECT COUNT(*) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.grupoedad = 'MENOR DE EDAD'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'HOMBRE'";
      $rmenedadalojhombre = $mysqli -> query($menedadalojhombre);
      $fmenedadalojhombre = $rmenedadalojhombre ->fetch_assoc();
      //
      $mayedadaloj = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND datospersonales.relacional = 'NO'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'";
      $rmayedadaloj = $mysqli -> query($mayedadaloj);
      $fmayedadaloj = $rmayedadaloj ->fetch_assoc();
      //
      $mayedadalojmujer = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND datospersonales.relacional = 'NO'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'MUJER'";
      $rmayedadalojmujer = $mysqli -> query($mayedadalojmujer);
      $fmayedadalojmujer = $rmayedadalojmujer ->fetch_assoc();
      //
      $mayedadalojhombre = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND datospersonales.relacional = 'NO'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'HOMBRE'";
      $rmayedadalojhombre = $mysqli -> query($mayedadalojhombre);
      $fmayedadalojhombre = $rmayedadalojhombre ->fetch_assoc();
      //
      $totalaloj = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.relacional = 'NO'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'";
      $rtotalaloj = $mysqli -> query($totalaloj);
      $ftotalaloj = $rtotalaloj ->fetch_assoc();
      //
      $totalalojmujer = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.relacional = 'NO'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'MUJER'";
      $rtotalalojmujer = $mysqli -> query($totalalojmujer);
      $ftotalalojmujer = $rtotalalojmujer ->fetch_assoc();
      //
      $totalalojhombre = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
      INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
      INNER JOIN medidas ON datospersonales.id = medidas.id_persona
      WHERE datospersonales.relacional = 'NO'
      AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'HOMBRE'";
      $rtotalalojhombre = $mysqli -> query($totalalojhombre);
      $ftotalalojhombre = $rtotalalojhombre ->fetch_assoc();
      ////////////////////////////conteo de sujetos en centros de resguardo
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      echo "<tr bgcolor = 'yellow'>";
        echo "<td style='text-align:right'>"; echo "MENORES DE EDAD"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredad['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenedadaloj['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = ''>";
        echo "<td style='text-align:center'>"; echo "MUJER"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadmujer['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenedadalojmujer['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = ''>";
        echo "<td style='text-align:center'>"; echo "HOMBRE"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadhombre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenedadalojhombre['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'yellow'>";
        echo "<td style='text-align:right'>"; echo "MAYORES DE EDAD"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredad['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayedadaloj['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = ''>";
        echo "<td style='text-align:center'>"; echo "MUJER"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadmujer['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayedadalojmujer['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = ''>";
        echo "<td style='text-align:center'>"; echo "HOMBRE"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadhombre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayedadalojhombre['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'yellow'>";
        echo "<td style='text-align:right'>"; echo "TOTAL"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotal['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalaloj['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = ''>";
        echo "<td style='text-align:center'>"; echo "TOTAL MUJERES"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalmujer['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalalojmujer['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = ''>";
        echo "<td style='text-align:center'>"; echo "TOTAL HOMBRES"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalhombre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalalojhombre['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'yellow'>";
        echo "<td style='text-align:right'>"; echo "TOTAL"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotal['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalaloj['t']; echo "</td>";
      echo "</tr>";

?>
