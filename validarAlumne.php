<?php
include ("bd.php");

$nia = $_POST["nia"];
$nombre = $_POST["nom"];
$apellidos = $_POST["cognoms"];

$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

$insertar = "INSERT INTO alumne(NIA, NOM, COGNOMS) VALUES ('$nia','$nombre','$apellidos')";
$resultado = mysqli_query($conexion, $insertar);

if($resultado) {
    header("location:alumne.php");
}
else{
    ?>
    <?php
    include("afegirAlumne.php");
    ?>
    <h1 class="bad">No se ha añadido el Usuario</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);