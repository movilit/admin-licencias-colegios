<?php

session_start();

if(isset($_SESSION["admin"])){ 
			include_once '../db_functions.php';
			
			$db = new DB_Functions();

		

		$res = $db->eliminarAlumno($_GET["id"]);

		

			
		header("location:../../pages/alumnos.php");


}else{
	header("location:../../pages/login.php");
}


?>