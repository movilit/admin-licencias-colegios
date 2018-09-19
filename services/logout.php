<?php

	function destruir(){
    

    session_destroy();
    $parametros_cookies = session_get_cookie_params(); 
	setcookie(session_name(),0,1,$parametros_cookies["path"]);
}
	destruir();
	header("location:../pages/login.php");
?>