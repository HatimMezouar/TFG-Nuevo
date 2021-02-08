<?php

$conexion = mysqli_connect('localhost', 'root', "", 'tfg');
$nombre2 = $_GET['id'];


$fileAlumnes = $_FILES['fileAlumnes'];
$fileAlumnes = file_get_contents($fileAlumnes['tmp_name']);


$fileAlumnes  = explode("\n", $fileAlumnes);
$fileAlumnes  = array_filter($fileAlumnes );



// preparar alumnos (convertirlos en array)
foreach ($fileAlumnes as $alumnes) {
    $alumnesList[] = explode(",", $alumnes);
}


// insertar alumnos
foreach ($alumnesList as $alumnesData) {
    $conexion->query("INSERT INTO alumne
						(NIA,
						 NOM,
						 COGNOMS)
						 VALUES
						 ('{$alumnesData[0]}',
						  '{$alumnesData[1]}', 
						  '{$alumnesData[2]}')");

}


?>