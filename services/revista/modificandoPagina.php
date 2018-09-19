<?php

session_start();

if(isset($_SESSION["usuario"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';

			$db = new DB_Functions();

		

		$res = $db->actualizarPagina($_POST["id"], $_POST["revista"], $_POST["numero"], $_POST["nivel"], $_POST["categoria"], $_POST["contenido"], $_POST["paises"]);

		

			
		header("location:../../pages/paginas.php");


}else{
	header("location:../../pages/login.php");
}


?>