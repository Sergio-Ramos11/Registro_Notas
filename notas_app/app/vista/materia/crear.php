<?php
require_once __DIR__ . '/../../controlador/controlador_materia.php';

use App\Controlador\MateriaControlador;

$materiaControlador = new MateriaControlador();

$result = empty($_GET["cod"]);

if ($result) {
    $materiaControlador->saveNewMateria($_POST);
    header("Location: ./listar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ERROR</title>
</head>
<body>
    <h1>Error al guardar la materia</h1>
    <a href="listar.php">Volver al menú de materias</a>
</body>
</html>