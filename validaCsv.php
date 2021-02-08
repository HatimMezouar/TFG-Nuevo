<?php

$conexion = mysqli_connect('localhost', 'root', "", 'tfg');
$nombre2 = $_GET['id'];

$fileMatricula = $_FILES['fileAlumnes'];
$fileMatricula = file_get_contents($fileMatricula['tmp_name']);
$fileAlumnes = $_FILES['fileAlumnes'];
$fileAlumnes = file_get_contents($fileAlumnes['tmp_name']);

$fileMatricula  = explode("\n", $fileMatricula);
$fileMatricula  = array_filter($fileMatricula );
$fileAlumnes  = explode("\n", $fileAlumnes);
$fileAlumnes  = array_filter($fileAlumnes );

foreach ($fileMatricula as $matricula) {
    $matriculaList[] = explode(",", $matricula);
}

// preparar alumnos (convertirlos en array)
foreach ($fileAlumnes as $alumnes) {
    $alumnesList[] = explode(",", $alumnes);
}

foreach ($matriculaList as $matriculaData) {
    $conexion->query("INSERT INTO matricula
                            (NIA_ALUMNE,
                            CODI_ASSIGNATURA,
                            ANY_ACADEMIC)
                            VALUES
                            ('{$matriculaData[0]}',
                            '$nombre2',
                            '{$matriculaData[3]}')");

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