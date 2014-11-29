<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Code Door</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<?php
include("includes/nav.php");
?>
  <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('captcha', {
          'sitekey' : '6LdZFf4SAAAAACn6DgfVUhdwYpoHNjz1F3ZCTidV'
        });
      };

    </script>
		
<div class="container">
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2 well" style="margin-top:100px;">
			<form class="form-horizontal" role="form" action="instrucciones.php" method="post">
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-10"><input type="text" class="form-control" placeholder="Usuario" name="Usuario"></div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10"><input type="text" class="form-control" placeholder="Nombre" name="Nombre"></div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Apellido Paterno</label>
					<div class="col-sm-10"><input type="text" class="form-control" placeholder="Apellido Paterno" name="AP"></div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Apellido Materno</label>
					<div class="col-sm-10"><input type="text" class="form-control" placeholder="Apellido Materno" name="AM"></div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Correo Electrónico</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3" placeholder="Correo Electrónico" name="email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" name="password">
					</div>
				</div>
				<!--
				<div class="form-group">
					<label for="" class="col-md-2 label-control"></label>
					<div class="col-md-10">
						  <div id="captcha"></div>

					</div>
				</div>
			-->
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">
						<button type="button" href="#"><?php $captcha = randomText(6);echo $captcha;?></button>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputPassword3" placeholder="Captcha" name="Captcha">
						<input type="hidden" name="verifCaptcha" value="<?=$captcha?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-success" name="registrarse" value="Registrarse">
					</div>
				</div>
			</form>			
		</div>
	</div>
</div>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>