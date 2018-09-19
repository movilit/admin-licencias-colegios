<?php


$mysqli = new mysqli("localhost", "rlfhkymy_web", "OpWcQ+wn-Cjk", "rlfhkymy_magazine");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo "Fallo - Prueba Informatico";
}
//secho $mysqli->host_info . "\n";

/*
$mysqli = new mysqli("127.0.0.1", "rlfhkymy_web", "OpWcQ+wn-Cjk", "rlfhkymy_magazine", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
*/
//echo $mysqli->host_info . "\n";


$numeroFilas = 1;
$idProfesor = $_POST["idProfesor"];
$idGrupo = $_POST["idGrupo"];
$licencia = $_POST["licencia"];

	$contador = $_POST["numeroAlumnos"];


while ($contador >= $numeroFilas) {

	$nombre = strtolower($_POST["nombre"]).".".strtolower($_POST["localidad"]).".".strtolower($_POST["codigoCurso"]).$numeroFilas;
	$pass = strtolower($_POST["pass"]).strtolower($_POST["codigoCurso"]).$numeroFilas;

	$sql = "INSERT INTO `alumnos`(`nombre`, `pass`, `idprofesor`, `idgrupo`, `licencia`) VALUES ('$nombre','$pass','$idProfesor','$idGrupo','$licencia')";

	$mysqli->query($sql);

	$numeroFilas++;

}

echo "<script language='javascript'>window.location.href = '../../pages/listaProfesoresCentro.php?licencia='.$licencia.''</script>";

//header("location:../../pages/listaProfesoresCentro.php?licencia=".$licencia);




?>