<?php

session_start();

if(isset($_SESSION["admin"])){
			include_once '../db_functions.php';
			include_once '../config.php';

			$db = new DB_Functions();

$nombre= trim(stripslashes(htmlspecialchars(str_replace(" ","",$_POST['nombre']))));
$idcentro= trim(stripslashes(htmlspecialchars($_POST['idcentro'])));
$pass= trim(stripslashes(htmlspecialchars(str_replace(" ","",$_POST['pass']))));
$email= trim(stripslashes(htmlspecialchars($_POST['email'])));
$nombreProfesor= trim(stripslashes(htmlspecialchars($_POST['nombreProfesor'])));
$mensaje= trim(stripslashes(htmlspecialchars($_POST['mensaje'])));
$escuela= trim(stripslashes(htmlspecialchars($_POST["schoolName"])));
$nombreCentro='';

	$i = 0;		
	
	$nombreUsuario = $db->seleccionarNombreUsuario($_POST["nombre"]);

	$nombreFilas = mysqli_num_rows($nombreUsuario);

	if($nombreFilas == 0){

				while($i < 1){
	
				$keyprofesor = rand(10000000000, 99999999999);

				$key = $db->seleccionarKeyProfesores($keyprofesor);

				$keyFilas = mysqli_num_rows($key);

					if($keyFilas == 0){

						$i = 1;



					}else{



						$i = 0;

					}

				}

				$licencia = $db->seleccionarLicenciaIdCentro($_POST["idcentro"]);

				$row1 = mysqli_fetch_array($licencia);

				$licenciaFinal = $row1["keycentro"];

				$login = $db->insertarProfesor(utf8_decode($nombre), $pass, $idcentro, $keyprofesor, $email, utf8_decode($nombreProfesor), $nombreCentro, $licenciaFinal);

				echo '<script language="javascript">window.location.href = "../correoLogin.php?email='.$_POST["email"].'&pass='.$_POST["pass"].'&user='.$_POST["nombre"].'";</script>';

				//header("location:../correoLogin.php?email=".$_POST["email"]."&pass=".$_POST["pass"]."&user=".$_POST["usuario"]);




		}else{

			
				echo "<script language='javascript'>window.location.href = '../../pages/crearProfesor.php?exist=1';</script>";
				//header("location:../../pages/crearProfesor.php?exist=1");
			}


			

		}


?>