<?php
session_start();
if(isset($_SESSION["admin"])){ 
			include_once '../db_functions.php';
			include_once '../config.php';
			$db = new DB_Functions();
		$i = 0;
				while($i < 1){
				$keycentro = rand(10000000000, 99999999999);
				$keycentro = "a".$keycentro;
				$key = $db->seleccionarKeyCentros($keycentro);
				$keyFilas = mysqli_num_rows($key);
					if($keyFilas == 0){
						$i = 1;
					}else{
						$i = 0;
					}
				}
				$insertarCentro = $db->insertarCentro(utf8_decode($_POST["nombre"]), $_POST["email"], $_POST["telefono"], $keycentro, utf8_decode($_POST["direccion"]), $_POST["idpais"]);
				if($insertarCentro = true){
					$idCentro = $db->seleccionarUltimoCentro();
					$row = mysqli_fetch_array($idCentro);
					$insertarLicencia = $db->insertarLicencia($keycentro, $_POST["licencias"], $row["id"], $_POST["fecha"]);
					if($insertarLicencia = true){
						echo '<script language="javascript">window.location.href = "../../pages/crearCentro.php?creado=1";</script>';
					}else{
						echo '<script language="javascript">window.location.href = "../../pages/crearCentro.php?fallo=1";</script>';
					}
				}else{
					echo '<script language="javascript">window.location.href = "../../pages/crearCentro.php?fallo=1";</script>';
				}
				//header("location:../correoLogin.php?email=".$_POST["email"]."&pass=".$_POST["pass"]."&user=".$_POST["usuario"]);
		}
?>