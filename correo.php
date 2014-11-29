<?php
   include 'config.php';
	if(isset($_GET["id"])){
		switch ($_GET["id"]) {
			case '1':
				$mensaje = "Listo! revisa tu bandeja de correo";
				break;
			case '2':
				$mensaje = "Correo o Usuario no valido";
				break;
			default:
				$mensaje = "Error!";
				break;
		}
	}else{
		header("Location:index.php");
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="css/css.css" />
</head>
<body>
	<?php
	include("includes/nav.php");
	?>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">
			<div class="col-md-12 well">
				<h1><?=$mensaje?></h1>
				<a href="index.php">Volver al login</a>
			</div>
		</div>
	</div>
</body>
</html>