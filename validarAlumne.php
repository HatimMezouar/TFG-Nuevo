<?php

$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

$nia = $_POST["nia"];
$nombre = $_POST["nom"];
$apellidos = $_POST["cognoms"];
$anos = $_POST["ano"];
$nombre2 = $_GET['id'];

$insertar = "INSERT INTO alumne(NIA, NOM, COGNOMS) VALUES ('$nia','$nombre','$apellidos')";
$resultado = mysqli_query($conexion, $insertar);

$insertar2 = "INSERT INTO matricula(NIA_ALUMNE, CODI_ASSIGNATURA, ANY_ACADEMIC) VALUES ('$nia','$nombre2','$anos')";
$resultado2 = mysqli_query($conexion, $insertar2);
if($resultado2) {
    header("location:alumne.php?id=$nombre2");
}
else{
    ?>
    <?php
    include("afegirAlumne.php?id=$nombre2");
    ?>
    <h1 class="bad">No se ha añadido el Usuario</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_free_result($resultado2);
mysqli_close($conexion);

