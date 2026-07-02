<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  error_reporting(0);
  date_default_timezone_set("America/Mexico_City");
  session_start ();
  require '../conexion.php';
  echo $check_actividad = $_SESSION["check_actividad"];
  if ($check_actividad === 1) {
    unset($_SESSION['check_actividad']);
    echo $name = $_SESSION['usuario'];
    echo "<br>";
    echo "ACTIVIDAD:  ".$actividad = $_POST['actividad'];
    echo "<br>";
    $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
    $result = $mysqli->query($sentencia);
    $row=$result->fetch_assoc();
    // carga de datos
    $a = date("Y");
    $sql="select * from react_actividad where id in (select MAX(id) from react_actividad)";
    $result = $mysqli->query($sql);
    $mostrar=$result->fetch_assoc();
    $yearactual = $mostrar['year'];
    $id_traslado =$mostrar["id"];
    if ($a === $yearactual){
      $n=$id_traslado;
      $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
      $n_con;
    } else {
      $num_consecutivo = 0;
      $n=$num_consecutivo;
      $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
    }
    if ($actividad === '2') {
      include('add_actividad2.php');
    }elseif ($actividad === '3') {
      include('add_actividad3.php');
    }elseif ($actividad === '6') {
      include('add_actividad6.php');
    }elseif ($actividad === '7') {
      include('add_actividad7.php');
    }elseif ($actividad === '8') {
      include('add_actividad8.php');
    }
    //
    // validacion de update correcto
    if($raddactividad){
      echo ("<script type='text/javaScript'>
       window.location.href='../actividades_ejecucion/add_actividad.php';
       window.alert('!!!!!Registro exitoso¡¡¡¡¡')
     </script>");
    }
  }else {
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../../consultores/admin.php'>";
  }
}
?>
