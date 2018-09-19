<?php


session_start();

if(isset($_SESSION["admin"])){ 



    include 'menu.php';

    include_once '../services/db_functions.php';
    include_once '../services/config.php';

    $db= new db_functions;

     $paginas = $db->seleccionarTodasPaginas();

     if ($paginas != false){
            $no_of_paginas = mysqli_num_rows($paginas);
        }else{
            $no_of_paginas = 0;
        }


?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Páginas</h1>
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
                                    <div class="huge"><?php echo $no_of_paginas;?></div>
                                    <div>Páginas</div>
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
                
                
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                                        
                    
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Últimas páginas introducidas
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                                        
                                       

                                        while($row = mysqli_fetch_array($paginas)){
                                        
                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.$row["idrevista"].'</td>';
                                        echo '<td>'.$row["numero"].'</td>';
                                        echo '<td>'.$row["nivel"].'</td>';
                                        echo '<td>'.$row["idcategoria"].'</td>';
                                        echo '<td><a href="modificarPagina.php?id='.$row["id"].'">Modificar</a></td>';
                                        echo '<td><a href="../services/revista/eliminarPagina.php?id='.$row["id"].'">Eliminar</a></td>';
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