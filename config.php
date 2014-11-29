<?php
$i=4;

if($i==0){
	//Pedro (Linux)
$local = "http://localhost/web/final/";
$user  = "root";
$password = "root";
$db = "Codedoor";
$host = "localhost";
}elseif($i==1){
	//Pedro (Windows)
}elseif($i==2){
	//Navajas
}elseif($i==3){
	//Luis
	
}elseif($i==4){
	//Oficial
$local = "http://www.dokdas.com/codedoor/";
$user = "dokdasco_codedoo";
$password = "holi123#";
$db = "dokdasco_codedoor";
$host = "localhost";
}elseif($i==5){
	//Temporal
$local = "http://www.webfinal.tk/";
$user  = "u118791391_123";
$password = "holi123#";
$db = "u118791391_123";
$host = "mysql.nixiweb.com";
}

$con = mysql_connect("$host","$user","$password") or die(mysql_error());
mysql_select_db("$db",$con);

session_start();

$fecha =  date("Y-m-d");
$fechados = date("Y-m-d H:i:s");



function recordar($cookie){
	if(isset($cookie)){
		$_SESSION["ID"] = $cookie;
		$sql = mysql_query("SELECT * FROM Usuarios WHERE ID='$cookie'");
		if($row = mysql_fetch_array($sql)){
			$_SESSION["Nombre"] = $row["Nombre"];
		}
	}
}
function verificar_formato($value){
	switch ($value) {
		case 1:
			return "html";
			break;
		case 2:
			return "js";
			break;
		case 3:
			return "css";
			break;
		default:
			return NULL;
			break;
	}
}

function verificar_proyecto($proyecto){
		$sql = mysql_query("SELECT * FROM Proyectos WHERE ID='$proyecto'");
		if(mysql_num_rows($sql)>0){
			return $proyecto;
		}else{
			return NULL;
		}
}
function verificar_usuario($sesion){
	if($sesion==NULL){
		header("Location: index.php");
	}
}
function ver_usuario($id){
	$sql = mysql_query("SELECT * FROM Usuarios WHERE ID='$id'");
	if($row = mysql_fetch_array($sql)){
		return $row["Usuario"];
	}
	
}

function diferencia($fecha,$hoy){
   $f0 = strtotime($hoy);
   $f1 = strtotime($fecha);
   $seg = ($f0 - $f1);
   if($seg > 60){
   $min = $seg / 60; 
   if($min > 60){
   $hor = $min / 60; 
   if($hor > 24){
   $dia = $hor / 24;
   if($dia > 7 ){
   $dias = substr($fecha, 8, -8);
   $anos = substr($fecha, 0, 4);
   $mess = substr($fecha, 5, 6);
   $hora = substr($fecha, 11, -3);
   switch($mess){
      case 1:$mess = 'Enero';break;
      case 2:$mess = 'Febrero';break;
      case 3:$mess = 'Marzo';break;
      case 4:$mess = 'Abril';break;
      case 5:$mess = 'Mayo';break;
      case 6:$mess = 'Junio';break;
      case 7:$mess = 'Julio';break;
      case 8:$mess = 'Agosto';break;
      case 9:$mess = 'Septiembre';break;
      case 10:$mess = 'Octubre';break;
      case 11:$mess = 'Noviembre';break;
      case 12:$mess = 'Diciembre';break;
   }
  echo $dias.' de '.$mess.' del '.$anos.' a la(s) '.$hora;
   }else{
   $resultado = round($dia);
   if($resultado==1){$resultado = 'Hace un día';}else{$resultado = 'Hace '.$resultado.' días';}
   }
   }else{
   $resultado = round($hor);
   if($resultado==1){$resultado = 'Hace una hora';}else{$resultado = 'Hace '.$resultado.' horas';}
   }
   }else{
    $resultado = round($min);
    if($resultado==1){$resultado = 'Hace un minuto';}else{$resultado = 'Hace '.$resultado.' minutos';}
   }
   }else{
   $resultado = 'Hace '.$seg.' segundos';
   }
   
return $resultado;
}

function existe_usuario($usuario){
	$sql = mysql_query("SELECT * Usuarios WHERE Usuario='$usuario'");
	if(mysql_num_rows($sql)>0){
		return mysql_num_rows($sql);
	}else{
		return 0;
	}
}
function randomText($length) { 
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz"; 
    for($i = 0; $i < $length; $i++) { 
        $key .= $pattern{rand(0, 35)}; 
    } 
    return $key; 
} 

if(isset($_SESSION["ID"])){
	$id = $_SESSION["ID"];
	$sql = mysql_query("SELECT * FROM Usuarios WHERE ID='$id'");
	if($row = mysql_fetch_array($sql)) {
		$_SESSION["Usuario"] = $row["Usuario"];
		
	}
}
?>