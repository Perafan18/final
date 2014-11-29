<?php
session_start();
session_destroy();

    setcookie("Usuario",'',time()-60*60*30,"/");
header("Location:index.php");
?>