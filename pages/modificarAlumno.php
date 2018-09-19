<?php
session_start();
if(isset($_SESSION["admin"])){ 
    include 'menu.php';
    include_once '../services/db_functions.php';
    include_once '../services/config.php';
    $db= new db_functions;
    $alumno = $db->seleccionarAlumnoId($_GET["id"]);
    $row = mysqli_fetch_array($alumno);
    ?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modificar Alumno</h1>
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
                                Modificar Alumno
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="" name="" method="post" action="../services/usuarios/modificandoAlumno.php" enctype="multipart/form-data">
                                             <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                            <label>Nombre*</label><br><input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>" required><br><br>
                                            <label>Pass*</label><br><input type="text" name="pass" value="<?php echo $row["pass"]; ?>" required><br><br>
                                            <label>Id Profesor*</label><br><select name="idprofesor">
                                                                    <?php
                                                                    $centros = $db->seleccionarTodosProfesores($_SESSION['paises']);
                                                                    while($row2 = mysqli_fetch_array($centros)){
                                                                          if($row['idprofesor'] == $row2['id']){
                                                                          echo "<option value='".$row2['id']."' selected >".$row2['nombre']."  </option>";
                                                                            }else{

                                                                                echo "<option value='".$row2['id']."' >".$row2['nombre']." </option>";
                                                                            }
                                                                        }
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Key Grupo*</label><br><select name="idgrupo">
                                                                    <?php
                                                                    $grupos = $db->seleccionarTodosGrupos($_SESSION['paises']);
                                                                    while($row1 = mysqli_fetch_array($grupos)){
                                                                          if($row['idgrupo'] == $row1['id']){
                                                                          echo "<option value='".$row1['id']."' selected >".utf8_encode($row1['keygrupo'])."  </option>";
                                                                            }else{
                                                                                echo "<option value='".$row1['id']."' >".utf8_encode($row1['nombre'])." </option>";
                                                                            }
                                                                        }
                                                                    ?>      
                                                                        </select><br><br>
                                            <label>Licencia*</label><br><input type="text" name="licencia" value="<?php echo $row["licencia"]; ?>" required><br><br>
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