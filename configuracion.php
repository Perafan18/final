<?php
include 'config.php';
verificar_usuario($_SESSION["ID"]);

if(isset($_GET["id"])){

		$id_proyecto = $_GET["id"];
		$user = $_SESSION["ID"];
		$sql = mysql_query("SELECT * FROM Proyectos WHERE ID='$id_proyecto' AND Admin='$user' ");
		if($row = mysql_fetch_array($sql)){
			$nombre_proyecto =  $row["Nombre"];
		}else{
			header("Location:index.php");
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
		<div class="col-md-12">
			
		</div>
	</div>
</div>
</body>
</html>