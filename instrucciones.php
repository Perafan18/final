<?php
include("config.php");
function evalue($num){
	if($num>=0&&$num<=3){
		return $num;
	}
	return NULL;
}
function verificar_numero($numero,$min,$max){
	if($min<=$max){
		if($numero==$min){
			return $numero;
		}else{
			verificar_numero($numero,$min+1,$max);
		}
	}else{
		return NULL;
	}
}

if(isset($_POST["registrarse"])){
	$usuario = $_POST["Usuario"];
	$nombre = $_POST["Nombre"];
	$ap = $_POST["AP"];
	$am = $_POST["AM"];
	$correo = $_POST["email"];
	$pw = sha1($_POST["password"]);
	$captcha = $_POST["Captcha"];
	$verifcaptcha = $_POST["verifCaptcha"];
	if($captcha==$verifcaptcha){
	if(existe_usuario($usuario)==0){
	if($usuario!=NULL&&$nombre!=NULL&&$ap!=NULL&&$am!=NULL&&$correo!=NULL&&$pw!=NULL){
		if(mysql_query("INSERT INTO Usuarios SET Usuario='$usuario',Nombre='$nombre',AP='$ap',AM='$am',Correo='$correo',Pw='$pw'")){
			$mysql = mysql_query("SELECT * FROM Usuarios WHERE Usuario='$usuario' AND Nombre='$nombre'");
			if($row = mysql_fetch_array($mysql)){
				$id = $row["ID"];	
				$_SESSION["ID"] = $id;
				$_SESSION["Nombre"] = $row["Nombre"];
				header("Location:registrado.php?id=".$id);
			}else{
				header("Location:error.php?error=1");	
			}
		}else{
			header("Location:error.php?error=2");
		}
	}else{
		header("Location:error.php?error=2");
	}
	}else{
		header("Location:error.php?error=3");
	}
	}else{
		header("Location:error.php?error=4");
	}
}
if(isset($_POST["iniciar"])){
	$correo = $_POST["email"];
	$pw = sha1($_POST["pw"]);
	$sql = mysql_query("SELECT * FROM Usuarios WHERE Correo ='$correo' AND Habilitado='0' ");

	if($row = mysql_fetch_array($sql)){
		if($row["Pw"]==$pw){

			$id = $row["ID"];
			$_SESSION["ID"] = $id;
			$_SESSION["Nombre"] = $row["Nombre"];

			if(isset($_POST["Recordar"])){
			setcookie("Usuario",$id,time()+60*60*30,"/");	
			}			
			header("Location:index.php");
		}else{
			header("Location:index.php?error=1");
		}
	}else{
		header("Location:index.php?error=2");
	}
}

if(isset($_POST["enviar_encuesta"])){
	$a1 = evalue($_POST["1"]);
	$a2 = evalue($_POST["2"]);
	$a3 = evalue($_POST["3"]);
	$a4 = evalue($_POST["4"]);
	$a5 = evalue($_POST["5"]);
	$a6 = evalue($_POST["6"]);
	$a7 = evalue($_POST["7"]);
	$a8 = evalue($_POST["8"]);
	
	if($a1==NULL||$a2==NULL||$a3==NULL||$a4==NULL||$a5==NULL||$a6==NULL||$a7==NULL||$a8==NULL){
		header("location: encuesta.php?error=1");
		//Campos no llenos
	}else{
		$ip = $_SERVER["REMOTE_ADDR"];
		if(mysql_query("INSERT INTO Encuesta SET a1='$a1',a2='$a2',a3='$a3',a4='$a4',a5='$a5',a6='$a6',a7='$a7',a8='$a8',IP='$ip'")){
			header("location: encuesta.php?listo=1");
		}else{
			header("location: encuesta.php?error=2");
			//error no se capturaron los datos	
		}
	}
}

if (isset($_POST["Nombre"])) {
		$admin = $_SESSION["ID"];

		//$categoria = verificar_numero($_POST["Categoria"],1,10);
		$tipo = $_POST["Tipo"];
		$nombre = trim(htmlspecialchars($_POST["Nombre"]));
	if($nombre!=NULL&&$tipo!=NULL){
		if($admin!=NULL){
		
			if(mysql_query("INSERT INTO Proyectos SET Admin='$admin',Nombre='$nombre',Categoria='0',Fecha='$fecha',Tipo='$tipo'")){
				echo "Listo!";
			}else{
				echo "Upss! Hubo un error , intentalo otra vez";
			}
		}else{
			echo "No has iniciado session";
		}
	}else{
		echo "LLena todos los campos";
	}
}

if(isset($_POST["Nombre_archivo"])&&isset($_POST["Formato"])&&isset($_POST["Proyecto"])){
	$nombre = trim(htmlspecialchars($_POST["Nombre_archivo"]));
	$formato = verificar_formato($_POST["Formato"]);
	$proyecto = verificar_proyecto($_POST["Proyecto"]);
	$user = $_SESSION["ID"];
	if($formato!=NULL&&$nombre!=NULL&&$proyecto!=NULL){
		/*
		if(!file_exists("archivos")){
			if(!mkdir("archivos",0700)){
				echo "No se creo la carpeta principal";
			}
		}
		*/
		if(!file_exists("archivos/".$proyecto)){
			if(!mkdir("archivos/$proyecto", 0777, true)){
				echo "No se creo la carpeta";
			}
		}
			if(file_exists("archivos/".$proyecto."/".$nombre.'.'.$formato)){
				echo "Este archivo ya existe";
			}else{
				$arch = fopen("archivos/".$proyecto."/".$nombre.".".$formato,"a+");
				fwrite($fp, '23');
				fclose($arch);
				if(file_exists("archivos/".$proyecto."/".$nombre.'.'.$formato)){
					$archivo = $nombre.'.'.$formato;
					if(mysql_query("INSERT INTO Archivos SET Proyecto='$proyecto',Nombre='$archivo',Fecha='$fechados',Creador='$user'")){
						echo "Listo";
					}else{
						echo "Error! Intentalo otra vez";
					}
				}else{
					echo "No se a podido crear el archivo archivos/".$proyecto."/".$nombre.".".$formato;
				}
				
			}
	
			
	}else{
		echo "LLenar todos los campos correctamente";
	}
}

