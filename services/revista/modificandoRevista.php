<?php

session_start();

if(isset($_SESSION["usuario"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';

			$db = new DB_Functions();

		

		$res = $db->actualizarRevista($_POST["id"], $_POST["nombre"], $_POST["mes"], $_POST["fecha"], $_POST["estado"], $_POST["imagen"]);

		

			
		header("location:../../pages/revistas.php");


}else{
	header("location:../../pages/login.php");
}


?>