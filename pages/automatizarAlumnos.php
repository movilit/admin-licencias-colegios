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
                    <h1 class="page-header">Automatizar Alumnos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">

                                <?php
                             if(isset($_GET["creado"])){

                ?>

                <div id="cearUsuarioDiv" class="alert alert-success">
                  <p><?php echo $_GET["numero"]; ?> alumnos creados</p>
                </div>
                
                <?php
            }
    
    ?>
    <?php
                             if(isset($_GET["exist"])){

                ?>

                <div id="cearUsuarioDiv" class="alert alert-warning">
                  <p>El grupo ya tiene alumnos</p>
                </div>
                
                <?php
            }
    
    ?>
                                        
                    
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Automatizar Alumnos
                            </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form id="" name="" method="post" action="../services/usuarios/scriptAutomatizacionAlumnos.php" enctype="multipart/form-data">


                                            <label>Codigo de nombre*</label><br><input type="text" name="nombre" placeholder="Ejemplo: garcialorca (El punto lo pone automaticamente NO INTRODUCIR)" style="width:100%;" required><br><br>
                                            <label>Codigo de pass*</label><br><input type="text" name="pass" placeholder="Ejemplo: garcialorca" style="width:100%;" required><br><br>
                                            <label>Localidad*</label><br><input type="text" name="localidad" placeholder="Ejemplo: leganes (Esto va detras del punto)" style="width:100%;" required><br><br>
                                            <label>Codigo de Curso*</label><br><input type="text" name="codigoCurso" placeholder="Ejemplo: Si es 1ºA el codigo seria aa" style="width:100%;" required><br><br>
                                            
                                            <label>Grupo*</label><br><select name="idGrupo" style="width:100%;" required>
                                                        <?php
                                                $grupos = $db->seleccionarGruposProfesor($_GET["idProfesor"]);
                                                    while($row2 = mysqli_fetch_array($grupos)){
                                                        

                                                        echo "<option value='".$row2['id']."' >".utf8_encode($row2['nombre'])." </option>";

                                                        
                                                                        
                                                    }
                                                                         
                                                        ?>      
                                                                        </select><br><br>
                                            <label>Numero de alumnos*</label><br><input type="text" name="numeroAlumnos" placeholder="Ejemplo: 25" style="width:100%;" required><br><br>
                                            <input type="hidden" name="idProfesor" value="<?php echo $_GET['idProfesor'];?>" required>
                                            <input type="hidden" name="licencia" value="<?php echo $_GET['licencia'];?>" required>

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