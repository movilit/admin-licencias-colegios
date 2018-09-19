<?php

session_start();

if(isset($_SESSION["admin"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';

			$db = new DB_Functions();

		

		$res = $db->actualizarGrupo($_POST["id"], utf8_decode($_POST["nombre"]), $_POST["idprofesor"], $_POST["keygrupo"]);

		

			
		header("location:../../pages/grupos.php");


}else{
	header("location:../../pages/login.php");
}


?>