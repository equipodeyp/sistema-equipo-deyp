<?php
error_reporting(0);
require 'conexion.php';

session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

  $fol_exp = $_GET['folio'];
  // echo $fol_exp;
  $sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
  $resultado = $mysqli->query($sql);
  $row = $resultado->fetch_array(MYSQLI_ASSOC);



$folio_expediente = $_POST['folio'];
$id_persona = $_POST['id_persona'];
$fecha_hora = $_POST['fecha_hora_instrumento'];
$nombre_servidor = $_POST['nombre_servidor'];

$q1 = $_POST['r_question_1'];
$q2 = $_POST['r_question_2'];
$q3 = $_POST['r_question_3'];
$q4 = $_POST['r_question_4'];
$q5 = $_POST['r_question_5'];
$q6 = $_POST['r_question_6'];
$q7 = $_POST['r_question_7'];
$q8 = $_POST['r_question_8'];
$q9 = $_POST['r_question_9'];


// echo $q1 = $_POST['r_question_1']; 
// echo '<br>';
// echo $q2 = $_POST['r_question_2'];
// echo '<br>';
// echo $q3 = $_POST['r_question_3'];
// echo '<br>';
// echo $q4 = $_POST['r_question_4'];


$q10 = $_POST['r_question_10'];
$q11 = $_POST['r_question_11'];
$q12 = $_POST['r_question_12'];
$q13 = $_POST['r_question_13'];
$q14 = $_POST['r_question_14'];
$q15 = $_POST['r_question_15'];
$q16 = $_POST['r_question_16'];
$q17 = $_POST['r_question_17'];
$q18 = $_POST['r_question_18'];
$q19 = $_POST['r_question_19'];
$q20 = $_POST['r_question_20'];

$q21 = $_POST['r_question_21'];
$q22 = $_POST['r_question_22'];
$q23 = $_POST['r_question_23'];
$q24 = $_POST['r_question_24'];
$q25 = $_POST['r_question_25'];
$q26 = $_POST['r_question_26'];
$q27 = $_POST['r_question_27'];
$q28 = $_POST['r_question_28'];
$q29 = $_POST['r_question_29'];
$q30 = $_POST['r_question_30'];

$q31 = $_POST['r_question_31'];
$q32 = $_POST['r_question_32'];
$q33 = $_POST['r_question_33'];
$q34 = $_POST['r_question_34'];
$q35 = $_POST['r_question_35'];
$q36 = $_POST['r_question_36'];
$q37 = $_POST['r_question_37'];
$q38 = $_POST['r_question_38'];
$q39 = $_POST['r_question_39'];
$q40 = $_POST['r_question_40'];

$q41 = $_POST['r_question_41'];
$q42 = $_POST['r_question_42'];
$q43 = $_POST['r_question_43'];
$q44 = $_POST['r_question_44'];
$q45 = $_POST['r_question_45'];
$q46 = $_POST['r_question_46'];
$q47 = $_POST['r_question_47'];
$q48 = $_POST['r_question_48'];
$q49 = $_POST['r_question_49'];
$q50 = $_POST['r_question_50'];

$q51 = $_POST['r_question_51'];
$q52 = $_POST['r_question_52'];

  
  $query = "INSERT INTO instrumento (folio_expediente, id_persona, fecha_registro, nombre_servidor,
  p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19, p20, p21, p22, p23, p24, p25, p26, p27, 
  p28, p29, p30, p31, p32, p33, p34, p35, p36, p37, p38, p39, p40, p41, p42, p43, p44, p45, p46, p47, p48, p49, p50, p51, p52) 
  VALUES ('$folio_expediente', '$id_persona', '$fecha_hora', '$nombre_servidor',
  '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', 
  '$q18', '$q19', '$q20', '$q21', '$q22', '$q23', '$q24', '$q25', '$q26', '$q27', '$q28', '$q29', '$q30', '$q31', '$q32', '$q33', 
  '$q34', '$q35', '$q36', '$q37', '$q38', '$q39', '$q40', '$q41', '$q42', '$q43', '$q44', '$q45', '$q46', '$q47', '$q48', '$q49', 
  '$q50', '$q51', '$q52')";
  $result = $mysqli->query($query);

    if($result) {
        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='../subdireccion_de_analisis_de_riesgo/detalle_instrumento.php?folio=$fol_exp';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");
      
    }

?>
