<?php
session_start();
require 'checar.php';

try {
  $usuario=htmlentities(addslashes($_POST['inputUsuario']));
  $password=htmlentities(addslashes($_POST['inputPassword']));

  // Estructura HTML base indispensable para SweetAlert2
  echo '<!DOCTYPE html>
  <html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando...</title>
    <script src="./js/sweetalert2.all.js"></script>
    <style>
      body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        background-color: #f4f6f9;
      }
    </style>
  </head>
  <body>';

  // Cálculo del saludo dinámico según la hora del sistema
  date_default_timezone_set('America/Mexico_City'); // Ajusta a tu zona horaria si es necesario
  $hora = date('H');
  if ($hora < 12) {
      $saludo = "Buenos días";
  } else if ($hora < 19) {
      $saludo = "Buenas tardes";
  } else {
      $saludo = "Buenas noches";
  }

  $sqluser = "SELECT * FROM usuarios WHERE usuario = :usuario";
  $resultado = $DB->prepare($sqluser);
  $resultado->execute(array(":usuario"=>$usuario));

  // Guardamos el registro en una variable para validar correctamente fuera de bucles conflictivos
  $login = $resultado->fetch(PDO::FETCH_ASSOC);

  if ($login) {
    // EL USUARIO EXISTE -> VALIDAMOS CONTRASEÑA
    if (password_verify($password, $login['password'])) {
      $nombreservidor = mb_strtoupper($login['nombre'], 'UTF-8');
      $_SESSION['IS_LOGIN']='yes';
      $_SESSION['usuario']=$usuario;

          if($login['id_cargo']==1){ //administrador
                echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                  Swal.fire({
                    icon: "success",
                    title: "' . $saludo . ',<br>BIENVENID@ <br>' . $nombreservidor . '",
                    html: "Ingresando al SIPPSIPPED<br><br><span style=\'color: green; font-size: 0.95em;\'>Iniciando componentes y entorno de trabajo...</span>",
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    showClass: { popup: "swal2-modal swal2-icon-show" },
                    hideClass: { popup: "swal2-modal swal2-icon-hide" }
                  }).then(() => {
                    window.location.href="administrador/admin.php";
                  });
                });
                </script>';
          }else if($login['id_cargo']==2){ //validacion de medidas
                echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                  Swal.fire({
                    icon: "success",
                    title: "' . $saludo . ',<br>BIENVENID@ <br>' . $nombreservidor . '",
                    html: "Ingresando al SIPPSIPPED<br><br><span style=\'color: green; font-size: 0.95em;\'>Iniciando componentes y entorno de trabajo...</span>",
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    showClass: { popup: "swal2-modal swal2-icon-show" },
                    hideClass: { popup: "swal2-modal swal2-icon-hide" }
                  }).then(() => {
                    window.location.href="subdireccion_de_analisis_de_riesgo/menu.php";
                  });
                });
                </script>';
          }else if($login['id_cargo']==3){ //ingreso de datos de expediente y de sujetos
                echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                  Swal.fire({
                    icon: "success",
                    title: "' . $saludo . ',<br>BIENVENID@ <br>' . $nombreservidor . '",
                    html: "Ingresando al SIPPSIPPED<br><br><span style=\'color: green; font-size: 0.95em;\'>Iniciando componentes y entorno de trabajo...</span>",
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    showClass: { popup: "swal2-modal swal2-icon-show" },
                    hideClass: { popup: "swal2-modal swal2-icon-hide" }
                  }).then(() => {
                    window.location.href="subdireccion_de_apoyo_tecnico_juridico/menu.php";
                  });
                });
                </script>';
          }else if($login['id_cargo']==4){ //registro de medidas y seguimiento de expediente y de sujeto
                echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                  Swal.fire({
                    icon: "success",
                    title: "' . $saludo . ',<br>BIENVENID@ <br>' . $nombreservidor . '",
                    html: "Ingresando al SIPPSIPPED<br><br><span style=\'color: green; font-size: 0.95em;\'>Iniciando componentes y entorno de trabajo...</span>",
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    showClass: { popup: "swal2-modal swal2-icon-show" },
                    hideClass: { popup: "swal2-modal swal2-icon-hide" }
                  }).then(() => {
                    window.location.href="subdireccion_de_estadistica_y_preregistro/menu.php";
                  });
                });
                </script>';
          }else if($login['id_cargo']==5){ //solo lectura de expedientes
                echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                  Swal.fire({
                    icon: "success",
                    title: "' . $saludo . ',<br>BIENVENID@ <br>' . $nombreservidor . '",
                    html: "Ingresando al SIPPSIPPED<br><br><span style=\'color: green; font-size: 0.95em;\'>Iniciando componentes y entorno de trabajo...</span>",
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    showClass: { popup: "swal2-modal swal2-icon-show" },
                    hideClass: { popup: "swal2-modal swal2-icon-hide" }
                  }).then(() => {
                    window.location.href="consultores/admin.php";
                  });
                });
                </script>';
          }else if($login['id_cargo']==6){ //solo lectura de expedientes
                echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                  Swal.fire({
                    icon: "success",
                    title: "' . $saludo . ',<br>BIENVENID@ <br>' . $nombreservidor . '",
                    html: "Ingresando al SIPPSIPPED<br><br><span style=\'color: green; font-size: 0.95em;\'>Iniciando componentes y entorno de trabajo...</span>",
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    showClass: { popup: "swal2-modal swal2-icon-show" },
                    hideClass: { popup: "swal2-modal swal2-icon-hide" }
                  }).then(() => {
                    window.location.href="consultores/admin.php";
                  });
                });
                </script>';
          }
    } else {
          // CONTRASEÑA INCORRECTA
          echo '<script type="text/javascript">
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              icon: "error",
              title: "Contraseña Incorrecta",
              text: "Por favor, verifica tus datos e intenta de nuevo.",
              confirmButtonColor: "#d33"
            }).then(() => {
              window.location.href="login.html";
            });
          });
          </script>';
    }
  } else {
    // USUARIO INCORRECTO
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
      Swal.fire({
        icon: "warning",
        title: "Usuario Incorrecto",
        text: "El nombre de usuario ingresado no existe.",
        confirmButtonColor: "#f8bb86"
      }).then(() => {
        window.location.href="login.html";
      });
    });
    </script>';
  }

  echo '</body></html>';
  //cierro la conexion
  $conexion = null;
} catch (\Exception $e) {
  die($e->getMessage());
}
?>
