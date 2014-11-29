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
	<title>Información</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/estilo.css" >  
</head>
<body>
  <?php 
  include("includes/nav.php");
  ?>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-12 margin"></div>
		</div>
		<div class="row fluid">
			<div class="col-md-10 col-md-offset-1 well">
				<h1 class="text-center">¡Hola! </h1></br>
				Bienvenidos a Codedoor! Un sitio web destinado a la colaboración entre un grupo de personas 
que requieren trabajar en conjunto sobre un mismo proyecto que podrá incluir archivos con determinados tipos de lenguajes de programación web; 
            HTML, CSS o JavaScript creados y almacenados en linea que podrá ser modificado y/o eliminado por los usuarios registrados en el sitio web.
    <img src="img/Imagen1.png" class="img-responsive center-block" width="30%">
        <h1 class="text-center">Objetivo de <span class="titulo">Code Door</span> </h1></br>
        Codedoor ha sido creado con el fin de establecer una colaboración grupal sobre un proyecto pensado en distintos lenguajes 
de programación web predefinidos por un usuario para así acelerar el proceso de su elaboración, con las ventajas de poder ser manipulado por 
los usuatios presentes en el proyecto.
        <h1 class="text-center">¿Cómo funciona? </h1></br>
        Para comenzar a utilizar Codedoor el único paso a realizar es, registrarse en el sitio web <a href="registrarse.php">Registrarse</a>. Todos los usuarios 
que se encuentren registrados podrán crear sus propios proyectos los cuales pueden contener distintos archivos, siempre seleccionando
una categoria con la cual se trabajará el codigo, ya que ésta determinará el tipo de archivo que se creará y se guardará en la base de 
    datos de cada usuario.</br></br> Cada usuario será administrador de sus propios proyectos, los podrá crear como Proyecto Abierto o Proyecto Cerrado, 
donde Proyecto Abierto se refiere a que cualquier usuario registrado podrá colaborar con el/los archivo/s contenidos en ese proyecto, en el 
    Proyecto Cerrado el usuario que creó el proyecto establecerá los usuarios que podrán trabajar sobre los archivos contenidos en ese proyecto.</br></br>
Cada usuatio podrá almacenar un número limitado de archivos en su cuenta en esta fase temprana del sitio web. Por favor, en la parte
de arriba de nuestra página se encuentra un link para que nos envies tu opinión sobre nuestro sitio y así poder mejorar tu experiencia 
navegando y trabajando por aquí.
			</div>	
		</div>
		
	</div>
</body>
</html>