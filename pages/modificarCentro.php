<?php
session_start();
if(isset($_SESSION["admin"])){ 
    include 'menu.php';
    include_once '../services/db_functions.php';
    include_once '../services/config.php';
    $db= new db_functions;
    $centro = $db->seleccionarCentroId($_GET["id"]);
    $row = mysqli_fetch_array($centro);
    $licencias = $db->seleccionarLicenciaIdCentro2($row["id"]);
    $row1 = mysqli_fetch_array($licencias);
    ?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modificar centro</h1>
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
                                Modificar centro
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="" name="" method="post" action="../services/usuarios/modificandoCentro.php" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                            <label>Nombre*</label><br><input type="text" name="nombre" value="<?php echo $row['nombre'];?>" required><br><br>
                                            <select name="idpais" width="300" style="width: 300px">
                                                <?php
                                                $paises = $db->getPaises($_SESSION["paises"]);
                                                while($row2 = mysqli_fetch_array($paises)){
                                                    echo "<option value='".$row2['id']."'";
                                                    $centro = $db->getDatosCentro($_GET['id']);
                                                    while ($row3=mysqli_fetch_array($centro)){
                                                        if ($row2['id']==$row3['pais']){
                                                            echo "selected";
                                                        }
                                                    }
                                                    echo ">".utf8_encode($row2['nombre'])."</option>";
                                                }
                                                ?>      
                                            </select><br><br>
                                            <label>Email*</label><br><input type="email" name="email" value="<?php echo $row['email'];?>" required><br><br>
                                            <label>Teléfono*</label><br><input type="text" name="telefono" value="<?php echo $row['telefono'];?>" required><br><br>
                                            <label>Key Centro*</label><br><p><?php echo $row['keycentro'];?></p><br><input type="hidden" name="keycentro" value="<?php echo $row['keycentro'];?>">
                                            <label>Fecha de caducidad*</label><br><p><?php echo $row1['caducidad'];?></p><br><input type="hidden" name="fecha" value="<?php echo $row1['caducidad'];?>">
                                            <input type="submit" class="btn btn-primary send_btn" value="Guardar" onclick=""/>
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