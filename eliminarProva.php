<?php
$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

$nombre = $_GET['id'];
$curso2 = $_GET['ids'];

$eliminar = "DELETE FROM prova WHERE NUM_PROVA='$nombre'";
$resultado = mysqli_query($conexion, $eliminar);

if($resultado) {
    header("location:prova.php?id=$curso2");
}
else{
    ?>
    <?php
    include("prova.php?id=$curso2");
    ?>
    <h1 class="bad">No se ha añadido el Usuario</h1>
    <?php
}
mysqli_free_result($resultado);

mysqli_close($conexion);