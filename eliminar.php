<?php
include("config.php");

if(isset($_GET["id_proyecto"])){
	$id = $_GET["id_proyecto"];
	mysql_query("UPDATE Proyectos SET Habilitado='1' WHERE ID='$id'");
	header("Location:index.php");
}

if(isset($_GET["id_usuario"])){
	$id = $_GET["id_usuario"];
	mysql_query("UPDATE Usuarios SET Habilitado='1' WHERE ID='$id'");
	header("Location:cerrar.php");
	
}

?>