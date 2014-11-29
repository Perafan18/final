<?php
include("config.php");

if(!isset($_POST["Busqueda"])){
	header("Location:index.php");
}
$busqueda = $_POST["Busqueda"];
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buscador</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-notify.css" />
</head>
<body>
	<?php include("includes/nav.php");?>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">
			<div class="col-md-12 well">
				<h1>Usuarios</h1>
				<div class="list-group">
				<?php
				$sql = mysql_query("SELECT * FROM Usuarios WHERE Usuario LIKE '%".$busqueda."%' ");
				if(mysql_num_rows($sql)==0){		
					echo '<a href="#" class="list-group-item">No hay resultados</a>';
				}
				while($row = mysql_fetch_array($sql)){
					echo '<a href="perfil.php?ID='.$row["ID"].'" class="list-group-item">'.$row["Usuario"].'</a>';
				}
				?>
				</div>
				
				<h1>Proyectos</h1>
				<div class="list-group">
				<?php
				$sql = mysql_query("SELECT * FROM Proyectos WHERE Nombre LIKE '%".$busqueda."%' AND Tipo='2'");
				if(mysql_num_rows($sql)==0){		
					echo '<a href="#" class="list-group-item">No hay resultados</a>';
				}
				while($row = mysql_fetch_array($sql)){
					echo '<a href="proyecto.php?id='.$row["ID"].'" class="list-group-item">'.$row["Nombre"].'</a>';
				}
				?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>