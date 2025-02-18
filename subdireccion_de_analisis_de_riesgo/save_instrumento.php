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



$folio_expediente = $_POST['folio_expediente'];
$id_persona = $_POST['id_sujeto'];
$nombre_servidor = $_POST['nombre_servidor'];
$id_instrumento = $_POST['id_instrumento'];

// echo $folio_expediente;
// echo $id_persona;
// echo $nombre_servidor;
// echo $id_instrumento;

$q1 = $_POST['r_question_1'];
$q2 = $_POST['r_question_2'];
$q3 = $_POST['r_question_3'];
$q4 = $_POST['r_question_4'];

$q5 = $_POST['r_question_5'];
$q6 = $_POST['r_question_6'];
$q7 = $_POST['r_question_7'];
$q8 = $_POST['r_question_8'];

$q9 = $_POST['r_question_9'];
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


// echo $q1 = $_POST['r_question_1']; 
// echo '<br>';
// echo $q2 = $_POST['r_question_2'];
// echo '<br>';
// echo $q3 = $_POST['r_question_3'];
// echo '<br>';
// echo $q4 = $_POST['r_question_4'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q5 = $_POST['r_question_5']; 
// echo '<br>';
// echo $q6 = $_POST['r_question_6'];
// echo '<br>';
// echo $q7 = $_POST['r_question_7'];
// echo '<br>';
// echo $q8 = $_POST['r_question_8'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q9 = $_POST['r_question_9']; 
// echo '<br>';
// echo $q10 = $_POST['r_question_10'];
// echo '<br>';
// echo $q11 = $_POST['r_question_11'];
// echo '<br>';
// echo $q12 = $_POST['r_question_12'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q13 = $_POST['r_question_13']; 
// echo '<br>';
// echo $q14 = $_POST['r_question_14'];
// echo '<br>';
// echo $q15 = $_POST['r_question_15'];
// echo '<br>';
// echo $q16 = $_POST['r_question_16'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q17 = $_POST['r_question_17']; 
// echo '<br>';
// echo $q18 = $_POST['r_question_18'];
// echo '<br>';
// echo $q19 = $_POST['r_question_19'];
// echo '<br>';
// echo $q20 = $_POST['r_question_20'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q21 = $_POST['r_question_21']; 
// echo '<br>';
// echo $q22 = $_POST['r_question_22'];
// echo '<br>';
// echo $q23 = $_POST['r_question_23'];
// echo '<br>';
// echo $q24 = $_POST['r_question_24'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q25 = $_POST['r_question_25']; 
// echo '<br>';
// echo $q26 = $_POST['r_question_26'];
// echo '<br>';
// echo $q27 = $_POST['r_question_27'];
// echo '<br>';
// echo $q28 = $_POST['r_question_28'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q29 = $_POST['r_question_29']; 
// echo '<br>';
// echo $q30 = $_POST['r_question_30'];
// echo '<br>';
// echo $q31 = $_POST['r_question_31'];
// echo '<br>';
// echo $q32 = $_POST['r_question_32'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q33 = $_POST['r_question_33']; 
// echo '<br>';
// echo $q34 = $_POST['r_question_34'];
// echo '<br>';
// echo $q35 = $_POST['r_question_35'];
// echo '<br>';
// echo $q36 = $_POST['r_question_36'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q37 = $_POST['r_question_37']; 
// echo '<br>';
// echo $q38 = $_POST['r_question_38'];
// echo '<br>';
// echo $q39 = $_POST['r_question_39'];
// echo '<br>';
// echo $q40 = $_POST['r_question_40'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q41 = $_POST['r_question_41']; 
// echo '<br>';
// echo $q42 = $_POST['r_question_42'];
// echo '<br>';
// echo $q43 = $_POST['r_question_43'];
// echo '<br>';
// echo $q44 = $_POST['r_question_44'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q45 = $_POST['r_question_45']; 
// echo '<br>';
// echo $q46 = $_POST['r_question_46'];
// echo '<br>';
// echo $q47 = $_POST['r_question_47'];
// echo '<br>';
// echo $q48 = $_POST['r_question_48'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

// echo $q49 = $_POST['r_question_49']; 
// echo '<br>';
// echo $q50 = $_POST['r_question_50'];
// echo '<br>';
// echo $q51 = $_POST['r_question_51'];
// echo '<br>';
// echo $q52 = $_POST['r_question_52'];
// echo '<br>';
// echo '<br>';
// echo '<br>';

//////////////////////////////////////////////////////////////////////////////// 1

