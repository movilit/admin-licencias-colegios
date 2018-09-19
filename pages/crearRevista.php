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
                    <h1 class="page-header">Crear Revista</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                                        
                    
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Crear Revista
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form id="" name="" method="post" action="../services/revista/creandoRevista.php" enctype="multipart/form-data">


                                            <label>Nombre*</label><br><input type="text" name="nombre" required><br><br>
                                            <label>Mes*</label><br><input type="text" name="mes" required><br><br>
                                            <label>Estado</label><br><input type="text" name="estado"/><br><br>
                                            <label>Imagen</label><br><input type="text" name="imagen" id="imagen"/><br><br>
                                            
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