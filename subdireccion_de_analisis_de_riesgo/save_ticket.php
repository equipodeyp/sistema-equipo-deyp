<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer//SMTP.php';

error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
  unset($_SESSION['verifica']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();

  $fol_exp = $_GET['folio'];
  // echo $fol_exp;
  $sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
  $resultado = $mysqli->query($sql);
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $folio_reporte = $_POST['folio_reporte'];
  // $folio_expediente = $_POST['folio_expediente'];
  $usuario = $_POST['usuario'];
  $subdireccion_usuario = $_POST['subdireccion'];
  $tipo_error = $_POST['tipo'];
  $descripcion_error = $_POST['descripcion'];
  $status = $_POST['estatus'];

  date_default_timezone_set('UTC');
  date_default_timezone_set("America/Mexico_City");
  $hoy = date("d-m-Y H:i:s a");  
  // echo $hoy;
        
  $query = "INSERT INTO tickets (folio_reporte, folio_expediente, usuario, subdireccion, tipo, descripcion, estatus) 
  VALUES ('$folio_reporte', '$fol_exp', '$usuario', '$subdireccion_usuario', '$tipo_error', '$descripcion_error', '$status')";
  $result = $mysqli->query($query);

  $folio_incidencia = $_POST["folio_reporte"];
  $folio_expediente = $_POST["folio_expediente"];
  $nombre_usuario = $_POST["usuario"];
  $subdireccion = $_POST["subdireccion"];
  $descripcion = $_POST["descripcion"];

  $body = "<h1 style='text-align:center; color: #FFF; font-weight: bold; background-color: #722F37;'>SISTEMA INFORMÁTICO DEL PROGRAMA DE PROTECCIÓN A SUJETOS QUE INTERVIENEN EN EL PROCEDIMIENTO PENAL O DE EXTINCIÓN DE DOMINIO (SIPPSIPPED).</h1><br><br>" . 
          "<h2 style='color: #000000; font-weight: bold;'>Estimado usuario usted ha registrado una nueva incidencia con los siguientes datos: </h2><br>" . "<h4 style='color: #000000;'>FOLIO DE LA INCIDENCIA: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$folio_incidencia</h4>" . 
          "<h4 style='color: #000000;'>FOLIO DEL EXPEDIENTE: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$folio_expediente</h4>" . "<h4 style='color: #000000;'>NOMBRE DE USUARIO: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$nombre_usuario</h4>" . 
          "<h4 style='color: #000000;'>SUBDIRECCIÓN: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$subdireccion</h4>" . "<h4 style='color: #000000;'>FECHA Y HORA DE LA SOLICITUD: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$hoy</h4>" . 
          "<h4 style='color: #000000;'>DESCRIPCIÓN BREVE DE LA FALLA O ERROR: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$descripcion</h4>";

  $asunto = "Nueva Incidencia: " . $folio_incidencia;
      
  $sent=" SELECT id, folio_expediente FROM tickets WHERE folio_expediente='$folio_expediente'";
  $resu = $mysqli->query($sent);
  $ro=$resu->fetch_assoc();
  $folio=$ro["fol_exp"];

    if($result) {

      $num_user=rand(1,24);
      $mail = new PHPMailer(true);

      if ($num_user === 1 || $num_user === 4 || $num_user === 7 || $num_user === 10 || $num_user === 13 || $num_user === 16 || $num_user === 19 || $num_user === 22) {
              //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
      $mail->Password   = 'gpfpcklmhcsvlpce';                               //SMTP password
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
      $mail->addAddress('sippsipped@fiscaliaedomex.gob.mx');     //Add a recipient
      $mail->addAddress('jgguerrerov@fiscaliaedomex.gob.mx');              //Name is optional
      $mail->addAddress('azolivarg@fiscaliaedomex.gob.mx');              //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $asunto;
      $mail->Body    = $body;
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $mail->CharSet = 'UTF-8';
      $mail->send();
      echo $verifica;
      echo ("<script type='text/javaScript'>
                window.location.href='../subdireccion_de_analisis_de_riesgo/tickets.php?folio=$fol_exp';
                window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                </script>");
      }



      elseif ($num_user === 2 || $num_user === 5 || $num_user === 8 || $num_user === 11 || $num_user === 14 || $num_user === 17 || $num_user === 20 || $num_user === 23) {

        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
        $mail->Password   = 'gpfpcklmhcsvlpce';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
        //Recipients
        $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
        $mail->addAddress('sippsipped@fiscaliaedomex.gob.mx');     //Add a recipient
        $mail->addAddress('jgguerrerov@fiscaliaedomex.gob.mx');              //Name is optional
        $mail->addAddress('gapichardoga@fiscaliaedomex.gob.mx');              //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
  
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->CharSet = 'UTF-8';
        $mail->send();
        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='../subdireccion_de_analisis_de_riesgo/tickets.php?folio=$fol_exp';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");

      }


      elseif($num_user === 3 || $num_user === 6 || $num_user === 9 || $num_user === 12 || $num_user === 15 || $num_user === 18 || $num_user === 21 || $num_user === 24){

        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
        $mail->Password   = 'gpfpcklmhcsvlpce';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
        //Recipients
        $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
        $mail->addAddress('sippsipped@fiscaliaedomex.gob.mx');     //Add a recipient
        $mail->addAddress('jgguerrerov@fiscaliaedomex.gob.mx');              //Name is optional
        $mail->addAddress('jsantiagoj@fiscaliaedomex.gob.mx');              //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
  
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->CharSet = 'UTF-8';
        $mail->send();
        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='../subdireccion_de_analisis_de_riesgo/tickets.php?folio=$fol_exp';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");
      }
    }
}
?>
