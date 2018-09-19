<?php
include_once 'db_functions.php';
include_once 'config.php';
$db= new db_functions;
	$usuario_seg= $db->LimpiarCadena($_POST["usuario"]);
	$pass_seg= $db->LimpiarCadena($_POST["pass"]);
	$login = $db->loguearAdmin($usuario_seg,$pass_seg);
	$loginFilas = mysqli_num_rows($login);
		if($loginFilas == 1){
			ini_set("session.cookie_lifetime","300");
			ini_set("session.gc_maxlifetime","300");
			$paises_usuario = $db->getUsuarioPaises($usuario_seg);
			session_start();
			$_SESSION["admin"] = $usuario_seg;
			$_SESSION["paises"] = $paises_usuario;
			echo "<script language='javascript'>window.location.href = '../pages/index.php';</script>";
		}else{
			echo "<script language='javascript'>window.location.href = '../pages/login.php?falso=si';</script>";
		}
?>