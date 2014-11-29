<?php
/*
$archivo = $_POST["archivo"];

$arch = fopen("archivos/$archivo", "r");
while(!feof($arch)){
	$html = fscanf($arch,"%[^\n] \n");
	foreach ($html as $key => $value) {
		$tags = array("<",">");
		$remplazo   = array("&lt","&gt;");
		$remplazodos =  array("<span style='color:blue'>&lt;</span>","<span style='color:blue'>&gt;</span>");
		$value = str_replace($tags, $remplazo, $value);
		
		printf("<span> %s </span><br/>",$value);
	}
}
fclose($arch);
 
 */
 $archivo = $_POST["archivo"];

$arch = fopen("archivos/$archivo", "r");
while(!feof($arch)){
	$html = fscanf($arch,"%[^\n] \n");
	foreach ($html as $key => $value) {
		printf("%s",$value);
	}
}
fclose($arch);
?>