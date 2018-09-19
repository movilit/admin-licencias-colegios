<?php
session_start();
if(isset($_SESSION["admin"])){ 
    include 'menu.php';
    include_once '../services/db_functions.php';
    include_once '../services/config.php';
    $db= new db_functions;
    $profesor = $db->seleccionarProfesorId($_GET["id"]);
    $row = mysqli_fetch_array($profesor);
    ?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modificar Profesor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <?php
                if(isset($_GET["modificado"])){
                ?>
                <div id="cearUsuarioDiv" class="alert alert-success">
                  <p>Usuario modificado</p>
                </div>
                <?php
            }
    ?>
    <?php
                             if(isset($_GET["exist"])){
                ?>
                <div id="cearUsuarioDiv" class="alert alert-warning">
                  <p>El nombre de usuario esta en uso</p>
                </div>
                <?php
            }
    ?>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Modificar Profesor
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="" name="" method="post" action="../services/usuarios/modificandoProfesor.php" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
								<label>Nombre Usuario*</label><br><input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>" required><br><br>
								<label>Pass*</label><br><input type="text" name="pass" value="<?php echo $row["pass"]; ?>" required><br><br>
								<label>Nombre Completo*</label><br><input type="text" name="nombreProfesor" value="<?php echo $row["nombreprofesor"]; ?>" required><br><br>
								<label>Centro*</label><br><select name="idcentro">
														<?php
														$centros = $db->seleccionarTodosCentros($_SESSION["paises"]);
														while($row2 = mysqli_fetch_array($centros)){
															  if($row['idcentro'] == $row2['id']){
															  echo "<option value='".$row2['id']."' selected >".$row2['nombre']."  </option>";
																}else{
																	echo "<option value='".$row2['id']."' >".$row2['nombre']." </option>";
																}
															}
														?>      
															</select><br><br>
								<label>Email*</label><br><input type="text" name="email" value="<?php echo $row["email"]; ?>" required><br><br>
                                <div style="display:none;">
								<label>Nombre Centro*</label><br><input type="text" name="nombreCentro" value="<?php echo $row["nombrecentro"]; ?>"><br><br>
                                </div>
								<input type="submit" class="btn btn-primary send_btn" value="Enviar" onclick=""/>
								<a href="#myModal" class="btn btn-danger trigger-btn" data-toggle="modal">Eliminar</a>
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
	<!--//modal confirma eliminar-->
	<div id="myModal" class="modal fade" style="display: none;">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Seguro que deseas eliminar éste profesor?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
					<a href="../services/usuarios/eliminarProfesor.php?id=<?php echo $_getDatosCentroseleccionarTodosCentros["id"]; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
		</div>
	</div>
	<!--//FIN: modal confirma eliminar-->
<?php
include 'footer.php';
}else{
	header("location:index.php");
}
?>