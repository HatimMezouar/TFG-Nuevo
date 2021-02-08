<?php
$conexion = mysqli_connect('localhost', 'root', "", 'tfg');
session_start();
$usuario = $_SESSION['usuario'];
$nombre = $_GET['id'];

$assignatura = "SELECT NOM FROM assignatura WHERE CODI=$nombre; ";

$prv = "SELECT prova.NUM_PROVA, prova.DESCRIPCIO
FROM assignatura, prova
WHERE assignatura.CODI=prova.CODI_ASSIGNATURA AND assignatura.ANY_ACADEMIC=prova.ANY_ACADEMIC AND assignatura.CODI=$nombre";
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
                        <a href="alumne.php?id=<?php echo $nombre;?>"><i class="fa fa-users fa-fw"></i> Alumnos </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Pruebas <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="prova.php?id=<?php echo $nombre;?>">Lista de Pruebas</a>
                            </li>
                            <li>
                                <a href="afegirProva.php?id=<?php echo $nombre;?>">Añadir Pruebas</a>
                            </li>
                        </ul>
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
                    <div class="panel-heading">Lista de pruebas</div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Número de prueba</th>
                                    <th>Descripción</th>
                                    <th>Opción</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $resultadoprueba = mysqli_query($conexion, $prv);
                                while($resultaprv=mysqli_fetch_assoc($resultadoprueba)){?>
                                <tr>
                                    <td><?php echo $resultaprv["NUM_PROVA"] ;?></td>
                                    <td><?php echo $resultaprv["DESCRIPCIO"] ;?></td>
                                    <td> <a href="eliminarProva.php?id=<?php echo $resultaprv["NUM_PROVA"];?>&ids=<?php echo $nombre;?>" >Eliminar </a> </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>

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
