
<?php
  
class DB_Connect {
  
      // constructor
    function __construct() {
  
    }
  
    // destructor
    function __destruct() {
        // $this->close();
    }
  
    // Connecting to database

    

    public function getRuta(){

        $ruta = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

     return $ruta;
    }

    public function connect() {
        require_once 'config.php';
        // connecting to mysql
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        // selecting database
        //mysqli_select_db($con, DB_DATABASE);
  
        // return database handler
        return $con;
    }
  
    // Closing database connection
    public function close() {
        mysqli_close();
    }
  
} 
?>