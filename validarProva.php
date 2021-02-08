<?php

$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

$numero = $_POST["num"];
$descripcion = $_POST["desc"];
$anos = $_POST["ano"];
$nota = $_POST["nota"];
$nombre = $_GET['id'];

$insertar = "INSERT INTO prova(CODI_ASSIGNATURA, ANY_ACADEMIC, NUM_PROVA, DESCRIPCIO, NOTA_MAXIMA) VALUES ('$nombre','$anos','$numero','$descripcion','$nota')";
$resultado = mysqli_query($conexion, $insertar);

if($resultado) {
    header("location:prova.php?id=$nombre");
}
else{
    ?>
    <?php
    include("afegirProva.php?id=$nombre");
    ?>
    <h1 class="bad">No se ha añadido el Usuario</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
