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
                    <h1 class="page-header">Crear Profesor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
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
                  <p>Usuario Creado</p>
                </div>
                <?php
            }
    ?>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Crear Profesor
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="" name="" method="post" action="../services/usuarios/creandoProfesor.php" enctype="multipart/form-data">
                                            <label>Usuario*</label><br><input type="text" name="nombre" required><br><br>
                                            <label>Nombre Profesor*</label><br><input type="text" name="nombreProfesor" required><br><br>
                                            <label>Contraseña*</label><br><input type="text" name="pass" required><br><br>
                                            <label>Centro*</label><br><select name="idcentro">
                                                                    <?php
                                                                    $centros = $db->seleccionarTodosCentros($_SESSION["paises"]);
                                                                    while($row2 = mysqli_fetch_array($centros)){
                                                                          echo "<option value='".$row2['id']."' >".utf8_encode($row2['nombre'])."</option>";
                                                                        }
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Email*</label><br><input type="text" name="email" required><br><br>
                                            <input type="submit" class="btn btn-primary send_btn" value="Enviar" onclick=""/>
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