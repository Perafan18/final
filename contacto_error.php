<?

// definimos las variables o marcamos el error
if ( !empty($_POST['nombre']) ) $nombres = $_POST['nombre']; else $error = true;
if ( !empty($_POST['email']) ) $email = $_POST['email']; else $error = true;
if ( !empty($_POST['mensaje']) ) $mensaje = $_POST['mensaje']; else $error = true;

// verificamos que no exista un error
if ( !empty($error) ) {
header( 'Location: contacto_error.php' );
die;
}

// definimos el cuerpo del email
$cuerpo = "
De: $nombres \n\r
Email: $email \n\r
Mensaje: \n\r
$mensaje
";

// enviamos el email
if ( mail( 'direccion.del.destinatario@email.com','Recibiste un mensaje a través del formulario de contacto de tu sitio',$cuerpo ) ) {
header( 'Location: index.php' );
die;
} else {
header( 'Location: contacto_error.php' );
die;
}
?>