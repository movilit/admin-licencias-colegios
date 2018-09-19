 <?php

  include 'head.php';

?>
<body>

    <div id="wrapper">
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">The Magazine</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="../services/logout.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Panel de control</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!--<li>
                                    <a href="#">Centros<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="centros.php">Todos los centros</a>
                                        </li>
                                        <li>
                                            <a href="crearCentro.php">Nuevo centro</a>
                                        </li>
                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Profesores<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="profesores.php">Todos los profesores</a>
                                        </li>
                                        <li>
                                            <a href="crearProfesor.php">Nuevo profesor</a>
                                        </li>
                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Grupos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="grupos.php">Todos los grupos</a>
                                        </li>
                                        <li>
                                            <a href="crearGrupo.php">Nuevo grupo</a>
                                        </li>
                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Alumnos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="alumnos.php">Todos los alumnos</a>
                                        </li>
                                        <li>
                                            <a href="crearAlumno.php">Nuevo alumno</a>
                                        </li>
                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Centros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!--<li>
                                    <a href="#">Centros<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="centros.php">Todos los centros</a>
                                        </li>
                                        <li>
                                            <a href="crearCentro.php">Nuevo centro</a>
                                        </li>
                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                
                                <li>
                                    <a href="centros.php">Todos los centros</a>
                                    <a href="crearCentro.php">Nuevo Centro</a>
                                    
                                </li>
                                
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Particulares<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!--<li>
                                    <a href="#">Centros<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="centros.php">Todos los centros</a>
                                        </li>
                                        <li>
                                            <a href="crearCentro.php">Nuevo centro</a>
                                        </li>
                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                
                                <li>
                                    <a href="particulares.php">Todos los particulares</a>
                                    <a href="crearParticular.php">Nuevo Particular</a>
                                    
                                </li>
                                
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-area-chart fa-fw"></i> Log<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!--<li>
                                    <a href="#">Centros<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="centros.php">Todos los centros</a>
                                        </li>
                                        <li>
                                            <a href="crearCentro.php">Nuevo centro</a>
                                        </li>
                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                
                                <li>
                                    <a href="log.php">Log de profesores</a>
                                    
                                    
                                </li>
                                
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-line-chart fa-fw"></i> Licencias</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Revistas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="revistas.php">Todas las revistas</a>
                                </li>
                                <li>
                                    <a href="crearRevista.php">Crear revista</a>
                                </li>
                                                                
                            </ul>
                            <!-- /.nav-second-level -->
                       <!-- </li>

                        <li>
                            <a href="#"><i class="fa fa-file-o fa-fw"></i> Páginas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="paginas.php">Todas las páginas</a>
                                </li>
                                <li>
                                    <a href="crearPagina.php">Crear página</a>
                                </li>
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                       <!-- </li>

                         <li>
                            <a href="#"><i class="fa fa-list-ul fa-fw"></i> Categorias<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="categorias.php">Todas las categorias</a>
                                </li>
                                <li>
                                    <a href="crearCategoria.php">Crear categoria</a>
                                </li>
                                
                                
                            </ul>
                            <!-- /.nav-second-level 
                        </li>-->
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>