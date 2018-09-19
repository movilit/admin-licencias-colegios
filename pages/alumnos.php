<?php
session_start();
if(isset($_SESSION["admin"])){ 
    include 'menu.php';
    include_once '../services/db_functions.php';
    include_once '../services/config.php';
    $db= new db_functions;
     $alumnos = $db->seleccionarTodosAlumnos($_SESSION['paises']);
     if ($alumnos != false){
            $no_of_alumnos = mysqli_num_rows($alumnos);
        }else{
            $no_of_alumnos = 0;
        }   
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alumnos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $no_of_alumnos;?></div>
                                    <div>Alumnos</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Últimas alumnos introducidos
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Pass</th>
                                            <th>Id Profesor</th>
                                            <th>Id Grupo</th>
                                            <th>Licencia</th>                                       
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($alumnos)){
                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.$row["id"].'</td>';
                                        echo '<td>'.$row["nombre"].'</td>';
                                        echo '<td>'.$row["pass"].'</td>';
                                        echo '<td>'.$row["idprofesor"].'</td>';
                                        echo '<td>'.$row["idgrupo"].'</td>';
                                        echo '<td>'.$row["licencia"].'</td>';
                                        echo '<td><a href="modificarAlumno.php?id='.$row["id"].'">Modificar</a></td>';
                                        echo '<td><a href="../services/usuarios/eliminarAlumno.php?id='.$row["id"].'">Eliminar</a></td>';
                                        echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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
<?php
include 'footer.php';
}else{
    header("location:login.php");
}
?>