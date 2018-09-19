<?php

session_start();

if(isset($_SESSION["usuario"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';

			$db = new DB_Functions();

		

		$res = $db->crearCategoria($_POST["nombre"]);

		

			
		header("location:../../pages/categorias.php");


}else{
	header("location:../../pages/login.php");
}


?>