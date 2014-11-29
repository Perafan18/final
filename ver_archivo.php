<?php
include("config.php");
if(isset($_GET["ID"])){
	$id = $_GET["ID"];
	$sql = mysql_query("SELECT * FROM Archivos WHERE ID='$id'");
	if($row = mysql_fetch_array($sql)){
	$r = '<div id="file" style="display:none">'.$row["Proyecto"].'/'.$row["Nombre"].'</div>';
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
	echo $r; 
	?>
	<div id="archivo">
		
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).on("ready",function(){
			setInterval(function(){
				var archivo = $("#file").text(); 
                $.ajax({
                     url: "script.php",
                    type: "POST",
                    data: { archivo : archivo},
                    dataType: "html"
                }).done(function(html){
                    $("#archivo").html(html);
                });
        

			},1000);
		});
	</script>
	
</body>
</html>