<?php
$identificador = $_GET['folio'];
echo ("<script type='text/javaScript'>


'sujeto();',
 window.location.href='../administrador/detalles_persona.php?folio=$identificador';
 window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");

?>
