<?php
session_start();

if(isset($_SESSION["admin"])){

			include_once '../db_functions.php';
			include_once '../config.php';
			$db = new DB_Functions();

			$i = 0;

	$nombreGrupo = $db->seleccionarNombreGrupo(utf8_decode($_POST["nombre"]), $_POST["idprofesor"]);

	$nombreFilas = mysqli_num_rows($nombreGrupo);

		if($nombreFilas == 0){

				while($i < 1){

					$keyGrupo = rand(10000000000, 99999999999);
					$key = $db->seleccionarKeyGrupo($keyGrupo);
					$keyFilas = mysqli_num_rows($key);

						if($keyFilas == 0){

							$i = 1;

						}else{

							$i = 0;

						}

				}

				$login = $db->insertarGrupoProfesor(utf8_decode($_POST["nombre"]), $_POST["idprofesor"], $keyGrupo);

				//header("location:../../pages/listaProfesoresCentro.php?licencia=".$_POST["licencia"]);

				echo "<script type='text/javascript'>window.location.assign('../../pages/listaProfesoresCentro.php?licencia=".$_POST["licencia"]."');</script>";

		}else{


		}
}else{

	header("location:../../pages/login.php");

}


?>