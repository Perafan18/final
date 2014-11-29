<?php
include("config.php");

recordar($_COOKIE["Usuario"]);
$a1=0;
					$a11=0;
					$a12=0;
					$a13=0;
					$a2=0;
					$a21=0;
					$a22=0;
					$a23=0;
					$a3=0;
					$a31=0;
					$a32=0;
					$a33=0;
					$a4=0;
					$a41=0;
					$a42=0;
					$a43=0;
					$a5=0;
					$a51=0;
					$a52=0;
					$a53=0;
					$a6=0;
					$a61=0;
					$a62=0;
					$a63=0;
					$a7=0;
					$a71=0;
					$a72=0;
					$a73=0;
					$a8=0;
					$a81=0;
					$a82=0;
					$a83=0;
					
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultados de encuesta</title>
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
				$sql = mysql_query("SELECT * FROM Encuesta");
				while($row = mysql_fetch_array($sql)){
					
					switch($row["a1"]) {
						case 1:
							$a11+=1;
							$a1+=1;
							break;
						case 2:
							$a12+=1;
							$a1+=1;
							break;
						case 3:
							$a13+=1;
							$a1+=1;
							break;
					}
					
					switch($row["a2"]) {
						case '1':
							$a21+=1;
							$a2+=1;
							break;
						case "2":
							$a22+=1;
							$a2+=1;
							break;
						case "3":
							$a23+=1;
							$a2+=1;
							break;
					}
					
					switch($row["a3"]) {
						case '1':
							$a31+=1;
							$a3+=1;
							break;
						case "2":
							$a32+=1;
							$a3+=1;
							break;
						case "3":
							$a33+=1;
							$a3+=1;
							break;
					}
					
					switch($row["a4"]) {
						case '1':
							$a41+=1;
							$a4+=1;
							break;
						case "2":
							$a42+=1;
							$a4+=1;
							break;
						case "3":
							$a43+=1;
							$a4+=1;
							break;
					}
					
					switch($row["a5"]) {
						case '1':
							$a51+=1;
							$a5+=1;
							break;
						case "2":
							$a52+=1;
							$a5+=1;
							break;
						case "3":
							$a53+=1;
							$a5+=1;
							break;
					}
					
					
					switch($row["a6"]) {
						case '1':
							$a61+=1;
							$a6+=1;
							break;
						case "2":
							$a62+=1;
							$a6+=1;
							break;
						case "3":
							$a63+=1;
							$a6+=1;
							break;
					}
					
					
					switch($row["a7"]) {
						case '1':
							$a71+=1;
							$a7+=1;
							break;
						case "2":
							$a72+=1;
							$a7+=1;
							break;
						case "3":
							$a73+=1;
							$a7+=1;
							break;
					}
					
					
					switch($row["a8"]) {
						case '1':
							$a81+=1;
							$a8+=1;
							break;
						case "2":
							$a82+=1;
							$a8+=1;
							break;
						case "3":
							$a83+=1;
							$a8+=1;
							break;
					}
					
				}
