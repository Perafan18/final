
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
    <title>Editor</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body>
    <?php include("includes/nav.php");?>
    <div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		
        <div class="row-fluid">
        	<div class="col-md-2 ">
        		<ul class="nav nav-pills nav-stacked" role="tablist">
					<li class="active"><a href="#" id="abrir">archivo.html</a></li>
				</ul>

            </div>
            <div class="col-md-10 well">
                <textarea id="archivo"></textarea>       
            </div>
        </div>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/editor.js"></script>
        <script>
    $(document).on("ready",function(){
        $("#abrir").click(function(){
            var texto;
            var archivo = "archivo.html";
            setInterval(function(){
                $.ajax({
                     url: "script.php",
                    type: "POST",
                    data: { archivo : archivo},
                    dataType: "html"
                }).done(function(html){
                    $("#archivo").text(html);
                });
         },100); 
         
          $("#archivo").change(function() {
                texto = $("#archivo").val();
                $.ajax({
                     url: "guardar.php",
                    type: "POST",
                    data: { archivo : archivo,texto : texto}
                }); 
           });
            
        });
    });

    </script>
</body>
</html>