if(isset($_POST["Seguir"])&&isset($_POST["Perfil"])){
	$seguidor = $_SESSION["ID"];
	$perfil = $_POST["Perfil"];
	verificar_usuario($seguidor);
	if($_POST["Seguir"]=="SI"){
		$sql = mysql_query("INSERT INTO Seguir SET Siguiendo='$perfil',Seguidor='$seguidor',Fecha='$fechados'");
	}else{
		$sql = mysql_query("UPDATE Seguir SET Habilitado='1' WHERE Siguiendo='$perfil' AND Seguidor='$seguidor'");	
	}
}

if(isset($_POST["Para"])&&isset($_POST["Mensaje"])){
	$mensaje = $_POST["Mensaje"];
	$para = $_POST["Para"];
	$de = $_SESSION["ID"];
verificar_usuario($de);
	if(mysql_query("INSERT INTO Mensaje SET De='$de',Para='$para',Mensaje='$mensaje',Fecha='$fechados'")){
		echo "Listo";
	}else{
		echo "Error";
	}
}
if(isset($_POST["cargar_imagen"])){
verificar_usuario($_SESSION["ID"]);
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        //"File is not an image.";
        header("Location:perfil.php?error=1");
        $uploadOk = 0;
    }
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    header("Location:perfil.php?error=2");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   //"Sorry, only JPG, JPEG, PNG & GIF files are allowed." 	
    header("Location:perfil?error=3") ;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    header("location:perfil.php?error=4");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $imagen =  basename( $_FILES["fileToUpload"]["name"]);
		$sesion = $_SESSION["ID"];
        mysql_query("UPDATE Usuarios SET Imagen='$imagen' WHERE ID='$sesion' ")or die(mysql_error());
        header("location:perfil.php");
    } else {
    	header("location:perfil.php?error=4");
    }
}

}
if(isset($_POST["correo_o_usuario"])){
	if($_POST["correo_o_usuario"]!=NULL){
		$correo = $_POST["correo_o_usuario"];
		$sql = mysql_query("SELECT * FROM Usuarios WHERE Correo='$correo'");
		if(mysql_num_rows($sql)>0){
			$subject = "Recuperar Contraseña";
			$usuario = $_SESSION["Usuario"];
			$id_pass = rand(10000,100000);
			$row = mysql_fetch_array($sql);
			$id_user = $row["ID"];
			mysql_query("INSERT INTO Recuperar SET TOKEN='$id_pass',Usuario='$id_user',Fecha='$fechados'");
			
			$message = "Hola $usuario! <br/> <a href='http://www.dokdas.com/codedoor/recuperar.php?id=$id_pass'>Da click para recuperar tu password</a>";
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: <codedoor@dokdas.com>' . "\r\n";
			
			mail($correo,$subject,$message,$headers);
			//"Listo! revisa tu bandeja de correo";
			header("Location:correo.php?id=1");
		}else{
			$sql = mysql_query("SELECT * FROM Usuarios WHERE Usuario='$correo'");
			if($row = mysql_fetch_array($sql)){
					$subject = "Recuperar Contraseña";
					$usuario = $_SESSION["Usuario"];
					$id_pass = rand(10000,100000);
					$row = mysql_fetch_array($sql);
					$id_user = $row["ID"];
					$correo = $row["Correo"];
					
					mysql_query("INSERT INTO Recuperar SET TOKEN='$id_pass',Usuario='$id_user',Fecha='$fechados'");
					
					$message = "Hola $usuario! <br/> <a href='http://www.dokdas.com/codedoor/recuperar.php?id=$id_pass'>Da click para recuperar tu password</a>";
					
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					
					// More headers
					$headers .= 'From: <codedoor@dokdas.com>' . "\r\n";
					
					mail($correo,$subject,$message,$headers);
					header("Location:correo.php?id=1");
			}else{
				header("Location:correo.php?id=2");
			}
		}
	}else{
		echo "Correo o Usuario no valido";
		header("Location:correo.php?id=2");
	}
}
if(isset($_POST["Colaborador"])&&isset($_POST["Proyecto"])){
	$colab = $_POST["Colaborador"];
	$proyecto = $_POST["Proyecto"];
	if($colab!=NULL&&$proyecto!=NULL){
		if(mysql_query("INSERT INTO Colaboradores SET ID_proyecto='$proyecto' , ID_Usuario='$colab',Fecha='$fechados'")){
			echo "Listo!";
		}else{
			echo "Error!";
		}
	}
}
if(isset($_GET["Am"])&&isset($_GET["Ap"])&&isset($_GET["Nombre"])){
	$am = $_GET["Am"];
	$ap = $_GET["Ap"];
	$nombre = $_GET["Nombre"];
	$id= $_SESSION["ID"];
		if($am!=NULL&&$ap!=NULL&&$nombre!=NULL){
			if(mysql_query("UPDATE Usuarios SET Usuario='$usuario',Nombre='$nombre',AP='$ap',AM='$am' WHERE ID='$id'")){
				echo "Listo!";
			}else{
				echo "Error!";
			}
		}else{
			echo "Error! Llenar todos los campos";
		}
	

}
?>