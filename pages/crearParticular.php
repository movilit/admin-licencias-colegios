<?php


session_start();

if(isset($_SESSION["admin"])){ 



    include 'menu.php';

    include_once '../services/db_functions.php';
    include_once '../services/config.php';

    $db= new db_functions;

    

    ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Crear Particular</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">

                <?php

    if(isset($_GET["fallo"])){

                ?>

                <div id="cearUsuarioDiv" class="alert alert-warning">
                  <p>No se ha podido insertar el particular, ha ocurrido un error.</p>
                </div>
                
                <?php
            }
    
    ?>
    <?php


    if(isset($_GET["exist"])){

                ?>

                <div id="cearUsuarioDiv" class="alert alert-warning">
                  <p>El nombre de usuario ya existe</p>
                </div>
                
                <?php
            }
    
    ?>
    <?php

    if(isset($_GET["creado"])){

                ?>

                <div id="cearUsuarioDiv" class="alert alert-success">
                  <p>Particular Creado</p>
                </div>
                
                <?php
            }
    
    ?>
                                        
                    
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Crear Particular
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form id="" name="" method="post" action="../services/usuarios/creandoParticular.php" enctype="multipart/form-data">


                                            
                                            <label>Nombre de usuario*</label><br><input type="text" name="user" required><br><br>
                                            <label>Contraseña*</label><br><input type="text" name="pass" required><br><br>
                                            <label>Fecha de caducidad*</label><br><input type="text" name="caducidad" placeholder="YYYY-MM-DD"><br><br>
                                            <label>Nombre</label><br><input type="text" name="nombre"><br><br>
                                            <label>Apellidos</label><br><input type="text" name="apellidos"><br><br>
                                            <label>Calle</label><br><input type="text" name="calle"><br><br>
                                            <label>Ciudad</label><br><input type="text" name="ciudad"><br><br>
                                            <label>Provincia</label><br><input type="text" name="provincia"><br><br>
                                            <label>CP</label><br><input type="text" name="cp"><br><br>
                                            <label>Teléfono</label><br><input type="text" name="telefono"><br><br>
                                            <label>Movil</label><br><input type="text" name="movil"><br><br>
                                            <label>Fax</label><br><input type="text" name="fax"><br><br>
                                            <label>Email</label><br><input type="text" name="email" ><br><br>
                                            <label>Fecha de Nacimiento</label><br><input type="text" name="nacimiento" placeholder="YYYY-MM-DD"><br><br>
                                           
                                            <input type="submit" class="send_btn" value="Enviar" onclick=""/>
                                            


                                     </form>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	
               

            </div>		

	
</div>






<?php

include 'footer.php';

}else{
	header("location:index.php");
}


?>