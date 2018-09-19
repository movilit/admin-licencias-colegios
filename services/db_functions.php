<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        include_once 'db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }

	//limpia cadena: elimina Espacios (usuarios, contraseñas)
    public function eliminaEspacios($cadena){
		$cadena=str_replace(" ","","$cadena");
        return $cadena;
    }    
	//CCB Seleccionar paises
	public function getPaises($paises){
        $link = new DB_Connect();
        if (isset($paises)){
            $query="SELECT * FROM `V2pais` WHERE `id` IN ($paises)";
           } else {
           $query="SELECT * FROM `V2pais`";
            }
        $result = mysqli_query($link->getRuta(), $query) or die(mysql_error());
		return $result;
    }	
	//CCB Seleccionar paises del usuario
	public function getUsuarioPaises($usuario){
        $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT pais FROM `V2admin_pais` WHERE `usuario` LIKE '$usuario'") or die(mysql_error());
        //$paises= mysqli_fetch_array($result);
        $key=0;
        while ($res=mysqli_fetch_array($result)) {
            $pais=$res['pais'];
            if ($key==0) {
                $cadena=$pais;
            }else {
                $cadena .=", $pais";
            }
            $cadena_paises = implode(",", $res['pais']);
        $key++;
        }
        //$paises= mysqli_num_rows($result);
		//return $paises;
        return $cadena;
    }
	//CCB Seleccionar nombre del centro
	public function seleccionarNombreCentro($idcentro){
		$link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT nombre FROM `centros` WHERE `id`= '$idcentro' LIMIT 1") or die(mysql_error());
		while ($res=mysqli_fetch_array($result)) {
			$nombre=$res['nombre'];
		}
		return $nombre;
    }
	//CCB Marcar profesor como borrado
    public function estadoBorradoProfesor($id){
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `profesores` SET `estado`='2' WHERE `id`= '$id'") or die(mysql_error());
        return $result;
    }

	 //Seguridad: limpia cadena para hacerla segura a inyecciones
    public function limpiarCadena($cadena){
		$cadena=trim($cadena);
		$cadena=addslashes($cadena);
        return $cadena;
    }

    public function loguearAdmin($user,$pass){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `admin` WHERE `nombre` ='$user' AND `pass` = '$pass'");
        return $result;
       
  
    }

        public function seleccionarTodosLog(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `logprofesores` ORDER BY `id` ASC ");
        return $result;
       
  
    }

    public function seleccionarTodasRevistas(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `revista`") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarRevistaId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `revista` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarTodasPaginas(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `pagina` LIMIT 5") or die(mysql_error());
        return $result;
       
  
    }
    
    public function actualizarRevista($id, $nombre, $mes, $fecha, $estado, $imagen){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `revista` SET `nombre`='$nombre',`mes`='$mes',`fecha`='$fecha',`estado`='$estado',`img`='$imagen' WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function crearRevista($nombre, $mes, $estado, $imagen){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `revista`(`nombre`, `mes`, `fecha`, `estado`, `img`) VALUES ('$nombre','$mes',NOW(),'$estado','$imagen')") or die(mysql_error());
        return $result;
       
  
    }

    public function eliminarRevista($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "DELETE FROM `revista` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarTodasCategorias(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `categoria`") or die(mysql_error());
        return $result;
       
  
    }

    public function crearPagina($idRevista, $numero, $nivel, $idCategoria, $contenido, $paises){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `pagina`(`idrevista`, `numero`, `nivel`, `idcategoria`, `contenido`, `paises`) VALUES ('$idRevista','$numero','$nivel','$idCategoria','$contenido','$paises')") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarPaginaId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `pagina` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function actualizarPagina($id, $idRevista, $numero, $nivel, $idCategoria, $contenido, $paises){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `pagina` SET `idrevista`='$idRevista',`numero`='$numero',`nivel`='$nivel',`idcategoria`='$idCategoria',`contenido`='$contenido',`paises`='$paises' WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function eliminarPagina($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "DELETE FROM `pagina` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function crearCategoria($nombre){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `categoria`(`nombre`) VALUES ('$nombre')") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarCategoriaId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `categoria` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function actualizarCategoria($id, $nombre){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `categoria` SET `nombre`='$nombre' WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function eliminarCategoria($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "DELETE FROM `categoria` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }


     public function seleccionarTodosAlumnos($paises){
       $link = new DB_Connect();
       if (isset($paises)){
        $query="SELECT alumnos.id, alumnos.nombre, alumnos.pass, alumnos.idprofesor, alumnos.idgrupo, alumnos.licencia, alumnos.estado FROM `alumnos`, `centros` WHERE alumnos.licencia=centros.keycentro AND centros.pais IN ($paises)";
       } else {
        $query="SELECT id, nombre, pass, idprofesor, idgrupo, licencia, estado FROM `alumnos`";
        }
       $result = mysqli_query($link->getRuta(), $query) or die(mysql_error());
       return $result;
    }

    public function seleccionarTodasLicencias(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `licencias`") or die(mysql_error());
        return $result;
       
  
    }
    public function seleccionarTodosCentros($paises){
       if (isset($paises)){
        $query="SELECT * FROM `centros` WHERE pais IN ($paises)";
       } else {
       $query="SELECT * FROM `centros`";
        }
	   $link = new DB_Connect();
	   $result = mysqli_query($link->getRuta(), $query) or die(mysql_error());
       return $result;
    }
    public function getDatosCentro($id){
        $query="SELECT * FROM `centros` WHERE `id` IN ($id)";
        $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), $query) or die(mysql_error());
        return $result;
     }

     public function seleccionarCentrosLimite(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `centros` LIMIT 5") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarCentroId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `centros` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function actualizarCentro($id, $nombre, $email, $telefono, $pais){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `centros` SET `nombre`='$nombre',`email`='$email',`telefono`='$telefono', `pais`='$pais' WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function actualizarCaducidadLicencia($id, $fecha){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `licencias` SET `caducidad`='$fecha' WHERE `idcentro`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function eliminarCentro($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "DELETE FROM `centros` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function crearCentro($nombre, $email, $telefono, $keycentro){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `centros`(`nombre`, `email`, `telefono`, `keycentro`) VALUES ('$nombre','$email','$telefono','$keycentro')") or die(mysql_error());
        return $result;
       
  
    }

    public function crearProfesor($nombre, $pass, $idcentro, $keyprofesor){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `profesores`(`nombre`, `pass`, `idcentro`, `keyprofesor`) VALUES ('$nombre','$pass','$idcentro','$keyprofesor')") or die(mysql_error());
        return $result;
       
  
    }

    public function insertarProfesorPrueba($nombre, $pass, $keyprofesor, $email, $nombreprofesor, $nombrecentro){

       $link = new DB_Connect();

        $result = mysqli_query($link->getRuta(), "INSERT INTO `profesores`(`nombre`, `pass`, `keyprofesor`, `email`, `nombreprofesor`, `nombrecentro`, `licencia`, `prueba`) VALUES ('$nombre','$pass','$keyprofesor','$email','$nombreprofesor','$nombrecentro','prueba',1)");

        return $result; 



    }

    public function insertarProfesor($nombre, $pass, $idCentro, $keyprofesor, $email, $nombreprofesor, $nombrecentro, $licencia){

       $link = new DB_Connect();

        $result = mysqli_query($link->getRuta(), "INSERT INTO `profesores`(`nombre`, `pass`, `idcentro`, `keyprofesor`, `email`, `nombreprofesor`, `nombrecentro`, `licencia`, `prueba`) VALUES ('$nombre','$pass','$idCentro','$keyprofesor','$email','$nombreprofesor','$nombrecentro','$licencia',1)");

        return $result; 



    }

        public function insertarParticular($user, $pass, $caducidad, $nombre, $apellidos, $calle, $ciudad, $provincia, $cp, $telefono, $movil, $fax, $email, $fechanac){

       $link = new DB_Connect();

        $result = mysqli_query($link->getRuta(), "INSERT INTO `particulares`(`username`, `pass`, `fechareg`, `caducidad`, `nombre`, `apellidos`, `calle`, `ciudad`, `provincia`, `cp`, `telefono`, `movil`, `fax`, `email`, `fechanac`) VALUES ('$user','$pass',NOW(),'$caducidad','$nombre','$apellidos','$calle','$ciudad','$provincia','$cp','$telefono','$movil','$fax','$email','$fechanac')");

        return $result; 



    }


    public function insertarCentro($nombre, $email, $telefono, $keycentro, $direccion, $pais){
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `centros`( `nombre`, `email`, `telefono`, `keycentro`, `direccion`, `pais`) VALUES ('$nombre','$email','$telefono','$keycentro','$direccion','$pais')");
        return $result; 
    }
    public function insertarLicencia($keycentro, $numeroAlumnos, $idCentro, $caducidad){
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `licencias`(`keycentro`, `numeroalumnos`, `idcentro`, `caducidad`, `particular`) VALUES ('$keycentro','$numeroAlumnos','$idCentro','$caducidad','0')");
        return $result; 
    }


    public function seleccionarUltimoCentro(){

        $link = new DB_Connect();

        $result = mysqli_query($link->getRuta(), "SELECT * FROM `centros` ORDER BY `id` DESC LIMIT 1");

        return $result;
    }

    public function seleccionarKeyProfesores($key){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `profesores` WHERE `keyprofesor` = '$key'");

        return $result; 



    }

    public function seleccionarKeyCentros($key){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `centros` WHERE `keycentro` = '$key'");

        return $result; 



    }



    public function seleccionarLicenciaIdCentro($id){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `centros` WHERE `id` = '$id'");

        return $result; 



    }

        public function seleccionarNombreUsuario($nombre){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `profesores` WHERE `nombre` = '$nombre'");

        return $result; 



    }

        public function seleccionarNombreAlumno($nombre){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `alumnos` WHERE `nombre` = '$nombre'");

        return $result; 



    }

            public function seleccionarNombreParticular($nombre){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `particulares` WHERE `username` = '$nombre'");

        return $result; 



    }

    public function seleccionarTodosProfesores($paises){
  
       $link = new DB_Connect();
       if (isset($paises)){
        $query="SELECT profesores.id, profesores.nombre, profesores.pass, profesores.idcentro, profesores.keyprofesor FROM `profesores`, `centros` WHERE profesores.idcentro=centros.id AND profesores.estado=1 AND centros.pais IN ($paises)";
       } else {
        $query="SELECT id, nombre, pass, idcentro, keyprofesor FROM `profesores` WHERE estado=1";
        }
        $result = mysqli_query($link->getRuta(), $query) or die(mysql_error());
        return $result;
       
  
    }

        public function seleccionarTodosParticulares(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `particulares`") or die(mysql_error());
        return $result;
       
  
    }
    public function seleccionarTodosProfesoresLicenciaCentro($licencia){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `profesores` WHERE `licencia` = '$licencia'") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarProfesorId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `profesores` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function actualizarProfesor($id, $nombre, $pass, $email, $nombreprofesor, $nombrecentro, $idcentro){
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `profesores` SET `nombre`='$nombre',`pass`='$pass',`email`='$email',`nombreprofesor`='$nombreprofesor',`nombrecentro`='$nombrecentro',`idcentro`='$idcentro' WHERE `id` = '$id'") or die(mysql_error());
        return $result;
    }
        public function actualizarProfesorSinNombre($id, $pass, $email, $nombreprofesor, $nombrecentro, $idcentro){
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `profesores` SET `pass`='$pass',`email`='$email',`nombreprofesor`='$nombreprofesor',`nombrecentro`='$nombrecentro',`idcentro`='$idcentro' WHERE `id` = '$id'") or die(mysql_error());
        return $result;
    }

       public function seleccionarKeyGrupo($key){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `grupos` WHERE `keygrupo` = '$key'");

        return $result; 



    }

    public function seleccionarGruposProfesor($idProfesor){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `grupos` WHERE `idprofesor` = '$idProfesor' ORDER BY `id` DESC");

        return $result; 



    }

    public function insertarGrupoProfesor($nombre, $idProfesor, $keygrupo){

       $link = new DB_Connect();

        $result = mysqli_query($link->getRuta(), "INSERT INTO `grupos`(`nombre`, `idprofesor`, `keygrupo`) VALUES ('$nombre','$idProfesor','$keygrupo')");

        return $result; 



    }

    public function seleccionarNombreGrupo($nombre, $idProfesor){

       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `grupos` WHERE `nombre` = '$nombre' AND `idprofesor` = '$idProfesor'");

        return $result; 



    }

    public function eliminarProfesor($id){
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "DELETE FROM `profesores` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
    }

    public function seleccionarTodosGrupos($paises){
         $link = new DB_Connect();
         if (isset($paises)){
            $query="SELECT grupos.id, grupos.nombre, grupos.idprofesor, grupos.keygrupo FROM `grupos`, `profesores`, `centros` WHERE profesores.id=grupos.idprofesor AND profesores.idcentro=centros.id AND centros.pais IN ($paises)";
           } else {
            $query="SELECT id, nombre, idprofesor, keygrupo FROM `grupos`";
            }
         $result = mysqli_query($link->getRuta(), $query) or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarGrupoId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `grupos` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function actualizarGrupo($id, $nombre, $idprofesor, $keygrupo){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `grupos` SET `nombre`='$nombre',`idprofesor`='$idprofesor',`keygrupo`='$keygrupo' WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function eliminarGrupo($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "DELETE FROM `grupos` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function crearGrupo($nombre, $idprofesor, $keygrupo){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `grupos`(`nombre`, `idprofesor`, `keygrupo`) VALUES ('$nombre','$idprofesor','$keygrupo')") or die(mysql_error());
        return $result;
       
  
    }

    public function crearAlumno($nombre, $pass, $idprofesor, $idgrupo, $licencia){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "INSERT INTO `alumnos`(`nombre`, `pass`, `idprofesor`, `idgrupo`, `licencia`) VALUES ('$nombre','$pass','$idprofesor','$idgrupo','$licencia')") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarAlumnoId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `alumnos` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function actualizarAlumno($id, $nombre, $pass, $idprofesor, $idgrupo, $licencia){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "UPDATE `alumnos` SET `nombre`='$nombre',`pass`='$pass',`idprofesor`='$idprofesor',`idgrupo`='$idgrupo',`licencia`='$licencia' WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

     public function eliminarAlumno($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "DELETE FROM `alumnos` WHERE `id`= '$id'") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarDistintosProfesores(){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT DISTINCT  `idprofesor` FROM  `alumnos` ") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarprofesoresId($id){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `profesores` WHERE `id` = '$id' ") or die(mysql_error());
        return $result;
       
  
    }
    public function seleccionarAlumnosProfesorId($profesorId){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `alumnos` WHERE `idprofesor` = '$profesorId' ") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarTodosAlumnosLicenciaCentro($licencia){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `alumnos` WHERE `licencia` = '$licencia' ") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarTodosAlumnosIdProfesor($idProfesor){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `alumnos` WHERE `idprofesor` = '$idProfesor' ") or die(mysql_error());
        return $result;
       
  
    }

    public function seleccionarLicenciaIdCentro2($idCentro){
  
       $link = new DB_Connect();
        $result = mysqli_query($link->getRuta(), "SELECT * FROM `licencias` WHERE `idcentro` = '$idCentro' ") or die(mysql_error());
        return $result;
       
  
    }
    

}
 
?>