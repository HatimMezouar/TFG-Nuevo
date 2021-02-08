<?php
$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

session_start();
$usuario = $_SESSION['usuario'];

$codi = $_POST["codi"];
$anyAcademic = $_POST["any"];
$nom = $_POST["nom"];
$curs = $_POST["curs"];
$semestre = $_POST["semestre"];
$credits = $_POST["numCredits"];
$teoria = $_POST["creditsTeoria"];
$problemes = $_POST["creditsProblemas"];
$practiques = $_POST["creditsPracticas"];
$grups = $_POST["numGrups"];

$inserta = "INSERT INTO assignatura(CODI, ANY_ACADEMIC, NOM, CURS, SEMESTRE, NOMBRE_CREDITS, Credits_TEORIA, Credits_PROBLEMES, Credits_PRACTIQUES, NUM_GRUPS) 
VALUES ('$codi','$anyAcademic','$nom','$curs','$semestre','$credits','$teoria','$problemes','$practiques','$grups')";
$result = mysqli_query($conexion, $inserta);

if($result) {
    header("location:assignaturas.php");
}
else{
    ?>
    <?php
    include("afegirAssignatura.php");
    ?>
    <h1 class="bad">No se ha añadido el Usuario</h1>
    <?php
}
mysqli_free_result($result);
mysqli_close($conexion);
