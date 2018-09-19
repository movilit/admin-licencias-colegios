<?php

session_start();

if(isset($_SESSION["usuario"])){ 
			include_once '../db_functions.php';
			
			$db = new DB_Functions();

		

		$res = $db->eliminarPagina($_GET["id"]);

		

			
		header("location:../../pages/paginas.php");


}else{
	header("location:../../pages/login.php");
}


?>