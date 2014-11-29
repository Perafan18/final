<?php
include("config.php");

recordar($_COOKIE["Usuario"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Opinión</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/estilo.css" >  
</head>
<body>
  <?php 
  include("includes/nav.php");
  ?>		
<div class="container">
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2 well" style="margin-top:100px;">
			<h1 class="text-center">¡Dinos tu Opinión! </h1></br>
			<form class="contact-form" role="form" action="mensaje.php" method="post">
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10"><input type="text" class="form-control" placeholder="Nombre" name="nombre"></div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Correo Electrónico</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3" placeholder="ejemplo@ejemplo.com" name="email">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Mensaje</label>
					<div class="col-sm-10"><textarea name="mensaje" id="mensaje" cols="50" rows="10"></textarea></div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-success" name="submit" value="Enviar Mensaje">
					</div>
				</div>
			</form>			
		</div>
	</div>
</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>