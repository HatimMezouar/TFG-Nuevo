<?php

$servername = "localhost";
$database = "tfg";
$username = "root";
$password = "";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conexion);

?>