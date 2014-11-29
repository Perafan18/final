<?php
include("config.php");

if(!isset($_GET["id"])){
	header("Location:index.php");
}else{
	$token = $_GET["id"];
	$sql = mysql_query("SELECT * FROM Recuperar WHERE TOKEN='$token' AND Habilitado='0'");
	if(mysql_num_rows($sql)==0){
		header("Location:index.php");
	}
}

if(isset($_POST["correo"])&&isset($_POST["nueva_contrasena"])){
	$token = $_POST["token"];
	$correo = $_POST["correo"];
	$pw = sha1($_POST["nueva_contrasena"]);
	$sql = mysql_query("SELECT * FROM Recuperar WHERE TOKEN='$token' AND Usuario='$id_user' AND Habilitado='0'");
	if(mysql_num_rows($sql)==na0){
		mysql_query("UPDATE Usuarios SET Pw='$pw' WHERE Correo='$correo' ");
		$error = "Listo! <a href='index.php'>Iniciar Sesión</a>";
	}else{
		$error = "Ese token ya fue usado<br/>";
	}
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyectos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-notify.css" />
</head>
<body>
	<?php include("includes/nav.php");?>
	<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('captcha', {
          'sitekey' : '6LdZFf4SAAAAACn6DgfVUhdwYpoHNjz1F3ZCTidV'
        });
      };

    </script>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">
			<div class="col-md-6 col-md-offset-3 well">
				<?php
				if(isset($error)){
					echo $error;
				}
				?>
				<form action="" class="form-horizontal" role="form"  method="post">
					<input type="hidden" class="form-input" value="<?=$_GET["id"]?>" name="token"/>
				  	
				  	<div class="form-group">
				  	<label for="" class="col-md-2 label-control">Correo Electronico</label>
						<div class="col-md-10">
				  			<input type="email" name="correo" placeholder="Correo"/>
				  		</div>
				  	</div>
				  	<div class="form-group">
				  	<label for="" class="col-md-2 label-control">Nueva Contraseña</label>
						<div class="col-md-10">
							<input type="password" name="nueva_contrasena" placeholder="Nueva Contrasena"/>
						</div>
				  	</div>
					<div class="form-group">
						
							  <div id="captcha"></div>
	
						</div>
					</div>
					<input type="submit" name="n_c" value="Cambiar Contraseña"/>
				</form>
			</div>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-notify.js"></script>
</body>
</html>