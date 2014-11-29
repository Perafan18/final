<?php
include("config.php");

$id = $_GET["id"];
$sql = mysql_query("SELECT * FROM Usuarios WHERE ID='$id'");
if($row = mysql_fetch_array($sql)){
$nombre = $row["Nombre"];
}
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
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-8 col-md-offset-2 well" style="margin-top:75px;">
				<h1>Bienvenido  <?=$nombre?> ! </h1>
				<a href="editoralpha.php" class="btn btn-primary btn-block">Ir al Editor</a>	
			</div>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>