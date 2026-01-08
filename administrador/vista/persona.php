<br>
<ul class="tabs-sujeto">
  <li><a class="link-light-sujeto" id="mi-enlacesuj1" href="#" onclick="autoridad()"><br>AUTORIDAD</a></li>
  <li><a class="link-light-sujeto" id="mi-enlacesuj2" href="#" onclick="personapropuesta()">PERSONA<br> PROPUESTA</a></li>
  <li><a class="link-light-sujeto" id="mi-enlacesuj3" href="#" onclick="lugarnacimiento()">LUGAR DE <br>NACIMIENTO</a></li>
  <li><a class="link-light-sujeto" id="mi-enlacesuj4" href="#" onclick="domicilioactual()">DOMICILIO <br>ACTUAL</a></li>
  <li><a class="link-light-sujeto" id="mi-enlacesuj5" href="#" onclick="invprocpenal()">INVESTIGACION O <br>PROCESO PENAL</a></li>
  <li><a class="link-light-sujeto" id="mi-enlacesuj6" href="#" onclick="valjuridica()">VALORACION <br>JURÍDICA</a></li>
  <!-- <li><a class="link-light-sujeto" id="mi-enlacesuj7" href="#" onclick="relacionado()"><br>RELACIONADO</a></li> -->
  <!-- <li><a class="link-light-sujeto" id="mi-enlacesuj7" href="#" onclick="relacionado()"><br>COMENTARIOS</a></li> -->
</ul><br>

<?php
include('vista/autoridad.php');
include('vista/personapropuesta.php');
include('vista/lugarnacimiento.php');
include('vista/domicilioactual.php');
include('vista/invprocpenal.php');
include('vista/valjuridica.php');
// include('vista/relacionado.php');
?>
<br>
<section style="display:; padding:0px; border:solid 5px;"><br>
  <div class="container well form-horizontal secciones">
    <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
      <strong style="color: #f8fdfc;">RELACION CON OTRO(S) EXPEDIENTE(S) DE LA PERSONA PROPUESTA</strong>
    </div>
    <div class="row">
      <div class="col-md-12 mb-3 validar">
        <?php
        $fol2=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
        $resultfol2 = $mysqli->query($fol2);
        $rowfol2=$resultfol2->fetch_assoc();
        $name_folio=$rowfol2['folioexpediente'];
        echo $rowfol2['estatus'];
        $rowfol2['relacional'];
        $nombrep = $rowfol2['nombrepersona'];
        $apaterno = $rowfol2['paternopersona'];
        $amaterno =  $rowfol2['maternopersona'];
        $nombrecompleto = $nombrep .' '. $apaterno .' '. $amaterno;
        $cl = "SELECT COUNT(*) as t FROM datospersonales WHERE nombrepersona = '$nombrep' AND paternopersona = '$apaterno'
                                                   AND maternopersona = '$amaterno' AND relacional = 'SI'";
        $rcl = $mysqli->query($cl);
        $fcl = $rcl->fetch_assoc();
        // echo $fcl['t'];
        if ($fcl['t'] > 0) {
          // echo "si";
          echo "<h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA RELACIONADA CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
          $ifrelacion1 = "SELECT * FROM relacion_suj_exp WHERE folioexpediente = '$name_folio' OR espedienterelacional = '$name_folio'";
          $rifrelacion1 = $mysqli->query($ifrelacion1);
          while ($fifrelacion1 = $rifrelacion1->fetch_assoc()) {
            // code...
            if ($fifrelacion1['espedienterelacional'] === $name_folio) {
              // echo $fifrelacion1['folioexpediente'].'++++';
              echo '<button style="width:250px" class="btn btn-danger" style="" disabled><b>'.$fifrelacion1['folioexpediente'].'</b></button> &nbsp &nbsp';
            }else {
              // echo $fifrelacion1['espedienterelacional'].'++++';
              echo '<button style="width:250px" class="btn btn-danger" style="" disabled><b>'.$fifrelacion1['espedienterelacional'].'</b></button> &nbsp &nbsp';
            }
          }
        }else {
          echo "<h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA NO RELACIONADA CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
        }
        ?>
      </div>
    </div>
    <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
      <strong style="color: #f8fdfc;">COMENTARIOS</strong>
    </div>
    <div id="contenido" class="">
      <div class="">
        <table class="table table-striped table-bordered">
          <thead >

          </thead>
          <?php
          $tabla="SELECT * FROM comentario WHERE folioexpediente ='$name_folio' AND id_persona = '$id_person' AND comentario_mascara = '1'";
          $var_resultado = $mysqli->query($tabla);
          while ($var_fila=$var_resultado->fetch_array())
          {
          echo "<tr>";
          echo "<td>";
          echo "<ul>
                <li>

                <div>
                <span>
                USUARIO:&nbsp;&nbsp;".$var_fila['usuario']."
                </span>
                </div>
                <div>
                <span>
                  ".$var_fila['comentario']."
                </span>
                </div>
                <div>
                <span>
                ".date("d/m/Y h:i A", strtotime($var_fila['fecha']))."
                </span>
                </div>
                </li>
          </ul>";echo "</td>";
          echo "</tr>";

          }
        ?>
        </table>
      </div>
    </div>
    <form class="" action="./controllers/add_commentpersona.php?idpersona=<?php echo $id_person; ?>" method="post">
      <div class="contenedor-margen">
        <?php
        if ($rowfol2['estatus'] != 'DESINCORPORADO' && $rowfol2['estatus'] != 'NO INCORPORADO') {
          ?>
          <textarea name="COMENTARIO" id="COMENTARIO" rows="5" placeholder="Escribe tu comentario" maxlength="10000" style="resize: none;"></textarea>
          <button class="btn btn-success" id="btn_comentariodeterminacion">
            <i class="fa-solid fa-paper-plane"></i>
          </button>
          <?php
        }
        ?>
      </div>
    </form>
    <br><br>
  </div>
</section>
