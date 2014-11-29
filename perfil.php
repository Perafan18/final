<?php
include ("config.php");

verificar_usuario($_SESSION["ID"]);

if(isset($_GET["ID"])){
	$id = $_GET["ID"];
}else{
	if(isset($_SESSION["ID"])){
	$id = $_SESSION["ID"];
	}else{
	header("Location:index.php");
	}
}
	$sql = mysql_query("SELECT * FROM Usuarios WHERE ID='$id' AND Habilitado='0'");
	if($row = mysql_fetch_array($sql)){
		$nombre_completo = $row["Nombre"].' '.$row["AP"].' '.$row["AM"];
		$nombre = $row["Nombre"];
		$ap = $row["AP"];
		$am = $row["AM"];
		$imagen = $row["Imagen"];
		if($imagen==NULL){
			$imagen = "img/perfil.png";
		}else{
			$imagen = "img/".$imagen;
			
		}
		$usuario = $row["Usuario"];
		$descripcion = $row["Descripcion"];
	}else{
		header("Location:usuariodes.php");
	}
	
	$sql = mysql_query("SELECT * FROM Seguir WHERE Siguiendo='$id' AND Habilitado='0' ");
	$seguidores = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM Seguir WHERE Seguidor='$id' AND Habilitado='0' ");
	$siguiendo = mysql_num_rows($sql);
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
</head>
<body>
	<?php include("includes/nav.php");?>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">

			<div class="col-md-12 well">
				<div class="row-fluid">
					<div class="col-md-3">
						<img src="<?=$imagen?>" alt="<?=$usuario?>" class="img-rounded img-responsive">
						<div class="btn-group-vertical col-md-12" role="group" aria-label="Vertical button group">
							<?php
							if(isset($_GET["ID"])){
								if($_GET["ID"]!=$_SESSION["ID"]){
									$id = $_GET["ID"];
									$sesion = $_SESSION["ID"];
									$sql = mysql_query("SELECT * FROM Seguir WHERE Siguiendo='$id' AND Seguidor='$sesion' AND Habilitado='0'");
									if(mysql_num_rows($sql)>0){
									echo '<a type="button" id="dejar_seguir" class="btn btn-warning btn-lg">Dejar de Seguir</a>';	
									}else{
									echo '<a type="button" id="seguir" class="btn btn-primary btn-lg">Seguir</a>';
									}
									echo '<a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-lg">Mandar mensaje</a>';
								}
							}
							?>
							<a type="button" class="btn btn-info btn-lg">Seguidores  <span class="badge"  id="seguidores"><?=$seguidores?></span> </a>
							<a type="button"  class="btn btn-info btn-lg">Siguiendo  <span class="badge"><?=$siguiendo?></span> </a>
							
										
							<?php
							if(isset($_GET["ID"])){
								if($_GET["ID"]==$_SESSION["ID"]){
									echo '<a type="button"  class="btn btn-warning btn-lg">Configuración</a>';
								}
							}else{
									echo '<a type="button" data-toggle="modal" data-target="#myModalDos"  class="btn btn-success btn-lg">Mensajes </a>
										<a type="button" id="config" class="btn btn-warning btn-lg">Configuración</a>';
								
							}
							?>
							
						</div>
					</div>
					<div class="col-md-9">
						<h1><?php echo $nombre_completo;?></h1> @<?=$usuario?>
						<p class="text-muted"> 
						<?=$descripcion?>
						</p>
						<div id="index">
							<!--
							<h2>Ultimos eventos</h2>
							<div class="alert alert-info" role="alert">
								<div class="col-md-3 col-md-offset-9">Fecha</div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</div>
							-->	
						</div>
						<div id="configuracion" style="display:none">
							<button class="btn btn-danger" id="salir">&times;</button>
							<form class="form-horizontal" action="instrucciones.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Foto de Perfil</label>
									<div class="col-sm-10">
										<input type="file" name="fileToUpload"><input type="submit" class="btn btn-success" name="cargar_imagen" value="Cargar Imagen" />
									</div>
								</div>
								
							</form>
							<form class="form-horizontal" role="form" >
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-10"><input type="text" class="form-control" placeholder="Nombre" id="Nombre" value="<?=$nombre?>"></div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Apellido Paterno</label>
									<div class="col-sm-10"><input type="text" class="form-control" placeholder="Apellido Paterno" id="AP" value="<?=$ap?>"></div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Apellido Materno</label>
									<div class="col-sm-10"><input type="text" class="form-control" placeholder="Apellido Materno" id="AM" value="<?=$am?>"></div>
								</div>
			
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<a class="btn btn-success" id="guardar" href="#" >Guardar</a>
									</div>
								</div>
							</form>
							<a href="eliminar.php?id_usuario=<?=$_SESSION["ID"]?>"><button class="btn btn-danger btn-block btn-large"> Eliminar Cuenta </button></a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<h4 class="modal-title" id="myModalLabel">Mensaje a <?=$usuario?>
  </div>
  <div class="modal-body">
    <textarea name="mensaje" id="mensaje" style="width:100%;"></textarea>
  </div>
  <div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
