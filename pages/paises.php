<?php
session_start();
if(isset($_SESSION["paises"])){
	$paises=$_SESSION["paises"];
	echo "$paises";
}else{echo "No tiene paises asignados";}

?>