<?php


session_start();

if(isset($_SESSION["admin"])){ 



    include 'menu.php';

    include_once '../services/db_functions.php';
    include_once '../services/config.php';

    $db= new db_functions;

    $revista = $db->seleccionarRevistaId($_GET["id"]);

    $row = mysqli_fetch_array($revista);

    ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modificar Revista</h1>
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
                                Modificar Revista
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form id="" name="" method="post" action="../services/revista/modificandoRevista.php" enctype="multipart/form-data">


                                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                            <label>Nombre*</label><br><input type="text" name="nombre" value="<?php echo $row['nombre'];?>" required><br><br>
                                            <label>Mes*</label><br><textarea type="text" name="mes" required><?php echo $row['mes'];?></textarea><br><br>
                                            <label>Fecha</label><br><input type="date" name="fecha" id="fecha" /><br><br>
                                            <label>Estado</label><br><input type="text" name="estado" value="<?php echo $row['estado'];?>"/><br><br>
                                            <label>Imagen</label><br><input type="text" name="imagen" id="imagen" value="<?php echo $row['img'];?>"/><br><br>
                                            
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