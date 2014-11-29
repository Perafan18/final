<?php
include("config.php");

if(!isset($_GET["id"])){
	header("Location:index.php");
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
<link rel="stylesheet" href="code/lib/codemirror.css">
<link rel="stylesheet" href="code/theme/monokai.css" />
<script src="code/lib/codemirror.js"></script>
<script src="code/mode/javascript/javascript.js"></script>
<link rel="stylesheet" href="doc/docs.css">


<script src="code/mode/xml/xml.js"></script>
<script src="code/mode/css/css.js"></script>
<script src="code/mode/htmlmixed/htmlmixed.js"></script>
<script src="code/addon/edit/matchbrackets.js"></script>

<script src="code/doc/activebookmark.js"></script>

	
</head>
<body>
	<?php include("includes/nav.php");?>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid" >
			<div class="col-md-12 ">
			<form>
				<a href="ver_archivo.php?ID=<?=$_GET["id"]?>" class="btn btn-primary" target="_blank">Ver Vista Previa</a><br/><br/>
<textarea id="demotext">
<?php
$id_archivo = $_GET["id"];
$sql = mysql_query("SELECT * FROM Archivos WHERE ID='$id_archivo' AND Habilitado='0'");
if($row = mysql_fetch_array($sql)){
$archivo = $row["Proyecto"].'/'.$row["Nombre"];

$arch = fopen("archivos/$archivo", "r");
while(!feof($arch)){
	$html = fscanf($arch,"%[^\n] \n");
	foreach ($html as $key => $value) {
		printf("%s \n",$value);
	}
}
fclose($arch);
}else{
	header("Location:index.php");
}
?>
</textarea>
<input type="hidden" id="archivo" value="<?=$archivo?>"/>
			</form>
			</div>

  <script>
    var editor = CodeMirror.fromTextArea(document.getElementById("demotext"), {
      lineNumbers: false,
      mode: "text/html",
      matchBrackets: false,
      theme : "monokai",
    });
  </script>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).on("ready",function(){

				
			setInterval(function(){
				
                var texto = $(".CodeMirror-code").text();
                var archivo = $("#archivo").val();
                console.log(texto);
                $.ajax({
                     url: "guardar.php",
                    type: "POST",
                    data: { archivo : archivo,texto : texto}
                }).done(function(msg){
                	console.log(msg);
                }); 
                i=1;
                console.log("Guardando");
			},1000);
		});
	</script>
</body>
</html>