$a11= ($a11/$a1)*100;
					$a12= ($a12/$a1)*100;
					$a13= ($a13/$a1)*100;
					
					$a21= ($a21/$a2)*100;
					$a22= ($a22/$a2)*100;
					$a23= ($a23/$a2)*100;
					
					$a31= ($a31/$a3)*100;
					$a32= ($a32/$a3)*100;
					$a33= ($a33/$a3)*100;
					
					$a41= ($a41/$a4)*100;
					$a42= ($a42/$a4)*100;
					$a43= ($a43/$a4)*100;
					
					$a51= ($a51/$a5)*100;
					$a52= ($a52/$a5)*100;
					$a53= ($a53/$a5)*100;
					
					$a61= ($a61/$a6)*100;
					$a62= ($a62/$a6)*100;
					$a63= ($a63/$a6)*100;
					
					$a71= ($a71/$a7)*100;
					$a72= ($a72/$a7)*100;
					$a73= ($a73/$a7)*100;
					
					$a81= ($a81/$a8)*100;
					$a82= ($a82/$a8)*100;
					$a83= ($a83/$a8)*100;
					
				?>

				<font face="Arial"><h2>Resultados de la encuesta</h2> </font>
					<strong>¿El sitio web cumple tus espectativas?</strong>
                    <div class="progress">
                        <?php if($a11!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a11?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a11?>%;">Si <?=$a11?>%</div><?php }?>
                        <?php if($a12!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a12?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a12?>%;">No <?=$a12?>%</div><?php }?>
                        <?php if($a13!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a13?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a13?>%;">Algunas veces <?=$a13?>%</div><?php }?>
                    </div>
 
                    <strong>¿Qué cambiarias de la pagina?</strong>
                    <div class="progress">
                        <?php if($a21!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a21?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a21?>%;">Diseño <?=$a21?>%</div><?php }?>
                        <?php if($a22!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a22?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a22?>%;">Usabilidad <?=$a22?>%</div><?php }?>
                       	<?php if($a23!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a23?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a23?>%;">Dinamica <?=$a23?>%</div><?php }?>
                    </div>
                    
                    <strong>¿Te gustaria que manejaramos otro lenguaje de programación?</strong>
                    <div class="progress">
                        <?php if($a31!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a31?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a31?>%;">Si <?=$a31?>%</div><?php }?>
                        <?php if($a32!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a32?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a32?>%;">No <?=$a32?>%</div><?php }?>
                        <?php if($a33!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a33?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a33?>%;">Quizá <?=$a33?>%</div><?php }?>
                    </div>

                    <strong>¿Crees que la pagina te ha sido util?</strong>
                    <div class="progress">
                        <?php if($a41!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a41?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a41?>%;">Si <?=$a41?>%</div><?php }?>
                        <?php if($a42!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a42?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a42?>%;">No <?=$a42?>%</div><?php }?>
                        <?php if($a43!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a43?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a43?>%;">Algunas veces <?=$a43?>%</div><?php }?>
                    </div>

                    <strong>Selecciona la calificación que le considera para este sitio</strong>
                    <div class="progress">
                        <?php if($a51!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a51?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a51?>%;">Bueno(8-10) <?=$a51?>%</div><?php }?>
                        <?php if($a52!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a52?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a52?>%;">Regular(6-7) <?=$a52?>%</div><?php }?>
                        <?php if($a53!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a53?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a53?>%;">Malo(6 o menos) <?=$a53?>%</div><?php }?>
                    </div>
                    
                    <strong>¿Te gustaria una aplicación para tu celular?</strong>
                    <div class="progress">
                        <?php if($a61!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a61?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a61?>%;">Si <?=$a61?>%</div><?php }?>
                        <?php if($a62!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a62?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a62?>%;">No <?=$a62?>%</div><?php }?>
                        <?php if($a63!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a63?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a63?>%;">Tal vez <?=$a63?>%</div><?php }?>
                    </div>
                    <strong>¿Cuál es tu impresión de la interfaz?</strong>
                    <div class="progress">
                        <?php if($a71!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a71?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a71?>%;">Buena <?=$a71?>%</div><?php }?>
                        <?php if($a72!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a72?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a72?>%;">Mala <?=$a72?>%</div><?php }?>
                        <?php if($a73!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a73?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a73?>%;">Regular <?=$a73?>%</div><?php }?>
                    </div>
                    <strong>¿El sitio te parece profesional?</strong>
                    <div class="progress">
                        <?php if($a81!=0){?><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$a81?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a81?>%;">Si <?=$a81?>%</div><?php }?>
                        <?php if($a82!=0){?><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?=$a82?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a82?>%;">No <?=$a82?>%</div><?php }?>
                        <?php if($a83!=0){?><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$a83?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$a83?>%;">Obvio <?=$a83?>%</div><?php }?>
                    </div>
			</div>	
		</div>
		
	</div>
</body>
</html>