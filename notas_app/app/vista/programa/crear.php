<?php
require_once __DIR__ . '/../../controlador/controlador_programa.php';

use App\Controlador\ProgramaControlador;

$programaControlador = new ProgramaControlador();

$result = empty($_GET["cod"]);
if ($result) {
    $programaControlador->saveNewPrograma($_POST);
    header("Location: ./listar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
</head>
<body>
    <h1>Ocurrió un error al guardar el programa.</h1>
    <br>
    <a href="listar.php">Volver al menú de programas</a>
</body>
</html>