<?php


session_start();

if(isset($_SESSION["admin"])){ 



    include 'menu.php';

    include_once '../services/db_functions.php';
    include_once '../services/config.php';

    $db= new db_functions;

     $profesores = $db->seleccionarTodosProfesoresLicenciaCentro($_GET["licencia"]);

     if ($profesores != false){
            $no_of_profesores = mysqli_num_rows($profesores);
        }else{
            $no_of_profesores = 0;
        }   


?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profesores</h1>
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
                                    <div class="huge"><?php echo $no_of_profesores;?></div>
                                    <div>Profesores</div>
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
                                Últimas profesores introducidos
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Profesor</th>
                                            <th>Nombre</th>
                                            <th>Pass</th>
                                            <th>Email</th>
                                            <th>Id Centro</th>
                                            <th>Key Profesor</th>
                                            <th>Numero alumnos</th>
                                            <th>Numero grupos</th>
                                            <th>Crear grupo</th>
                                            <th>Automatizar</th>                                    
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        
                                       

                                        while($row = mysqli_fetch_array($profesores)){

                                        $alumnos = $db->seleccionarTodosAlumnosIdProfesor($row["id"]);

                                        $grupos = $db->seleccionarGruposProfesor($row["id"]);
                                        
                                        if ($alumnos != false){
                                            $no_of_alumnos = mysqli_num_rows($alumnos);
                                        }else{
                                            $no_of_alumnos = 0;
                                        } 

                                        if ($grupos != false){
                                            $no_of_grupos = mysqli_num_rows($grupos);
                                        }else{
                                            $no_of_grupos = 0;
                                        }  
                                        
                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.$row["id"].'</td>';
                                        echo '<td>'.$row["nombre"].'</td>';
                                        echo '<td>'.$row["pass"].'</td>';
                                        echo '<td>'.$row["email"].'</td>';
                                        echo '<td>'.$row["idcentro"].'</td>';
                                        echo '<td>'.$row["keyprofesor"].'</td>';
                                        echo '<td>'.$no_of_alumnos.'</td>';

                                        echo '<td>'.$no_of_grupos.'</td>';

                                        echo '<td><a href="crearGrupoProfesor.php?idProfesor='.$row["id"].'&licencia='.$row["licencia"].'">Crear grupo  </a></td>';

                                        echo '<td><a href="automatizarAlumnos.php?idProfesor='.$row["id"].'&licencia='.$row["licencia"].'">Automatizar</a></td>';
                                        echo '<td><a href="modificarProfesor.php?id='.$row["id"].'">Modificar</a></td>';
                                        echo '<td><a href="../services/usuarios/eliminarProfesor.php?id='.$row["id"].'">Eliminar</a></td>';
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