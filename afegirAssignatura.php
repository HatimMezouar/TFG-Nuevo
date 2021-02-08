<?php
$conexion = mysqli_connect('localhost', 'root', "", 'tfg');
session_start();
$usuario = $_SESSION['usuario'];
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
                        <a href="assignaturas.php"><i class="fa fa-dashboard fa-fw"></i> Cursos </a>
                    </li>
                    <li>
                    <li>
                        <a href="afegirAssignatura.php">Añadir Assignatura</a>
                    </li>

                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Cursos</h1>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Añadir Curso</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="validarAssignatura.php" method="post">
                                    <p>Codi <input type="number" placeholder="" name="codi"> </p>
                                    <p>Any Academic <input type="text" placeholder="" name="any"> </p>
                                    <p>Nom <input type="text" placeholder="" name="nom"> </p>
                                    <p>Curs <input type="text" placeholder="" name="curs"> </p>
                                    <p>Semestre <input type="text" placeholder="" name="semestre"> </p>
                                    <p>Número Credits <input type="number" placeholder="" name="numCredits"> </p>
                                    <p>Creditos Teoria <input type="number" placeholder="" name="creditsTeoria"> </p>
                                    <p>Creditos Problemas <input type="number" placeholder="" name="creditsProblemas"> </p>
                                    <p>Creditos Prácticas <input type="number" placeholder="" name="creditsPracticas"> </p>
                                    <p>Numero de Grups <input type="number" placeholder="" name="numGrups"> </p>
                                    <input type="submit" value="Añadir">
                                </form>
                            </div>

                        </div>
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