<button type="button" id="enviar_mensaje" class="btn btn-primary" data-dismiss="modal">Enviar Mensaje</button>
  </div>
</div>
  </div>
</div>

<div class="modal fade" id="myModalDos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModalLabel">Bandeja de Mensajes
	  </div>
		  <div class="modal-body">

		  <?php
		  $sql = mysql_query("SELECT * FROM Mensaje WHERE De='$id' OR Para='$id' ")or die(mysql_error());
		  while ($row = mysql_fetch_array($sql)) {
			 echo '<div class="alert alert-info" role="alert">
			 <div class="row-fluid">
			 	<div class="col-md-3">
			 	De: '.ver_usuario($row["De"]).'
			 	Para: '.ver_usuario($row["Para"]).'
			 	</div>
			 	<div class="col-md-offset-3 col-md- text-right">
			 	'.diferencia($row["Fecha"],$fechados).'
			 	</div>
			 </div>

			 	Mensaje: '.$row["Mensaje"].'

			 </div>';
		  }
		  ?>
		  
		  </div>
	</div>
  </div>
</div>


  <div class='notifications top-right'></div>
  
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-notify.js"></script>
	<script type="text/javascript">
	$(document).on("ready",function(){
		
		$("#guardar").click(function(){
			var am = $("#AM").val();
			var ap = $("#AP").val();
			var nombre = $("#Nombre").val();
			$.ajax({
				url:"instrucciones.php",
				type:"GET",
				data:{Am:am,Ap:ap,Nombre:nombre}
			}).done(function(respuesta){
				console.log(respuesta);
				$('.top-right').notify({
				    message: { text: respuesta },
				    type : "success"
				  }).show();
				  setTimeout(function(){
				window.locationf="perfil.php";
				},1000);
			});
			
			
		});
		
		$("#config").click(function(){
			$("#configuracion").slideDown();
			$("#index").slideUp();	
		});
		$("#salir").click(function(){
			$("#configuracion").slideUp();
			$("#index").slideDown();
		});
		
		$("#guardar").click(function(){
			
		});
		$("#enviar_mensaje").click(function(){
			var msg = $("#mensaje").val();
			$.ajax({
				url:"instrucciones.php",
				type:"POST",
				data:{Para:<?=$id?>,Mensaje:msg}
			}).done(function(respuesta){
				  $('.top-right').notify({
				    message: { text: respuesta },
				    type : "success"
				  }).show();
			});
		});
		
		$("body").delegate("#seguir","click",function(){
			$.ajax({
				url:"instrucciones.php",
				type:"POST",
				data:{Seguir:"SI",Perfil:<?=$id?>}
			}).done(function(){
				$("#seguir").after('<a type="button" id="dejar_seguir" class="btn btn-warning btn-lg">Dejar de Seguir</a>');
				$("#seguir").remove();
			});
			
			$.ajax({
				url: "cargar.php",
				type : "POST",
				data: {Cargar:"Seguidores",Perfil:<?=$id?>}
			}).done(function(msg){
				$("#seguidores").text(msg);
			});
		});
		
		$("body").delegate("#dejar_seguir","click",function(){
			$.ajax({
				url:"instrucciones.php",
				type:"POST",
				data:{Seguir:"NO",Perfil:<?=$id?>}
			}).done(function(){
				$("#dejar_seguir").after('<a type="button" id="seguir" class="btn btn-primary btn-lg">Seguir</a>');
				$("#dejar_seguir").remove();
			});
			
			$.ajax({
				url: "cargar.php",
				type: "POST",
				data: {Cargar:"Seguidores",Perfil:<?=$id?>}
			}).done(function(msg){
				$("#seguidores").text(msg);
			});
		});
	});	
	</script>
	
</body>
</html>