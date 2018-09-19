<?php

session_start();

if(isset($_SESSION["admin"])){ 
			include_once '../db_functions.php';
			
			$db = new DB_Functions();

		

		$res = $db->eliminarGrupo($_GET["id"]);

		

			
		header("location:../../pages/grupos.php");


}else{
	header("location:../../pages/login.php");
}


?>