if ($q1 === 'Si' && $q2 === 'No' && $q3 === 'No' && $q4 === 'Si'){
  $r1 = 0; $r2 = 0; $r3 = 0; $r4 = 0;
  // echo $r1, $r2, $r3, $r4;
  // echo '<br>';
} else if ($q1 === 'Si' && $q2 === 'No' && $q3 === 'Si' && $q4 === 'N/A') {
  $r1 = 0; $r2 = 0; $r3 = 1; $r4 = 0;
} else if ($q1 === 'Si' && $q2 === 'Si' && $q3 === 'N/A' && $q4 === 'N/A') {
  $r1 = 0; $r2 = 2; $r3 = 0; $r4 = 0;
} else if ($q1 === 'No' && $q2 === 'N/A' && $q3 === 'N/A' && $q4 === 'N/A') {
  $r1 = 3; $r2 = 0; $r3 = 0; $r4 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 2

if ($q5 === 'Si' && $q6 === 'No' && $q7 === 'No' && $q8 === 'Si'){
  $r5 = 0; $r6 = 0; $r7 = 0; $r8 = 0;
  // echo $r5, $r6, $r7, $r8;
  // echo '<br>';
} else if ($q5 === 'Si' && $q6 === 'No' && $q7 === 'Si' && $q8 === 'N/A') {
  $r5 = 0; $r6 = 0; $r7 = 1; $r8 = 0;
} else if ($q5 === 'Si' && $q6 === 'Si' && $q7 === 'N/A' && $q8 === 'N/A') {
  $r5 = 0; $r6 = 2; $r7 = 0; $r8 = 0;
} else if ($q5 === 'No' && $q6 === 'N/A' && $q7 === 'N/A' && $q8 === 'N/A') {
  $r5 = 3; $r6 = 0; $r7 = 0; $r8 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 3

if ($q9 === 'Si' && $q10 === 'No' && $q11 === 'No' && $q12 === 'Si'){
  $r9 = 0; $r10 = 0; $r11 = 0; $r12 = 0;
  // echo $r9, $r10, $r11, $r12;
  // echo '<br>';
} else if ($q9 === 'Si' && $q10 === 'No' && $q11 === 'Si' && $q12 === 'N/A') {
  $r9 = 0; $r10 = 0; $r11 = 1; $r12 = 0;
} else if ($q9 === 'Si' && $q10 === 'Si' && $q11 === 'N/A' && $q12 === 'N/A') {
  $r9 = 0; $r10 = 2; $r11 = 0; $r12 = 0;
} else if ($q9 === 'No' && $q10 === 'N/A' && $q11 === 'N/A' && $q12 === 'N/A') {
  $r9 = 3; $r10 = 0; $r11 = 0; $r12 = 0;
}


//////////////////////////////////////////////////////////////////////////////// 4


if ($q13 === 'No' && $q14 === 'No' && $q15 === 'No' && $q16 === 'Si'){
  $r13 = 0; $r14 = 0; $r15 = 0; $r16 = 0;
  // echo $r13, $r14, $r15, $r16;
  // echo '<br>';
} else if ($q13 === 'No' && $q14 === 'No' && $q15 === 'Si' && $q16 === 'N/A') {
  $r13 = 0; $r14 = 0; $r15 = 1; $r16 = 0;
} else if ($q13 === 'No' && $q14 === 'Si' && $q15 === 'N/A' && $q16 === 'N/A') {
  $r13 = 0; $r14 = 2; $r15 = 0; $r16 = 0;
} else if ($q13 === 'Si' && $q14 === 'N/A' && $q15 === 'N/A' && $q16 === 'N/A') {
  $r13 = 3; $r14 = 0; $r15 = 0; $r16 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 5

if ($q17 === 'Si' && $q18 === 'No' && $q19 === 'No' && $q20 === 'Si'){
  $r17 = 0; $r18 = 0; $r19 = 0; $r20 = 0;
  // echo $r17, $r18, $r19, $r20;
  // echo '<br>';
} else if ($q17 === 'Si' && $q18 === 'No' && $q19 === 'Si' && $q20 === 'N/A') {
  $r17 = 0; $r18 = 0; $r19 = 1; $r20 = 0;
} else if ($q17 === 'Si' && $q18 === 'Si' && $q19 === 'N/A' && $q20 === 'N/A') {
  $r17 = 0; $r18 = 2; $r19 = 0; $r20 = 0;
} else if ($q17 === 'No' && $q18 === 'N/A' && $q19 === 'N/A' && $q20 === 'N/A') {
  $r17 = 3; $r18 = 0; $r19 = 0; $r20 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 6

if ($q21 === 'Si' && $q22 === 'No' && $q23 === 'No' && $q24 === 'Si'){
  $r21 = 0; $r22 = 0; $r23 = 0; $r24 = 0;
  // echo $r21, $r22, $r23, $r24;
  // echo '<br>';
} else if ($q21 === 'Si' && $q22 === 'No' && $q23 === 'Si' && $q24 === 'N/A') {
  $r21 = 0; $r22 = 0; $r23 = 1; $r24 = 0;
} else if ($q21 === 'Si' && $q22 === 'Si' && $q23 === 'N/A' && $q24 === 'N/A') {
  $r21 = 0; $r22 = 2; $r23 = 0; $r24 = 0;
} else if ($q21 === 'No' && $q22 === 'N/A' && $q23 === 'N/A' && $q24 === 'N/A') {
  $r21 = 3; $r22 = 0; $r23 = 0; $r24 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 7

if ($q25 === 'No' && $q26 === 'No' && $q27 === 'No' && $q28 === 'Si'){
  $r25 = 0; $r26 = 0; $r27 = 0; $r28 = 0;
  // echo $r25, $r26, $r27, $r28;
  // echo '<br>';
} else if ($q25 === 'No' && $q26 === 'No' && $q27 === 'Si' && $q28 === 'N/A') {
  $r25 = 0; $r26 = 0; $r27 = 1; $r28 = 0;
} else if ($q25 === 'No' && $q26 === 'Si' && $q27 === 'N/A' && $q28 === 'N/A') {
  $r25 = 0; $r26 = 2; $r27 = 0; $r28 = 0;
} else if ($q25 === 'Si' && $q26 === 'N/A' && $q27 === 'N/A' && $q28 === 'N/A') {
  $r25 = 3; $r26 = 0; $r27 = 0; $r28 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 8

if ($q29 === 'Si' && $q30 === 'No' && $q31 === 'No' && $q32 === 'Si'){
  $r29 = 0; $r30 = 0; $r31 = 0; $r32 = 0;
  // echo $r29, $r30, $r31, $r32;
  // echo '<br>';
} else if ($q29 === 'Si' && $q30 === 'No' && $q31 === 'Si' && $q32 === 'N/A') {
  $r29 = 0; $r30 = 0; $r31 = 1; $r32 = 0;
} else if ($q29 === 'Si' && $q30 === 'Si' && $q31 === 'N/A' && $q32 === 'N/A') {
  $r29 = 0; $r30 = 2; $r31 = 0; $r32 = 0;
} else if ($q29 === 'No' && $q30 === 'N/A' && $q31 === 'N/A' && $q32 === 'N/A') {
  $r29 = 3; $r30 = 0; $r31 = 0; $r32 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 9

if ($q33 === 'No' && $q34 === 'No' && $q35 === 'No' && $q36 === 'Si'){
  $r33 = 0; $r34 = 0; $r35 = 0; $r36 = 0;
  // echo $r33, $r34, $r35, $r36;
  // echo '<br>';
} else if ($q33 === 'No' && $q34 === 'No' && $q35 === 'Si' && $q36 === 'N/A') {
  $r33 = 0; $r34 = 0; $r35 = 1; $r36 = 0;
} else if ($q33 === 'No' && $q34 === 'Si' && $q35 === 'N/A' && $q36 === 'N/A') {
  $r33 = 0; $r34 = 2; $r35 = 0; $r36 = 0;
} else if ($q33 === 'Si' && $q34 === 'N/A' && $q35 === 'N/A' && $q36 === 'N/A') {
  $r33 = 3; $r34 = 0; $r35 = 0; $r36 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 10

if ($q37 === 'No' && $q38 === 'No' && $q39 === 'No' && $q40 === 'Si'){
  $r37 = 0; $r38 = 0; $r39 = 0; $r40 = 0;
  // echo $r37, $r38, $r39, $r40;
  // echo '<br>';
} else if ($q37 === 'No' && $q38 === 'No' && $q39 === 'Si' && $q40 === 'N/A') {
  $r37 = 0; $r38 = 0; $r39 = 1; $r40 = 0;
} else if ($q37 === 'No' && $q38 === 'Si' && $q39 === 'N/A' && $q40 === 'N/A') {
  $r37 = 0; $r38 = 2; $r39 = 0; $r40 = 0;
} else if ($q37 === 'Si' && $q38 === 'N/A' && $q39 === 'N/A' && $q40 === 'N/A') {
  $r37 = 3; $r38 = 0; $r39 = 0; $r40 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 11

if ($q41 === 'No' && $q42 === 'No' && $q43 === 'No' && $q44 === 'Si'){
  $r41 = 0; $r42 = 0; $r43 = 0; $r44 = 0;
  // echo $r41, $r42, $r43, $r44;
  // echo '<br>';
} else if ($q41 === 'No' && $q42 === 'No' && $q43 === 'Si' && $q44 === 'N/A') {
  $r41 = 0; $r42 = 0; $r43 = 1; $r44 = 0;
} else if ($q41 === 'No' && $q42 === 'Si' && $q43 === 'N/A' && $q44 === 'N/A') {
  $r41 = 0; $r42 = 2; $r43 = 0; $r44 = 0;
} else if ($q41 === 'Si' && $q42 === 'N/A' && $q43 === 'N/A' && $q44 === 'N/A') {
  $r41 = 3; $r42 = 0; $r43 = 0; $r44 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 12

if ($q45 === 'Si' && $q46 === 'No' && $q47 === 'No' && $q48 === 'Si'){
  $r45 = 0; $r46 = 0; $r47 = 0; $r48 = 0;
  // echo $r45, $r46, $r47, $r48;
  // echo '<br>';
} else if ($q45 === 'Si' && $q46 === 'No' && $q47 === 'Si' && $q48 === 'N/A') {
  $r45 = 0; $r46 = 0; $r47 = 1; $r48 = 0;
} else if ($q45 === 'Si' && $q46 === 'Si' && $q47 === 'N/A' && $q48 === 'N/A') {
  $r45 = 0; $r46 = 2; $r47 = 0; $r48 = 0;
} else if ($q45 === 'No' && $q46 === 'N/A' && $q47 === 'N/A' && $q48 === 'N/A') {
  $r45 = 3; $r46 = 0; $r47 = 0; $r48 = 0;
}

//////////////////////////////////////////////////////////////////////////////// 13

if ($q49 === 'No' && $q50 === 'No' && $q51 === 'No' && $q52 === 'Si'){
  $r49 = 0; $r50 = 0; $r51 = 0; $r52 = 0;
  // echo $r49, $r50, $r51, $r52;
  // echo '<br>';
} else if ($q49 === 'No' && $q50 === 'No' && $q51 === 'Si' && $q52 === 'N/A') {
  $r49 = 0; $r50 = 0; $r51 = 1; $r52 = 0;
} else if ($q49 === 'No' && $q50 === 'Si' && $q51 === 'N/A' && $q52 === 'N/A') {
  $r49 = 0; $r50 = 2; $r51 = 0; $r52 = 0;
} else if ($q49 === 'Si' && $q50 === 'N/A' && $q51 === 'N/A' && $q52 === 'N/A') {
  $r49 = 3; $r50 = 0; $r51 = 0; $r52 = 0;
}

$total = $_POST['total_i'];
$adaptabilidad = $_POST['adaptabilidad_i'];

  
  $query = "INSERT INTO instrumento (folio_expediente, id_persona, id_instrumento, nombre_servidor,
  p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19, p20, p21, p22, p23, p24, p25, p26, p27, 
  p28, p29, p30, p31, p32, p33, p34, p35, p36, p37, p38, p39, p40, p41, p42, p43, p44, p45, p46, p47, p48, p49, p50, p51, p52,
  total_instrumento, adaptabilidad)
  VALUES ('$folio_expediente', '$id_persona', '$id_instrumento', '$nombre_servidor',
  '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', 
  '$q18', '$q19', '$q20', '$q21', '$q22', '$q23', '$q24', '$q25', '$q26', '$q27', '$q28', '$q29', '$q30', '$q31', '$q32', '$q33', 
  '$q34', '$q35', '$q36', '$q37', '$q38', '$q39', '$q40', '$q41', '$q42', '$q43', '$q44', '$q45', '$q46', '$q47', '$q48', '$q49', 
  '$q50', '$q51', '$q52', '$total', '$adaptabilidad')";
  $result = $mysqli->query($query);

  $query2 = "INSERT INTO instrumento_valores (folio_expediente, id_persona, id_instrumento, nombre_servidor,
  p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19, p20, p21, p22, p23, p24, p25, p26, p27, 
  p28, p29, p30, p31, p32, p33, p34, p35, p36, p37, p38, p39, p40, p41, p42, p43, p44, p45, p46, p47, p48, p49, p50, p51, p52,
  total_instrumento, adaptabilidad)
  VALUES ('$folio_expediente', '$id_persona', '$id_instrumento', '$nombre_servidor',
  '$r1', '$r2', '$r3', '$r4', '$r5', '$r6', '$r7', '$r8', '$r9', '$r10', '$r11', '$r12', '$r13', '$r14', '$r15', '$r16', '$r17', 
  '$r18', '$r19', '$r20', '$r21', '$r22', '$r23', '$r24', '$r25', '$r26', '$r27', '$r28', '$r29', '$r30', '$r31', '$r32', '$r33', 
  '$r34', '$r35', '$r36', '$r37', '$r38', '$r39', '$r40', '$r41', '$r42', '$r43', '$r44', '$r45', '$r46', '$r47', '$r48', '$r49', 
  '$r50', '$r51', '$r52', '$total', '$adaptabilidad')";
  $result2 = $mysqli->query($query2);

    if($result) {
        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='../subdireccion_de_analisis_de_riesgo/instrumento_adaptabilidad.php';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");
      
    }

?>
