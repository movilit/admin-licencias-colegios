<?php


session_start();

if(isset($_SESSION["admin"])){ 



    include 'menu.php';

    include_once '../services/db_functions.php';
    include_once '../services/config.php';

    $db= new db_functions;

     $centros = $db->seleccionarTodosLog();

     if ($centros != false){
            $no_of_centros = mysqli_num_rows($centros);
        }else{
            $no_of_centros = 0;
        }   


?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Log de profesores</h1>
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
                                    <div class="huge"><?php echo $no_of_centros;?></div>
                                    <div>Log de profesores</div>
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
                                Últimas profesores logueados
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Log</th>
                                            <th>Id profesor</th>
                                            <th>Usuario</th>
                                            <th>Centro</th>
                                            <th>Licencia</th>
                                            <th>Fecha</th>
                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        
                                       

                                        while($row = mysqli_fetch_array($centros)){
                                        
                                        
                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.$row["id"].'</td>';
                                        echo '<td>'.$row["idprofesor"].'</td>';
                                        echo '<td>'.$row["usuario"].'</td>';
                                        echo '<td>'.utf8_encode($row["centro"]).'</td>';
                                        echo '<td>'.$row["licencia"].'</td>';
                                        echo '<td>'.$row["fecha"].'</td>';
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