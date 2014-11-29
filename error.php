<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">
			<div class="col-md-10 col-md-offset-1">
			<h1>
			<?php
			if(isset($_GET["error"])){
				switch($_GET["error"]){
					case 1:
						echo 'Error al intentar registrarse';
						break;
					case 2:
						echo 'Por favor llene todos los campos';
						break;
					case 3:
						echo "Ese usuario ya existe,intenta con otro";
						break;
					case 4:
						echo "El Captcha es incorrecto";
						break;
				}
			}else{
				if($_GET["errorn"]){
					echo $_GET["errorn"];
				}
			}
			
			?>
			</h1>
			</div>
		</div>
	</div>
	<?php
	include("registrarse.php");
	?>
</body>
</html>