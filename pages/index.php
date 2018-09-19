<?php


session_start();

if(isset($_SESSION["admin"])){ 



    include 'menu.php';

    include_once '../services/db_functions.php';
    include_once '../services/config.php';

    $db= new db_functions;

/*
    $alumnos = $db->seleccionarTodosAlumnos();

     if ($alumnos != false){
            $no_of_alumnos = mysqli_num_rows($alumnos);
        }else{
            $no_of_alumnos = 0;
        }

    $licencias = $db->seleccionarTodosAlumnos();

     if ($alumnos != false){
            $no_of_licencias = mysqli_num_rows($licencias);
        }else{
            $no_of_licencias = 0;
        }

    $categoria = $db->seleccionarTodasCategorias();

     if ($categoria != false){
            $no_of_categoria = mysqli_num_rows($categoria);
        }else{
            $no_of_categoria = 0;
        }


    $revistas = $db->seleccionarTodasRevistas();

     if ($revistas != false){
            $no_of_revistas = mysqli_num_rows($revistas);
        }else{
            $no_of_revistas = 0;
        }

*/
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Panel de control</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!--
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php //echo $no_of_alumnos; ?><!--</div>
                                    <div>Alumnos</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php //echo $no_of_revistas; ?><!--</div>
                                    <div>Revistas</div>
                                </div>
                            </div>
                        </div>
                        <a href="revistas.php">
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php //echo $no_of_licencias; ?><!--</div>
                                    <div>Licencias</div>
                                </div>
                            </div>
                        </div>
                        <a href="licencias.php">
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-ul fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php //echo $no_of_categoria; ?><!--</div>
                                    <div>Categorías</div>
                                </div>
                            </div>
                        </div>
                        <a href="categorias.php">
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
           <!-- <div class="row">
                <div class="col-lg-8">
                                        
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Últimas páginas introducidas <a class="enlaceTablas" href="paginas.php">Ir</a>
                        </div>
                        <!-- /.panel-heading -->
                      <!--  <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Revista</th>
                                            <th>Número de página</th>
                                            <th>Nivel</th>
                                            <th>Categoría</th>
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        /*
                                       $paginas = $db->seleccionarTodasPaginas();

                                        while($row = mysqli_fetch_array($paginas)){
                                        
                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.$row["idrevista"].'</td>';
                                        echo '<td>'.$row["numero"].'</td>';
                                        echo '<td>'.$row["nivel"].'</td>';
                                        echo '<td>'.$row["idcategoria"].'</td>';
                                        echo '<td><a href="modificarPagina.php?id='.$row["id"].'">Modificar</a></td>';
                                        echo '<td><a href="../services/revista/eliminarPagina.php?id='.$row["id"].'">Eliminar</a></td>';
                                        echo '</tr>';
                                        
                                        }*/
                                        ?>

                         <!--           </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                      <!--  </div>
                        <!-- /.panel-body -->
                  <!--  </div>
                    <!-- /.panel -->
               <!-- </div>
                <!-- /.col-lg-8 -->
               <!-- <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Últimos centros <a class="enlaceTablas" href="centros.php">Ir</a>
                        </div>
                        <!-- /.panel-heading -->
                <!--        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre del centro</th>
                                            <th>Modificar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        /*
                                       $centros = $db->seleccionarCentrosLimite();

                                        while($row1 = mysqli_fetch_array($centros)){
                                        
                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.$row1["nombre"].'</td>';
                                        echo '<td><a href="modificarCentro.php?id='.$row1["id"].'">Modificar</td>';
                                        
                                        echo '</tr>';
                                        
                                        }*/
                                        ?>

                      <!--              </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                    <!--    </div>
                        <!-- /.panel-body -->
                  <!--  </div>
                    <!-- /.panel -->
                    
                   
                    
             <!--   </div>
                <!-- /.col-lg-4 -->
         <!--   </div>
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