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
	<title>Encuesta de satisfacción</title>
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
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row fluid">
			<div class="col-md-10 col-md-offset-1 well">
				<?php
				if(isset($_GET["error"])){
					echo '<div class="alert alert-danger" role="alert">';
					switch ($_GET["error"]) {
						case 1:
							echo 'LLena todos los campos';
							break;
						case 2:
							echo 'Error en la base de datos';
							break;
						default:
							echo 'Valor inválido';
							break;
					}
					echo '</div>';
				}
				if(isset($_GET["listo"])){
					echo '<div class="alert alert-success" role="alert"> La encuesta se ha enviado, gracias por contestar </div>';
				}
				?>
				<font face="Arial"><h2>Responda la siguiente encuesta porfavor</h2> </font>
				<form action="instrucciones.php" method="post">
					<div class="form-group">
						<label for="">¿El sitio web cumple tus espectativas?</label><br />
						<input type="radio" name="1"  value="1"/> Si
						<input type="radio" name="1"  value="2"/> No
						<input type="radio" name="1"  value="3"/> Algunas veces
					</div>
					<div class="form-group">
						<label for="">¿Qué cambiarias de la pagina?</label><br />
						<input type="radio" name="2" value="1"/> Diseño 
						<input type="radio" name="2" value="2"/> Usabilidad
						<input type="radio" name="2" value="3"/> Dinamica
					</div>
					<div class="form-group">
						<label for="">¿Te gustaria que manejaramos otro lenguaje de programación?</label><br />
						<input type="radio" name="3" value="1"/>Si 
						<input type="radio" name="3" value="2"/>No
						<input type="radio" name="3" value="3"/>Quizá
					</div>
					<div class="form-group">
						<label for="">¿Crees que la pagina te ha sido util?</label><br />
						<input type="radio" name="4" value="1"/> Si
						<input type="radio" name="4" value="2"/> No
						<input type="radio" name="4" value="3"/> Algunas veces
					</div>
					<div class="form-group">
						<label for="">Selecciona la calificación que le considera para este sitio</label><br />
						<input type="radio" name="5" value="1"/> Bueno(8-10)
						<input type="radio" name="5" value="2"/> Regular(6-7)
						<input type="radio" name="5" value="3"/> Malo(6 o menos)
					</div>
					<div class="form-group">
						<label for="">¿Te gustaria una aplicación para tu celular?</label><br />
						<input type="radio" name="6" value="1"/> Si
						<input type="radio" name="6" value="2"/> No
						<input type="radio" name="6" value="3"/> Tal vez
					</div>
					<div class="form-group">
						<label for="">¿Cuál es tu impresión de la interfaz?</label><br />
						<input type="radio" name="7" value="1"/> Buena 
						<input type="radio" name="7" value="2"/> Mala
						<input type="radio" name="7" value="3"/> Regular
					</div>
					<div class="form-group">
						<label for="">¿El sitio te parece profesional?</label><br />
						<input type="radio" name="8" value="1"/> Si
						<input type="radio" name="8" value="2"/> No
						<input type="radio" name="8" value="3"/> Obvio
					</div>
                    <input type="submit" name="enviar_encuesta" class="btn btn-success" value="Envia encuesta"/>      <a href="resultados.php">Resultados de la encuesta</a>
				</form>
			</div>	
		</div>
		
	</div>
</body>
</html>