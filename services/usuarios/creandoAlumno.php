<?php

session_start();

if(isset($_SESSION["admin"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';

			$db = new DB_Functions();

		

		$res = $db->crearAlumno(utf8_decode($_POST["nombre"]), $_POST["pass"], $_POST["idprofesor"], $_POST["idgrupo"], $_POST["licencia"]);

		

			
		header("location:../../pages/alumnos.php");


}else{
	header("location:../../pages/login.php");
}


?>