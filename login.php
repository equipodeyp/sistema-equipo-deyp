<?php
session_start();
ConsultarUsuario($_POST['inputUsuario'], $_POST['inputPassword']);
function ConsultarUsuario($usuario, $password)
{
  /*include'conexion.php';*/

  $conexion=mysqli_connect("localhost","root","","sistemafgjem");
  include_once "alerta_modal.php";
  $sentencia="SELECT * FROM usuarios WHERE usuario='".$usuario."' AND password='".$password."' ";
  $resultado=$conexion->query($sentencia) or die ("Error al comprobar usuario: ".mysqli_error($conexion));

  $filas=mysqli_fetch_array($resultado); //Numero de filas del resultado de la consulta

  if($filas > 0) //si la variable count es mayor a 0
  {
    $_SESSION['IS_LOGIN']='yes';
    $_SESSION['usuario']=$usuario;
    if($filas['id_cargo']==1){ //administrador
      // $_SESSION['start'] = time(); // Taking now logged in time.
      //       // Ending a session in 30 minutes from the starting time.
      // $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
      echo'<script type="text/javascript">
      alert("Bienvenido");
      window.location.href="administrador/admin.php";
      </script>';
        // echo '<script>console.log('Bienvenido');</script>";
        // header("location: administrador/admin.php");
        // MensajeAlerta("correcto", "Bienvenido", "administrador/admin.php");
    }else
    if($filas['id_cargo']==2){ //cliente
      echo'<script type="text/javascript">
      alert("Bienvenido");
      window.location.href="subdireccion_de_analisis_de_riesgo/menu.php";
      </script>';
        // MensajeAlerta("correcto", "Bienvenido", "consultores/consultar.php");
        /*header("location: consultores/consultar.php");*/
    }else
      if($filas['id_cargo']==3){ //registro mascara 1
        echo'<script type="text/javascript">
        alert("Bienvenido");
        window.location.href="subdireccion_de_apoyo_tecnico_juridico/menu.php";
        </script>';
        // MensajeAlerta("correcto", "Bienvenido", "registro_mascara1/registro_mascara1.php");
          /*header("location: registro_mascara1/registro_mascara1.php");*/
      }else
        if($filas['id_cargo']==4){ //registro mascara 1
          echo'<script type="text/javascript">
          alert("Bienvenido");
          window.location.href="subdireccion_de_estadistica_y_preregistro/menu.php";
          </script>';
        // MensajeAlerta("correcto", "Bienvenido", "mascara1/registro_mascara1.php");
            /*header("location: mascara1/registro_mascara1.php");*/
        }else
          if($filas['id_cargo']==5){ //registro mascara 1
            echo'<script type="text/javascript">
            alert("Bienvenido");
            window.location.href="modificar/mod.php";
            </script>';
        // MensajeAlerta("correcto", "Bienvenido", "modificar/mod.php");
              /*header("location: modificar/modificar.php");*/
          }
    /***  AHORA ***/

    /***  ANTES ***/
    /*echo '<script>';
      echo 'alert("Bienvenido!!");';
      echo 'window.location.href="menu.php";';
    echo '</script>';*/
  }
  else
  {
    echo'<script type="text/javascript">
alert("Datos erroneos");
window.location.href="login.html";
</script>';
    // MensajeAlerta("error", "Datos de acceso incorrectos", "login.html");
    /*echo '<script>';
      echo 'alert("Datos de acceso incorrectos");';
      echo 'window.location.href="index.php";';
    echo '</script>';*/
  }
}
?>
