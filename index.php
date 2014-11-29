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
	<title>Code Door</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
	<?php 
	include("includes/nav.php");
	
	if($_SESSION["Usuario"]!=NULL){
		include("index_loggeado.php");
	}else{
		include("login.php");
	}
	?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('.dropdown-toggle').dropdown();

	</script>
</body>
</html>