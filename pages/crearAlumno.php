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
                    <h1 class="page-header">Crear Alumno</h1>
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
                                Crear Alumno
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="" name="" method="post" action="../services/usuarios/creandoAlumno.php" enctype="multipart/form-data">
                                            <label>Nombre*</label><br><input type="text" name="nombre" required><br><br>
                                            <label>Pass*</label><br><input type="text" name="pass" required><br><br>
                                            <label>Id profesor*</label><br><select name="idprofesor">
                                                                    <?php
                                                                    $profesores = $db->seleccionarTodosProfesores($_SESSION['paises']);
                                                                    while($row2 = mysqli_fetch_array($profesores)){
                                                                                echo "<option value='".$row2['id']."' >".$row2['nombre']." </option>";
                                                                        }
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Key grupo*</label><br><select name="idgrupo">
                                                                    <?php
                                                                    $grupos = $db->seleccionarTodosGrupos($_SESSION['paises']);
                                                                    while($row1 = mysqli_fetch_array($grupos)){
                                                                                echo "<option value='".$row1['id']."' >".$row1['keygrupo']." </option>";
                                                                        }
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Licencia*</label><br><input type="text" name="licencia" required><br><br>
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