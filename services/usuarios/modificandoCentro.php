<?php
session_start();
if(isset($_SESSION["admin"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';
			$db = new DB_Functions();
		$res = $db->actualizarCentro($_POST["id"], $_POST["nombre"], $_POST["email"], $_POST["telefono"], $_POST["idpais"]);
		//header("location:../../pages/centros.php");
		echo "<script language='javascript'>window.location.href = '../../pages/centros.php';</script>";
}else{
	header("location:../../pages/login.php");
}
?>