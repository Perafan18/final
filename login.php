
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row-fluid">
			<div class="col-md-6 well" style="margin-top:75px;">
				<a href="registrarse.php" class="btn btn-primary btn-block">Registrarse</a>
				<br>
				<?php
				if($_GET["error"]){
					echo '<div class="alert alert-success" role="alert">';
					switch ($_GET["error"]) {
						case 1:
							echo 'Usuario y/o contraseña incorrrectos';
							
							break;
						case 2:
							echo 'No se encontro este usuario registrado';
							break;
					}
					echo '</div>';
				}
				?>
				<form role="form" action="instrucciones.php" method="post">
					<div class="form-group">
						<label for="form-email">Correo Electrónico</label>
						<input type="email" class="form-control" id="form-email" placeholder="Correo Electrónico" name="email">
					</div>
					<div class="form-group">
						<label for="form-pw">Contraseña</label>
						<input type="password" class="form-control" id="form-pw" placeholder="Contraseña" name="pw">
					</div>
					<div class="form-group">
					    <div class="col-sm-6">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox" name="Recordar"> Recordarme
					        </label>
					      </div>
					    </div>
					    <div class="col-sm-6 text-right">
					      <a href="#" data-toggle="modal" data-target="#myModal">Olvidé la contraseña</a>
					    </div>
					  </div>
					<button type="submit" class="btn btn-success btn-block" name="iniciar">Iniciar Sesión</button>
				</form>
			</div>
			<div class="col-md-6 ">
				<img src="img/lateral2.jpg" class="img-responsive">
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-12">
				<h1 class="text-center">¿Qué es <span class="titulo">Code Door</span>? </h1>
				<div class="row-fluid">
					<div class="col-md-4 text-center">
						<span class="fa-stack fa-2x">
				            <i class="fa fa-circle fa-stack-2x" style="color:#03AA03"></i>
				            <i class="fa fa-users fa-stack-1x fa-inverse"></i>
				        </span>
				    	 <p >
				            Codedoor te servirá como complemento para tu proyecto de programación en la comodidad de tu navegador web y con la colaboración de tu equipo de trabajo!
				        </p>
				    </div>
					<div class="col-md-4 text-center">
						<span class="fa-stack fa-2x">
				            <i class="fa fa-circle fa-stack-2x" style="color:#0D86C6"></i>
				            <i class="fa fa-css3 fa-stack-1x fa-inverse"></i>
				        </span>
				    	<p >
				            Codedoor trabaja sobre los lenguajes de programación web HTML, CSS y Javascript, crea una cuenta y almacena tus proyectos!
				        </p>
				    </div>
					<div class="col-md-4 text-center">
						<span class="fa-stack fa-2x">
				            <i class="fa fa-circle fa-stack-2x" style="color:#ea2803"></i>
				            <i class="fa fa-html5 fa-stack-1x fa-inverse"></i>
				        </span>
				    	<p >
				            Interfaz minimalista y la sencilla utilización del sistema hará que tú y tus proyectos estén en un ambiente limpio y tranquilo para realizar trabajos en tiempo y forma.
				        </p>
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
        <h4 class="modal-title" id="myModalLabel">¿Olvidaste tu contraseña?</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" role="form" action="instrucciones.php" method="post">
		  <div class="form-group">
		    <label  class="col-sm-5 control-label">Correo Electronico o Usuario</label>
		    <div class="col-sm-7">
		      <input type="email" class="form-control" name="correo_o_usuario" placeholder="Correo Electronico o Usuario">
		    </div>
		  </div>
		  <button type="submit" class="btn btn-primary" name="recuperar">Recuperar Contraseña</button>
        </form>
      </div>
    </div>
  </div>
</div>