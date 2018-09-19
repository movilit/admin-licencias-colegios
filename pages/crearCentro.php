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
                    <h1 class="page-header">Crear Centro</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
               <?php
    if(isset($_GET["fallo"])){
                ?>
                <div id="cearUsuarioDiv" class="alert alert-warning">
                  <p>No se ha podido insertar el centro, ha ocurrido un error.</p>
                </div>
                <?php
            }
    ?>
    <?php
    if(isset($_GET["creado"])){
                ?>
                <div id="cearUsuarioDiv" class="alert alert-success">
                  <p>Centro Creado</p>
                </div>
                <?php
            }
    ?>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Crear Licencia
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="" name="" method="post" action="../services/usuarios/creandoCentro.php" enctype="multipart/form-data">
                                            <label>Nombre Centro*</label><br><input type="text" name="nombre" required><br><br>
                                            <label>Pais*</label><br>
                                            <select name="idpais" width="300" style="width: 300px">
                                                <?php
                                                $paises = $db->getPaises($_SESSION["paises"]);
                                                while($row2 = mysqli_fetch_array($paises)){
                                                    echo "<option value='".$row2['id']."' >".utf8_encode($row2['nombre'])."</option>";
                                                }
                                                ?>      
                                            </select><br><br>
                                            <label>Email</label><br><input type="text" name="email" ><br><br>
                                            <label>Teléfono</label><br><input type="text" name="telefono"><br><br>
                                            <label>Dirección</label><br><textarea name="direccion"></textarea><br><br>
                                            <label>Número de licencias*</label><br><input type="text" name="licencias"><br><br>
                                            <label>Fecha de caducidad*</label><br><input type="text" name="fecha" placeholder="YYYY-MM-DD"><br><br>
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