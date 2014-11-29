<?php
    $arch = $_POST["archivo"];
    $texto = $_POST["texto"];
$nombre_fichero = 'archivos/'.$arch ;

if (file_exists($nombre_fichero)) {
    if (is_writable("archivos/$arch")) { 
        $arch = fopen("archivos/$arch","w");
        
        //$healthy = array(" x ","1","2","3","4","5","6","7","8","9");
		//$yummy   = array(" "," "," "," "," "," "," "," "," "," ");
		//$texto = str_replace($healthy, $yummy, $texto);
        
        if (fprintf($arch,"%s\n",$texto)=== FALSE) {
            echo "No se puede escribir en el archivo ($arch)\n";
        }else{
        	echo $texto;
        }
        fclose($arch);
		
    } else {
        echo "El archivo $nombre_archivo no es escribible";
    }
}else{
echo "no existe el archivo";
}
?>