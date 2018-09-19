<?php


session_start();

if(isset($_SESSION["admin"])){ 



    include 'menu.php';

    include_once '../services/db_functions.php';
    include_once '../services/config.php';

    $db= new db_functions;

    $pagina = $db->seleccionarPaginaId($_GET["id"]);

    $row = mysqli_fetch_array($pagina);

    ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modificar Página</h1>
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
                                Modificar Página
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form id="" name="" method="post" action="../services/revista/modificandoPagina.php" enctype="multipart/form-data">


                                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                            <label>Revista*</label><br><select name="revista">
                                                                    <?php
                                                                    $revistas = $db->seleccionarTodasRevistas();
                                                                    while($row2 = mysqli_fetch_array($revistas)){
                                                                          if($row2['nombre'] == $row['nombre']){
                                                                          echo "<option value='".$row2['id']."' selected>".$row2['nombre']."</option>";
                                                                        }else{
                                                                            echo "<option value='".$row2['id']."'>".$row2['nombre']."</option>";
                                                                        }
                                                                        
                                                                        }
                                                                         
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Número de página*</label><br><input type="text" name="numero" value="<?php echo $row['numero'];?>" required><br><br>
                                            <label>Nivel*</label><br><select name="nivel">
                                                                    
                                                                    <option value='1' <?php if($row['nivel'] == "1"){echo "selected";} ?> >1</option>
                                                                    <option value='2' <?php if($row['nivel'] == "2"){echo "selected";} ?>>2</option>
                                                                    <option value='3' <?php if($row['nivel'] == "3"){echo "selected";} ?>>3</option>
                                                                    <option value='4' <?php if($row['nivel'] == "4"){echo "selected";} ?>>4</option>
                                                                    <option value='5' <?php if($row['nivel'] == "5"){echo "selected";} ?>>5</option>
                                                                    <option value='6' <?php if($row['nivel'] == "6"){echo "selected";} ?>>6</option>
                                                                    <option value='7'<?php if($row['nivel'] == "7"){echo "selected";} ?> >7</option>
                                                                        
                                                                        
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Categoria*</label><br><select name="categoria">
                                                                    <?php
                                                                    $categorias = $db->seleccionarTodasCategorias();
                                                                    while($row1 = mysqli_fetch_array($categorias)){
                                                                          
                                                                          if($row1['id'] == $row['idcategoria']){
                                                                          echo "<option value='".$row1['id']."' selected>".$row1['nombre']."</option>";
                                                                        }else{
                                                                            echo "<option value='".$row1['id']."'>".$row1['nombre']."</option>";
                                                                        }
                                                                        
                                                                        }
                                                                         
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Contenido*</label><br><textarea name="contenido"  required><?php echo $row['contenido'];?></textarea><br><br>
                                            <label>Paises*</label><br><input type="text" name="paises" value="<?php echo $row['paises'];?>" required><br><br>
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