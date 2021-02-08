<?php

$conexion = mysqli_connect('localhost', 'root', "", 'tfg');

$nombre5= $_POST['id'];

$fileMatricula = $_FILES['filealumnes'];
$fileAlumnes1 = file_get_contents($fileMatricula['tmp_name']);
$fileAlumnes = $_FILES['filealumnes'];
$fileAlumnes = file_get_contents($fileAlumnes['tmp_name']);



$fileAlumnes  = explode("\n", $fileAlumnes);
$fileAlumnes  = array_filter($fileAlumnes );
$fileMatricula  = explode("\n", $fileMatricula);
$fileMatricula  = array_filter($fileMatricula );

// preparar alumnos (convertirlos en array)
foreach ($fileAlumnes as $alumnes) {
    $alumnesList[] = explode(",", $alumnes);
}

// insertar alumnos
foreach ($alumnesList as $alumneData) {
    $sql1= $conexion->query("INSERT INTO alumne 
						(NIA,
						 NOM,
						 COGNOMS)
						 VALUES

						 ('{$alumneData[0]}',
						  '{$alumneData[1]}', 
						  '{$alumneData[2]}')");
    $insertar2 = "INSERT INTO matricula(NIA_ALUMNE, CODI_ASSIGNATURA, ANY_ACADEMIC) VALUES ('{$alumneData[0]}','$nombre5','{$alumneData[3]}')";
    $resultado2 = mysqli_query($conexion, $insertar2);
}




?>