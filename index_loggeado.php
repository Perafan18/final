	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">
			<h1>PANEL DE CONTROL</h1>
			<div class="col-md-12 well">
				<h4>¡Bienvenido <?=$_SESSION["Nombre"]?> !</h4>
				<div class="row-fluid">
					<div class="col-md-3">
						<div class="btn-group-vertical" role="group" aria-label="Vertical button group">
							<a type="button" id="modal" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Crear Proyecto</a>
						</div>
					</div>
					<div class="col-md-9" >
						<div id="proyectos">
							<?php
							echo '<h3>Proyectos</h3><table class="table-bordered">';
							$user = $_SESSION["ID"];
							$sql = mysql_query("SELECT * FROM Proyectos WHERE Admin='$user' AND Habilitado='0'");
							if(mysql_num_rows($sql)==0){
								echo '<tr><td style="width:100%">No hay proyectos</td></tr>';
							}
							while($row= mysql_fetch_array($sql)){
								echo '<tr>
									<td style="width:100%">
										<a href="#" class="btn btn-success btn-block" disabled="disabled">'.$row["Nombre"].'</a>
									</td>
									<td>
										<a href="proyecto.php?id='.$row["ID"].'" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar Proyecto"><i class="fa fa-pencil"></i></a>
									</td>
									<td>
										<a href="eliminar.php?id_proyecto='.$row["ID"].'" ><button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Proyecto"><i class="fa fa-trash"></i></button></a>
									</td>
								</tr>';
							 }
							echo '</table>';
							?>
						</div>
						<div class="proyectosDos">
							<?php
							echo '<h3>Colaborador</h3><table class="table-bordered">';
							
							$user = $_SESSION["ID"];
							$sql = mysql_query("SELECT * FROM Colaboradores WHERE ID_Usuario='$user'");
							if(mysql_num_rows($sql)==0){
								echo '<tr><td style="width:100%">No hay proyectos como colaborador</td></tr>';
							}
							while($row = mysql_fetch_array($sql)){
								$proyect = $row["ID_proyecto"];
								$sqli = mysql_query("SELECT * FROM Proyectos WHERE ID='$proyect'");
								
								if($rows= mysql_fetch_array($sqli)){
									echo '<tr>
										<td style="width:100%">
											<a href="#" class="btn btn-success btn-block" disabled="disabled">'.$rows["Nombre"].'</a>
										</td>
										<td>
											<a href="proyecto.php?id='.$rows["ID"].'" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar Proyecto"><i class="fa fa-pencil"></i></a>
										</td>
									</tr>';
								 }
							}
							

							echo '</table>';
							?>
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
        <h4 class="modal-title" id="myModalLabel">Nuevo Proyecto</h4>
      </div>
      <div class="modal-body">
      	
      	<div id="mensaje" class="alert alert-success" role="alert"></div>
      	<div id="mensaje-error" class="alert alert-danger" role="alert"></div>
      	
      	<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-4 control-label">Nombre del Proyecto</label>
				<div class="col-sm-8">
					<input type="text" id="Nombre" class="form-control" placeholder="Ejemplo: Final de Web">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<div class="checkbox">
						<label>
							<input name="uno" class="input" type="radio" value="1"> Proyecto Cerrado
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<div class="checkbox">
						<label>
							<input name="uno" class="input" type="radio" value="2"> Proyecto Abierto
						</label>
					</div>
				</div>
			</div>
			
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="crear" data-dismiss="modal">Crear Proyecto</button>
      </div>
    </div>
  </div>
</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).on("ready",function(){
		$("#modal").click(function() {
			$("#mensaje-error").css("display","none");
        	$("#mensaje").css("display","none");
		});
        $("#crear").click(function(){

				var nombre = $("#Nombre").val();
				var tipo = $(".input:checked").val();
				$.ajax({
                    url: "instrucciones.php",
                    type: "POST",
                    data: { Nombre:nombre,Tipo:tipo }
                }).done(function(mensaje){
                	if(mensaje=="No has iniciado session"){
                		window.location ="index.php";
                	}
                	$("#mensaje").css("display","block");
                    $("#mensaje").text(mensaje);
                });
                
                $.ajax({
                	url : "cargar.php",
                	type : "POST",
                	data : { Cargar: "proyectos"}
                }).done(function(msg){
                	$("#proyectos").html(msg);
                });
    
        });
    });
	</script>