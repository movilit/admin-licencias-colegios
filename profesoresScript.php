<?php

include_once 'services/db_functions.php';
include_once 'services/config.php';

$db= new db_functions;

$profesores = $db->seleccionarDistintosProfesores();



?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Colegio</th>
                                            <th>Usuario</th>
                                            <th>Numero Alumnos</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        
                                        while($row = mysqli_fetch_array($profesores)){

                                        	$prof = $db->seleccionarprofesoresId($row["idprofesor"]);
                                        	$row2 = mysqli_fetch_array($prof);

                                            $nalu = $db->seleccionarAlumnosProfesorId($row["idprofesor"]);

                                        echo '<tr class="odd gradeX">';
                                        echo '<td>'.utf8_encode($row2["id"]).'</td>';
                                        echo '<td>'.utf8_encode($row2["nombreprofesor"]).'</td>';
                                        echo '<td>'.utf8_encode($row2["email"]).'</td>';
                                        echo '<td>'.utf8_encode($row2["nombrecentro"]).'</td>';
                                        echo '<td>'.utf8_encode($row2["nombre"]).'</td>';
                                        echo '<td>'.mysqli_num_rows($nalu).'</td>';
                                        echo '</tr>';
                                        
                                        
                                        }
                                        	 
                                        ?>

                                    </tbody>
</table>