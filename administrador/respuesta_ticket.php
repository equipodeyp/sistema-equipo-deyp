<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

/*require 'conexion.php';*/
// error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../../../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
// echo $name;
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$result_area = $mysqli->query($sentencia);
$row_area=$result_area->fetch_assoc();
$area = $row_area['area'];
// echo $area;
$result_nombre = $mysqli->query($sentencia);
$row_nombre=$result_nombre->fetch_assoc();
$nombre = $row_nombre['nombre'];
// echo $nombre;
$result_apellido_p = $mysqli->query($sentencia);
$row_apellido_p=$result_apellido_p->fetch_assoc();
$apellido_p = $row_apellido_p['apellido_p'];
// echo $apellido_p;
$result_apellido_m = $mysqli->query($sentencia);
$row_apellido_m=$result_apellido_m->fetch_assoc();
$apellido_m = $row_apellido_m['apellido_m'];
// echo $apellido_m;

// $mail = new PHPMailer(true);




  if (isset($_POST['update'])) {    
    $id = $_GET['id'];
    // echo $id;

    $fecha_atencion= $_POST['fecha_atencion'];
    // echo $fecha_atencion;
    $estatus = $_POST['estatus'];
    // echo $estatus;
    $atendido_por = $_POST['atendido_por'];
    // echo $atendido_por;
    $respuesta = $_POST['respuesta'];
    // echo $respuesta;

    $consul = "SELECT* FROM tickets WHERE id='$id'";
    $resultado_consul = $mysqli->query($consul);
    $fila_resul =  $resultado_consul->fetch_assoc();
    $folio_resul = $fila_resul['folio_expediente'];

    $folio_incidencia = $fila_resul['folio_reporte'];
    // echo $folio_incidencia;
    $folio_exp = $fila_resul['folio_expediente'];
    // echo $folio_exp;
    $nom_usuario = $fila_resul['usuario'];
    // echo $nom_usuario;
    $sub = $fila_resul['subdireccion'];
    // echo $sub;
    $tipo = $fila_resul['tipo'];
    // echo $tipo;
    $descripcion_error = $fila_resul['descripcion'];
    // echo $descripcion_error;
    
    $query = "UPDATE tickets set fecha_atencion = '$fecha_atencion', estatus = '$estatus', usuario_atencion = '$atendido_por', respuesta = '$respuesta' WHERE id=$id";
    mysqli_query($mysqli, $query);

    $body = "<h1 style='text-align:center; color: #FFF; font-weight: bold; background-color: #722F37;'>SISTEMA INFORMÁTICO DEL PROGRAMA DE PROTECCIÓN A SUJETOS QUE INTERVIENEN EN EL PROCEDIMIENTO PENAL O DE EXTINCIÓN DE DOMINIO (SIPPSIPPED).</h1><br></br>" . 
              "<h2 style='color: #000000; font-weight: bold;'>¡Estimado usuario su incidencia ha sido atendida con éxito! Favor de verificar la información en el sistema.</h2><br>" . "<h4 style='color: #000000;'>FOLIO DE LA INCIDENCIA: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$folio_incidencia</h4>" .
              "<h4 style='color: #000000;'>FOLIO DEL EXPEDIENTE: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$folio_exp</h4>" . "<h4 style='color: #000000;'>USUARIO QUE REPORTA LA INCIDENCIA: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$nom_usuario</h4>" .
              "<h4 style='color: #000000;'>TIPO DE FALLA O ERROR: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$tipo</h4>" . "<h4 style='color: #000000;'>DESCRIPCIÓN BREVE DE LA FALLA O ERROR: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$descripcion_error</h4>" .
              "<h4 style='color: #000000;'>ESTATUS DE LA INCIDENCIA: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$estatus</h4>" . "<h4 style='color: #000000;'>FECHA Y HORA DE ATENCIÓN: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$fecha_atencion</h4>" . 
              "<h4 style='color: #000000;'>INCIDENCIA ATENDIDA POR: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$atendido_por</h4>" . "<h4 style='color: #000000;'>RESPUESTA A LA INCIDENCIA: </h4>" . "<h4 style='color: #722F37; font-weight: bold;'>$respuesta</h4>";

    $asunto = "Respuesta de la incidencia: " . $folio_incidencia;
    
    if ($query){
    // echo $nom_usuario;
    $mail = new PHPMailer(true);

            if ($nom_usuario === 'JONATHAN EDUARDO SANTIAGO JIMÉNEZ'){

              ////////////////////////
              // echo 'hola';
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
              $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
              // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
              $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
              $mail->addAddress('jsantiagoj@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');
  
              //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $asunto;
              // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
              $mail->Body = $body;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              $mail->CharSet = 'UTF-8';
              $mail->send();
              echo $verifica;
              echo ("<script type='text/javaScript'>
                        window.location.href='tickets.php?folio=$folio_exp';
                        window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                        </script>");
            }



            elseif ($nom_usuario === 'GABRIELA PICHARDO GARCÍA') { 
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
              $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
              // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
              $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
              $mail->addAddress('gapichardoga@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');
  
              //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $asunto;
              // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
              $mail->Body = $body;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              $mail->CharSet = 'UTF-8';
              $mail->send();
              echo $verifica;
              echo ("<script type='text/javaScript'>
                        window.location.href='tickets.php?folio=$folio_exp';
                        window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                        </script>");
            }



            elseif ($nom_usuario === 'AZAEL OLIVAR GARCIA') { 
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
              $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
              // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
              $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
              $mail->addAddress('azolivarg@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');
  
              //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $asunto;
              // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
              $mail->Body = $body;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              $mail->CharSet = 'UTF-8';
              $mail->send();
              echo $verifica;
              echo ("<script type='text/javaScript'>
                        window.location.href='tickets.php?folio=$folio_exp';
                        window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                        </script>"); 
            }



            elseif ($nom_usuario === 'DIRCE YERED CUENCA ESTRADA') { 
            
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
            $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
            // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
            $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
            $mail->addAddress('dcuenca@fiscaliaedomex.gob.mx');              //Name is optional
            // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $asunto;
            // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
            $mail->Body = $body;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->CharSet = 'UTF-8';
            $mail->send();
            echo $verifica;
            echo ("<script type='text/javaScript'>
                      window.location.href='tickets.php?folio=$folio_exp';
                      window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                      </script>"); 
            }



            elseif ($nom_usuario === 'JESÚS ALEJANDRO ARCHUNDIA ZEPEDA') { 
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
              $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
              // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
              $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
              $mail->addAddress('jearchundiaz@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');
  
              //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $asunto;
              // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
              $mail->Body = $body;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              $mail->CharSet = 'UTF-8';
              $mail->send();
              echo $verifica;
              echo ("<script type='text/javaScript'>
                        window.location.href='tickets.php?folio=$folio_exp';
                        window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                        </script>"); 
            }



            elseif ($nom_usuario === 'ADRIANA HERNÁNDEZ ESPINOZA') { 
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
              $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
              // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
              $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azolivarg@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');
  
              //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $asunto;
              // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
              $mail->Body = $body;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              $mail->CharSet = 'UTF-8';
              $mail->send();
              echo $verifica;
              echo ("<script type='text/javaScript'>
                        window.location.href='tickets.php?folio=$folio_exp';
                        window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                        </script>"); 
            } 



            elseif ($nom_usuario === 'DIANA GONZÁLEZ VALLEJO') { 
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
              $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
              // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
              $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
              $mail->addAddress('dgonzalezv@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');
  
              //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $asunto;
              // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
              $mail->Body = $body;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              $mail->CharSet = 'UTF-8';
              $mail->send();
              echo $verifica;
              echo ("<script type='text/javaScript'>
                        window.location.href='tickets.php?folio=$folio_exp';
                        window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                        </script>"); 
            } 



            elseif ($nom_usuario === 'JUAN GUILLERMO GUERRERO VARGAS') { 
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
              $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED');
              // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
              $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
              $mail->addAddress('jgguerrerov@fiscaliaedomex.gob.mx');              //Name is optional
              // $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');
  
              //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $asunto;
              // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
              $mail->Body = $body;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              $mail->CharSet = 'UTF-8';
              $mail->send();
              echo $verifica;
              echo ("<script type='text/javaScript'>
                        window.location.href='tickets.php?folio=$folio_exp';
                        window.alert('!!!!!Registro exitoso¡¡¡¡¡');
                        </script>"); 
            }



            // else {
            //   $mail->SMTPDebug = 0;                      //Enable verbose debug output
            //   $mail->isSMTP();                                            //Send using SMTP
            //   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            //   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            //   $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
            //   $mail->Password   = 'bepnsedjwpkpincr';                               //SMTP password
            //   $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            //   $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
            //   //Recipients
            //   $mail->setFrom('dpye_principal@gmail.com', 'INCIDENCIAS - SIPPSIPPED - USUARIO NO AUTENTICADO');
            //   $mail->addAddress('gapichardoga@fiscaliaedomex.gob.mx');     //Add a recipient
            //   $mail->addAddress('ahernandeze@fiscaliaedomex.gob.mx');              //Name is optional
            //   $mail->addAddress('azolivarg@fiscaliaedomex.gob.mx');              //Name is optional
            //   $mail->addAddress('jsantiagoj@fiscaliaedomex.gob.mx');              //Name is optional
            //   // $mail->addReplyTo('info@example.com', 'Information');
            //   // $mail->addCC('cc@example.com');
            //   // $mail->addBCC('bcc@example.com');
  
            //   //Attachments
            //   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
            //   //Content
            //   $mail->isHTML(true);                                  //Set email format to HTML
            //   $mail->Subject = $asunto;
            //   // $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
            //   $mail->Body = $body;
            //   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            //   $mail->CharSet = 'UTF-8';
            //   $mail->send();
            //   echo $verifica;
            //   echo ("<script type='text/javaScript'>
            //             window.location.href='tickets.php?folio=$folio_exp';
            //             window.alert('!!!!!Registro exitoso¡¡¡¡¡');
            //             </script>"); 
            // }   
    }
}

?>