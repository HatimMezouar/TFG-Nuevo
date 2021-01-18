<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

$consulta="SELECT*FROM professor where CORREU='$usuario' and CONTRASENYA='$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas) {
    header("location:assignaturas.php");
    }
else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">Error en la autentificacion</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
