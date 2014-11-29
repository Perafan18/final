<?php
include("config.php");
verificar_usuario($_SESSION["ID"]);
if(isset($_GET["id"])){

		$id_proyecto = $_GET["id"];
		$user = $_SESSION["ID"];
		$sql = mysql_query("SELECT * FROM Proyectos WHERE ID='$id_proyecto' AND Admin='$user' AND  Habilitado='0' ");
		if($row = mysql_fetch_array($sql)){
			$nombre_proyecto =  $row["Nombre"];
			$admin = $user;
			$fecha_creacion = $row["Fecha"];
		}else{
			$sql = mysql_query("SELECT * FROM Colaboradores WHERE ID_proyecto='$id_proyecto' AND ID_Usuario='$user' AND Habilitado='0'");
			if($row = mysql_fetch_array($sql)){
				$sql = mysql_query("SELECT * FROM Proyectos WHERE ID='$id_proyecto' AND Habilitado='0'");
				if($row = mysql_fetch_array($sql)){
				$nombre_proyecto =  $row["Nombre"];
				$admin = $row["Admin"];
				$fecha_creacion = $row["Fecha"];
				}else{
					header("Location:index.php");
				}
			}else{
				$sql = mysql_query("SELECT * FROM Proyectos WHERE ID='$id_proyecto' AND Habilitado='0'");
				$row = mysql_fetch_array($sql);
				if($row["Tipo"]==2){
				$nombre_proyecto =  $row["Nombre"];
				$admin = $row["Admin"];
				$fecha_creacion = $row["Fecha"];
				}else{
				header("Location:index.php");
				}
			}
			
		}

}else{
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
</head>
<body>
	<?php include("includes/nav.php");?>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<h2><?=$nombre_proyecto?></h2>
				
				<button class="btn btn-success btn-block" id="modal" data-toggle="modal" data-target="#myModal"> Nuevo Archivo </button>
				<?php
				if($admin==$_SESSION["ID"]){
					echo '<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModalDos">Añadir Nuevos Colaboradores</button>';
				}
				?>
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModalTres">Información y Opciones</button>
				<?php
				if($admin==$_SESSION["ID"]){
				echo '<a href="eliminar.php?id_proyecto='.$_GET["id"].'"><button class="btn btn-danger btn-block">Eliminar Proyecto</button></a>';
				}
				?>
			</div>	
			<div id="archivos" class="col-md-9 well">
				
				<table  class="table-bordered">
				
					<?php
					$sql = mysql_query("SELECT * FROM Archivos WHERE Proyecto='$id_proyecto'");
					while($row = mysql_fetch_array($sql)){
					
					echo '<tr>
						<td style="width:100%">
							
							<a href="#" class="btn btn-success btn-block" disabled="disabled">'.$row["Nombre"].'</a>
						</td>
						<td>
							<a href="editoralpha.php?id='.$row["ID"].'" ><button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar Archivo"><i class="fa fa-pencil"></i></button></a>
						</td>';
						/*
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								Action <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</div>
						</td>*/
					echo '<td>
							<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Archivo"><i class="fa fa-trash"></i></button>
						</td>
					</tr>';
					}
					?>
					
				</table>
			</div>
			
			
		</div>
	</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Archivo</h4>
      </div>
      <div class="modal-body">
      	
      	<div id="mensaje" class="alert alert-success" role="alert"></div>
      	<div id="mensaje-error" class="alert alert-danger" role="alert"></div>
      	<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-4 control-label">Nombre del Archivo (Sin extensión)</label>
				<div class="col-sm-8">
					<input type="email" id="Nombre" class="form-control" placeholder="Ejemplo: index ">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Formato</label>
				<div class="col-sm-8">
					<select id="Formato" class="form-control">
						<option value="0">Elige un formato</option>
						<option value="1">HTML</option>
						<option value="2">Javascript</option>
						<option value="3">CSS</option>
					</select>
				</div>
			</div>
		</form>			

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="crear_archivo" >Crear Archivo</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModalDos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Añadir Colaboradores</h4>
      </div>
      <div class="modal-body">
		<p class="muted">Para añadir un nuevo colaborador es necesario que sea tu seguidor</p>
      	<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-4 control-label">Seleccionar Nuevo Colaborador</label>
				<div class="col-sm-8">
					<select id="colaboradores">
						<option value="0">Seleccionar Nuevo Colaborador</option>
						<?php
						$id_user = $_SESSION["ID"];
						$sql = mysql_query("SELECT * FROM Seguir WHERE Siguiendo='$id_user'");
						while($row = mysql_fetch_array($sql)){
							$id_select = $row["Seguidor"];
							$sqli = mysql_query("SELECT * FROM Usuarios WHERE ID='$id_select'");
							if($rows = mysql_fetch_array($sqli)){
								$sqle = mysql_query("SELECT * FROM Colaboradores WHERE ID_proyecto='$id_proyecto' AND ID_Usuario='$id_select' ");
								if(mysql_num_rows($sqle)==0){
									echo '<option value="'.$rows["ID"].'">'.$rows["Usuario"].'</option>';	
								}

							}
						}
						?>
					</select>
					
				</div>
			</div>
			
		</form>			

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="colaborador" >Añadir Colaborador</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalTres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Información sobre <?=$nombre_proyecto?></h4>
      </div>
      <div class="modal-body">
      <?php
		$sql = mysql_query("SELECT * FROM Usuarios WHERE ID='$admin'");
		if($row = mysql_fetch_array($sql)){
			$admin_user = $row["Usuario"];

		}
		?>
		<h3>Administrador : <?=$admin_user?></h3>
		<h4>Fecha de Creación : <?=$fecha_creacion?> </h4>
		<h4>Colaboradores</h4>
		<div class="list-group">
		  
		  <?php
		  $sql = mysql_query("SELECT * FROM Colaboradores WHERE ID_proyecto='$id_proyecto'");
		  while($row = mysql_fetch_array($sql)){
		  	$id_colab = $row["ID_Usuario"];
		  	$sqli = mysql_query("SELECT * FROM Usuarios WHERE ID='$id_colab'");
			if($rows = mysql_fetch_array($sqli)){
				echo '<a href="perfil.php?ID='.$id_colab.'" class="list-group-item">'.$rows["Usuario"].'</a>';
			}
		  }
		  ?>
		</div>
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
		$("#colaborador").click(function(){
				var colab = $("#colaboradores").val();
				$.ajax({
					url:"instrucciones.php",
					type:"POST",
					data:{Colaborador:colab,Proyecto:<?=$id_proyecto;?>}
				}).done(function(msg){
				 $('.top-right').notify({
				    message: { text: msg },
				    type : "success"
				  }).show();
				});
		});
		
		$("#modal").click(function() {
			$("#mensaje-error").css("display","none");
        	$("#mensaje").css("display","none");
		});
		$("li").hover(function(){
			$(this).addClass('active');	
		},function(){
			$(this).removeClass('active');	
		});
		$('button').tooltip('hide');
        $("#crear_archivo").click(function(){

				var nombre = $("#Nombre").val();
				var formato = $("#Formato").val();
				$.ajax({
                    url: "instrucciones.php",
                    type: "POST",
                    data: { Nombre_archivo:nombre,Formato:formato,Proyecto:<?php echo $id_proyecto;?>}
                }).done(function(mensaje){
                	if(mensaje=="No has iniciado session"){
                		window.location ="index.php";
                	}
                	$("#mensaje").css("display","block");
                    $("#mensaje").text(mensaje);
                }).always(function(mensaje){
                	console.log(mensaje);
                });
    
        });
    });
	</script>
</body>
</html>