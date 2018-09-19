<?php

session_start();

if(isset($_SESSION["admin"])){ 

			include_once '../db_functions.php';
			include_once '../config.php';

			$db = new DB_Functions();

		$i = 0;

	$nombreUsuario = $db->seleccionarNombreParticular($_POST["user"]);

	$nombreFilas = mysqli_num_rows($nombreUsuario);

	if($nombreFilas == 0){


		$nombreProfe = $db->seleccionarNombreUsuario($_POST["user"]);

		$nombreProfesoresFilas = mysqli_num_rows($nombreProfe);

		if($nombreProfesoresFilas == 0){

			$nombreAlumno = $db->seleccionarNombreAlumno($_POST["user"]);

			$nombreAlumnosFilas = mysqli_num_rows($nombreAlumno);

			if($nombreAlumnosFilas == 0){
				

				$login = $db->insertarParticular($_POST["user"],$_POST["pass"],$_POST["caducidad"],utf8_decode($_POST["nombre"]),utf8_decode($_POST["apellidos"]),utf8_decode($_POST["calle"]),utf8_decode($_POST["ciudad"]),utf8_decode($_POST["provincia"]),$_POST["cp"],$_POST["telefono"],$_POST["movil"],$_POST["fax"],$_POST["email"],$_POST["nacimiento"]);

				echo '<script language="javascript">window.location.href = "../correoLoginParticular.php?email='.$_POST["email"].'&pass='.$_POST["pass"].'&user='.$_POST["user"].'";</script>';

				//header("location:../correoLogin.php?email=".$_POST["email"]."&pass=".$_POST["pass"]."&user=".$_POST["usuario"]);

			}else{

				echo "<script language='javascript'>window.location.href = '../../pages/crearParticular.php?exist=1';</script>";

			}

		}else{

			echo "<script language='javascript'>window.location.href = '../../pages/crearParticular.php?exist=1';</script>";

		}


	}else{

			
				echo "<script language='javascript'>window.location.href = '../../pages/crearParticular.php?exist=1';</script>";
				//header("location:../../pages/crearProfesor.php?exist=1");
	}


			

}


?>