<?php
$conexion = mysqli_connect('localhost', 'root', "", 'tfg');
session_start();
$usuario = $_SESSION['usuario'];
$nombre = $_GET['id'];

$nombre = $_GET['id'];

$assignatura = "SELECT NOM FROM assignatura WHERE CODI=$nombre; ";


$alum = "SELECT alumne.NOM, alumne.COGNOMS, alumne.NIA
            FROM alumne, assignatura, matricula
            WHERE assignatura.CODI=matricula.CODI_ASSIGNATURA AND assignatura.ANY_ACADEMIC=matricula.ANY_ACADEMIC 
            AND matricula.NIA_ALUMNE=alumne.NIA AND assignatura.CODI=$nombre; ";


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exams UAB</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="assignaturas.php">Exams UAB</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $usuario ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li class="divider"></li>
                    <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="assignatura.php?id=<?php echo $nombre;?>"><i class="fa fa-dashboard fa-fw"></i> Home </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Alumnos <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="alumne.php?id=<?php echo $nombre;?>">Lista de Alumnos</a>
                            </li>
                            <li>
                                <a href="afegirAlumne.php?id=<?php echo $nombre;?>">Añadir Alumnos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="prova.php?id=<?php echo $nombre;?>"><i class="fa fa-book fa-fw"></i> Pruebas </a>
                    </li>
                    <li>
                        <a href="estadistica.php?id=<?php echo $nombre;?>"><i class="fa fa-bar-chart-o fa-fw"></i> Estadística </a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <?php $resultado = mysqli_query($conexion, $assignatura);
    $row=mysqli_fetch_assoc($resultado);?>
        <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header"><?php echo $row["NOM"];?></h1>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Alumnos</div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>NIA</th>
                                    <th>Opción</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $resultadoalumne = mysqli_query($conexion, $alum);
                                while($resul=mysqli_fetch_assoc($resultadoalumne)){?>
                                <tr>
                                    <td><?php echo $resul["NOM"] ;?></td>
                                    <td><?php echo $resul["COGNOMS"] ;?></td>
                                    <td><?php echo $resul["NIA"] ;?></td>
                                    <td> <a href="eliminarAlumne.php?id=<?php echo $resul["NIA"];?>&ids=<?php echo $nombre;?>" >Eliminar </a> </td>
                                </tr>

                                </tbody>
                                <?php
                                } mysqli_free_result($resultadoalumne);
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>


                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>

</body>
</html>
