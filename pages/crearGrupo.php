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
                    <h1 class="page-header">Crear Grupo</h1>
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
                                Crear Grupo
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="" name="" method="post" action="../services/usuarios/creandoGrupo.php" enctype="multipart/form-data">
                                            <label>Nombre*</label><br><input type="text" name="nombre" required><br><br>
                                            <label>Id profesor*</label><br><select name="idprofesor">
                                                                    <?php
                                                                    $profesores = $db->seleccionarTodosProfesores($_SESSION['paises']);
                                                                    while($row2 = mysqli_fetch_array($profesores)){
                                                                        echo "<option value='".$row2['id']."' >".$row2['nombre']." </option>";
                                                                    }
                                                                    ?>      
                                                                        </select><br><br>
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