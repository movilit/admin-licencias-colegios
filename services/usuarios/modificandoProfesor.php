<?php
session_start();
if(isset($_SESSION["admin"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';
			$db = new DB_Functions();
$i = 0;
	$nombreUsuario = $db->seleccionarNombreUsuario($_POST["nombre"]);
	$nombreFilas = mysqli_num_rows($nombreUsuario);
	if($nombreFilas == 0){
				$login = $db->actualizarProfesor($_POST["id"], utf8_decode($_POST["nombre"]), $_POST["pass"], $_POST["email"], utf8_decode($_POST["nombreProfesor"]), utf8_decode($_POST["nombreCentro"]), $_POST["idcentro"]);
				//header("location:../../pages/modificarProfesor.php?id=".$_POST['id']."&modificado=1");
				echo '<script language="javascript">window.location.href = "../../pages/modificarProfesor.php?id=".$_POST["id"]."&modificado=1";</script>';
		}else{
				$login = $db->actualizarProfesorSinNombre($_POST["id"], $_POST["pass"], $_POST["email"], utf8_decode($_POST["nombreProfesor"]), utf8_decode($_POST["nombreCentro"]), $_POST["idcentro"]);
				//header("location:../../pages/modificarProfesor.php?id=".$_POST['id']."&modificado=1");
				echo '<script language="javascript">window.location.href = "../../pages/modificarProfesor.php?id=".$_POST["id"]."&modificado=1";</script>';
			}
		}
?>