<?php
include("config.php");
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
	<style type="text/css" media="screen">
		span{
			cursor: pointer;
		}
		.linea{
		   max-height: 20px;
			background-image: linear-gradient(to bottom, #E8E8E8 0px, #F5F5F5 100%);
			width:100%;
			border:none;
			font-size:15px;
			outline: none;
			overflow:hidden
		}
	</style>
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
            	<textarea wrap="off" class='linea'></textarea>	
            </div>
            
            <div id="archivo" class="col-md-10 well"> 
            	
            </div>
        </div>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/editor.js"></script>
        <script>
    $(document).on("ready",function(){
    	
        $("#abrir").click(function(){
			var i=1;
            var texto;
            var archivo = "archivo.html";
            setInterval(function(){
				if(i==1){
                $.ajax({
                     url: "script.php",
                    type: "POST",
                    data: { archivo : archivo},
                    dataType: "html"
                }).done(function(html){
                    $("#archivo").html(html);
                    console.log("Nuevo");
                });
                }
                i=0;
         	},1000); 
         
          $("#archivo").change(function() {
                texto = $("#archivo").text();
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

           });
           
	        $("body").delegate("span","click",function(){
	        	$("span").css("display","inline"); 
				$('.linea').remove();
	        	var texto = $(this).text();
	        	console.log("Texto: "+texto);
	        	$(this).after("<textarea class='linea'>"+texto+"</textarea>");
				$(this).remove();
	        });
	        
	        $("body").delegate("textarea","dblclick",function(){
	        	var texto = $(".linea").val();
	        	console.log("Nuevo: "+texto);
	        	$(this).after("<span>"+texto+"</span>");
	        	$(this).remove();
	        });    
	        
        });
    });

    </script>
</body>
</html>