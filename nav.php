<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand titulo" href="index.php">Code Door</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
        <?php 
      if(isset($_SESSION["Usuario"])){
        echo '<li><a href="proyecto.php">Proyectos</a></li>';
      }
      ?>
        <li <?php if($op==1){echo 'class="active"';}?>><a href="informacion.php">Información</a></li>
        <li <?php if($op==2){echo 'class="active"';}?>><a href="registrarse.php">Registrarse</a></li>
        <li <?php if($op==3){echo 'class="active"';}?>><a href="encuesta.php">Encuesta</a></li>
        <li <?php if($op==4){echo 'class="active"';}?>><a href="contact.php">Opinión</a></li>
      </ul>
      <?php 
      if(isset($_SESSION["Usuario"])){
      echo '
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrar.php">Cerra sesion</a></li>
      </ul>';
      }?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>