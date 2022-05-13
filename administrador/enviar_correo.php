<?php
// $folio_incidencia = $_POST["folio_reporte"];
// $folio_expediente = $_POST["folio_expediente"];
// $nombre_usuario = $_POST["usuario"];
// $subdireccion = $_POST["subdireccion"];
// $descripcion = $_POST["descripcion"];

// $body = "<b>SISTEMA INFORMÁTICO DEL PROGRAMA DE PROTECCIÓN A SUJETOS QUE INTERVIENEN EN EL PROCEDIMIENTO PENAL O DE EXTINCIÓN DE DOMINIO.</b><br>" .
//         "¡ Estimado usuario se a generado una nueva incidencia !<br>" . "FOLIO DE LA INCIDENCIA: " . $folio_incidencia . "<br>FOLIO DEL EXPEDIENTE: " . 
//         $folio_expediente . "<br>NOMBRE DE USUARIO: " . $nombre_usuario . "<br>SUBDIRECCIÓN: " . $subdireccion . "<br>DESCRIPCIÓN BREVE DE LA FALLA O ERROR: " . $descripcion;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

$sub = 2;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if ($sub === 1){
    $mail->IsSMTP();                // Sets up a SMTP connection
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
    $mail->Password   = '34596_Dir.Estadistica&Prevencion';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Encoding = '7bit';       // SMS uses 7-bit encoding

    //Recipients
    $mail->setFrom('dpye_principal@gmail.com', 'SIPPSIPPED');
    // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
    $mail->addAddress('azaelitoop89@gmail.com');              //Name is optional
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
    $mail->Subject = 'SIPPSIPPED: Generador de Incidencias';
    // $mail->Body    = $body;
    $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '¡ El mensaje se envio correctamente !';
    // $sent=" SELECT id, folio_expediente FROM tickets WHERE folio_expediente='$folio_expediente'";
    // $resu = $mysqli->query($sent);
    // $ro=$resu->fetch_assoc();
    // $folio=$ro["fol_exp"];
    // if($result) {
    //     echo $verifica;
    //     echo ("<script type='text/javaScript'>
    //             window.location.href='../administrador/tickets.php?folio=$fol_exp';
    //             window.alert('!!!!!Registro exitoso¡¡¡¡¡')
    //             </script>");
} 

elseif ($sub === 2){
    $mail->IsSMTP();                // Sets up a SMTP connection
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
    $mail->Password   = '34596_Dir.Estadistica&Prevencion';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Encoding = '7bit';       // SMS uses 7-bit encoding

    //Recipients
    $mail->setFrom('dpye_principal@gmail.com', 'SIPPSIPPED');
    // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
    $mail->addAddress('aolivargarcia35@gmail.com');              //Name is optional
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
    $mail->Subject = 'SIPPSIPPED: Generador de Incidencias';
    // $mail->Body    = $body;
    $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '¡ El mensaje se envio correctamente !';
    // $sent=" SELECT id, folio_expediente FROM tickets WHERE folio_expediente='$folio_expediente'";
    // $resu = $mysqli->query($sent);
    // $ro=$resu->fetch_assoc();
    // $folio=$ro["fol_exp"];
    // if($result) {
    //     echo $verifica;
    //     echo ("<script type='text/javaScript'>
    //             window.location.href='../administrador/tickets.php?folio=$fol_exp';
    //             window.alert('!!!!!Registro exitoso¡¡¡¡¡')
    //             </script>");
}
elseif ($sub === 3){
    $mail->IsSMTP();                // Sets up a SMTP connection
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dpye.principal@gmail.com';                     //SMTP username
    $mail->Password   = '34596_Dir.Estadistica&Prevencion';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Encoding = '7bit';       // SMS uses 7-bit encoding

    //Recipients
    $mail->setFrom('dpye_principal@gmail.com', 'SIPPSIPPED');
    // $mail->addAddress('7226585110@vtext.com');     //Add a recipient
    $mail->addAddress('azaelolivargarcia@gmail.com');              //Name is optional
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
    $mail->Subject = 'SIPPSIPPED: Generador de Incidencias';
    // $mail->Body    = $body;
    $mail->Body    = '<b>¡ Hola !</b> Este es un mensaje de prueba...';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '¡ El mensaje se envio correctamente !';
    // $sent=" SELECT id, folio_expediente FROM tickets WHERE folio_expediente='$folio_expediente'";
    // $resu = $mysqli->query($sent);
    // $ro=$resu->fetch_assoc();
    // $folio=$ro["fol_exp"];
    // if($result) {
    //     echo $verifica;
    //     echo ("<script type='text/javaScript'>
    //             window.location.href='../administrador/tickets.php?folio=$fol_exp';
    //             window.alert('!!!!!Registro exitoso¡¡¡¡¡')
    //             </script>");
}

// catch (Exception $e) {
//     echo "¡ Hubo un error en el envio del mensaje !: {$mail->ErrorInfo}";
// }
else{
    echo "¡ Hubo un error en el envio del mensaje !";
}

?>