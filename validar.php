<?php
$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

session_start();

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$consulta="SELECT*FROM professor where CORREU='$usuario' and CONTRASENYA='$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas) {

    $_SESSION['usuario']=$usuario;
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
