<?php
include("config.php");

if(isset($_POST["Cargar"])){
	switch ($_POST["Cargar"]) {
		case 'proyectos':

			echo '<h3>Proyectos</h3><table class="table-bordered">';
						$user = $_SESSION["ID"];
						$sql = mysql_query("SELECT * FROM Proyectos WHERE Admin='$user'");
						while($row= mysql_fetch_array($sql)){
							echo '<tr>
								<td style="width:100%">
									<a href="#" class="btn btn-success btn-block" disabled="disabled">'.$row["Nombre"].'</a>
								</td>
								<td>
									<a href="proyecto.php?id='.$row["ID"].'" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar Proyecto"><i class="fa fa-pencil"></i></a>
								</td>
								<td>
									<button href="eliminar.php?id='.$row["ID"].'" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Proyecto"><i class="fa fa-trash"></i></button>
								</td>
							</tr>';
						 }
						echo '</table>';
			break;
		case "Seguidores":
			$id = $_POST["Perfil"];
			$sql = mysql_query("SELECT * FROM Seguir WHERE Siguiendo='$id' AND Habilitado='0 ");
			echo mysql_num_rows($sql);
			if(mysql_num_rows($sql)==0){
				echo '0';
			}
			break;
		default:
			
			break;
	}
}


?>