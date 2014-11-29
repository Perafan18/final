<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mensaje</title>
</head>

<body>

<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$para = '130484@upslp.edu.mx';
$titulo = 'Opinion';
$header = 'From: ' .$email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
  
if ($_POST['submit']) {
if (mail($para, $titulo, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'http://www.dokdas.com/codedoor/index.php';
</script>";
}
else {
echo "<script language='javascript'>
alert('Falló envio, llena todos los campos');
window.location.href = 'http://www.dokdas.com/codedoor/contact.php';
</script>";
}
}
?>
</body>
</html>