<?php

session_start();

if(isset($_SESSION["admin"])){
			include_once '../db_functions.php';
			$db = new DB_Functions();

		$res = $db->estadoBorradoProfesor($_GET["id"]);
			
		//header("location:../pages/profesores.php");
		echo '<script language="javascript">window.location.href = "../../pages/profesores.php";</script>';

}else{
	header("location:../../pages/login.php");
}


?>