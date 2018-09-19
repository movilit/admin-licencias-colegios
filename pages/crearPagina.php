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
                    <h1 class="page-header">Crear Página</h1>
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
                            
                            <form id="" name="" method="post" action="../services/revista/creandoPagina.php" enctype="multipart/form-data">


                                            <label>Revista*</label><br><select name="revista">
                                                                    <?php
                                                                    $revistas = $db->seleccionarTodasRevistas();
                                                                    while($row2 = mysqli_fetch_array($revistas)){
                                                                          
                                                                          echo "<option value='".$row2['id']."' >".$row2['nombre']."</option>";
                                                                        
                                                                        }
                                                                         
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Número de página*</label><br><input type="text" name="numero" required><br><br>
                                            <label>Nivel*</label><br><select name="nivel">
                                                                    
                                                                    <option value='1' >1</option>
                                                                    <option value='2' >2</option>
                                                                    <option value='3' >3</option>
                                                                    <option value='4' >4</option>
                                                                    <option value='5' >5</option>
                                                                    <option value='6' >6</option>
                                                                    <option value='7' >7</option>
                                                                        
                                                                        
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Categoria*</label><br><select name="categoria">
                                                                    <?php
                                                                    $categorias = $db->seleccionarTodasCategorias();
                                                                    while($row1 = mysqli_fetch_array($categorias)){
                                                                          
                                                                          echo "<option value='".$row1['id']."' >".$row1['nombre']."</option>";
                                                                        
                                                                        }
                                                                         
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Contenido*</label><br><textarea name="contenido" required></textarea><br><br>
                                            <label>Paises*</label><br><input type="text" name="paises" required><br><br>
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