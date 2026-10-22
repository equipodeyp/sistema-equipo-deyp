<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica = 1;
$_SESSION["verifica"] = $verifica;
$name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];

$m_user = $user;
$m_user = strtoupper($m_user);

// echo $m_user;
// echo $user;
// $f_exped = 'UPSIPPED/TOL/113/015/2022';
// echo $f_exped;


$sentencia2=" SELECT nombre, amaterno, apaterno FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];
$ap_serv = $fnombre['apaterno'];
$am_serv = $fnombre['amaterno'];



$name_user = $name_serv;
$name_user = strtoupper($name_user);
$names = $name_user;
$one_name = explode(" ", $names); 
$primer_nombre = $one_name[0];

// echo $primer_nombre;

$a_paterno = $ap_serv;
$a_paterno = strtoupper($a_paterno);
$ap_string = $a_paterno;
$inicial_ap = $ap_string[0];
// echo $inicial_ap;

$a_materno = $am_serv;
$a_materno = strtoupper($a_materno);
$am_string = $a_materno;
$inicial_am = $am_string[0];
// echo $inicial_am;



$id_servidor_ini = $primer_nombre.$inicial_ap.$inicial_am;
// echo $id_servidor_ini;




$sentencia=" SELECT * FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$genero = $row['sexo'];
$id_user = $row['id'];
// echo $id_user;

$userfijo="SELECT * FROM usuarios_servidorespublicos WHERE id_usuarioprincipal='$id_user'";
$ruserfijo = $mysqli->query($userfijo);
$fuserfijo=$ruserfijo->fetch_assoc();
$n = $fuserfijo['nombre'];
$permiso1 = $fuserfijo['permiso1'];
$permiso2 = $fuserfijo['permiso2'];
$permiso3 = $fuserfijo['permiso3'];
$permiso4 = $fuserfijo['permiso4'];
$permiso5 = $fuserfijo['permiso5'];
$permiso6 = $fuserfijo['permiso6'];
$sub = $fuserfijo['subdireccion'];
// echo $permiso1;
// echo $permiso2;
// echo $permiso3;
// echo $permiso4;
// echo $permiso5;
// echo $permiso6;

// echo $sub;
// echo $n;


?>

<!DOCTYPE html>
<html lang="es">
<head>



  <link rel="stylesheet" href="style_med.css">

</head>
<body >







        <!-- Componente del Título -->
        <!-- <header class="header-panel">
            <span class="panel-tag">Menú</span>
            <h1 class="panel-title">Gestión de Medicamentos</h1>
        </header> -->

        <div class="menu-grid">
            <?php

            $botones = [
                ['texto' => 'Solicitar', 'imagen' => '../image/gestion_medicamentos/solicitar.png', 'accion' => 'solicitar.php'],
                ['texto' => 'Registrar', 'imagen' => '../image/gestion_medicamentos/alta.png', 'accion' => 'alta.php'],
                ['texto' => 'Entrada', 'imagen' => '../image/gestion_medicamentos/entrada.png', 'accion' => 'entrada.php'],
                ['texto' => 'Salida', 'imagen' => '../image/gestion_medicamentos/salida.jpg', 'accion' => 'salida.php'],
                ['texto' => 'Consultar', 'imagen' => '../image/gestion_medicamentos/consultar.png', 'accion' => 'consultar.php'],
                ['texto' => 'Inventario', 'imagen' => '../image/gestion_medicamentos/inventario.png', 'accion' => 'inventario.php'],
                ['texto' => 'Baja de inventario', 'imagen' => '../image/gestion_medicamentos/baja.jpg', 'accion' => 'baja.php']
            ];

            foreach ($botones as $boton) {
                echo '<button class="menu-item" data-url="' . $boton['accion'] . '">';
                echo '    <img src="' . $boton['imagen'] . '" alt="' . $boton['texto'] . '">';
                echo '    <span>' . $boton['texto'] . '</span>';
                echo '</button>';
            }
            ?>
        </div>









<script type="text/javascript">
	$(document).ready(function(){
		$('#folio_expediente').val(1);
		recargarLista();

		$('#folio_expediente').change(function(){
			recargarLista();
		});


	})
</script>


<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"./get_id_sujeto.php",
			data:"folio=" + $('#folio_expediente').val(),
			success:function(r){
				$('#id_sujeto').html(r);
			}
		});
	}
</script>


<script type="text/javascript">
function cancelar() {
    var key = event.keyCode;

    if (key === 13) {
        event.preventDefault();
    }
}






document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.menu-item');

    botones.forEach(boton => {
        boton.addEventListener('click', () => {
            const urlDestino = boton.getAttribute('data-url');
            
            if (urlDestino) {
                // Redirige a la página correspondiente
                window.location.href = urlDestino;
            } else {
                console.error('No se definió una ruta para este botón.');
            }
        });
    });
});






</script>








</body>
</html>
