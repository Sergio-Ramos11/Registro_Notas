<?php
require __DIR__ . "/../../controlador/controlador_programa.php";

use App\Controlador\ProgramaControlador;

$programaControlador = new ProgramaControlador();

if (!isset($_GET['cod'])) {
    echo "<script>alert('No se especificó un programa.'); window.location.href='listar.php';</script>";
    exit;
}

$codigo = $_GET['cod'];
$programas = $programaControlador->queryAllProgramas();
$programaSeleccionado = null;

foreach ($programas as $p) {
    if ($p->get('codigo') === $codigo) {
        $programaSeleccionado = $p;
        break;
    }
}

if (!$programaSeleccionado) {
    echo "<script>alert('Programa no encontrado.'); window.location.href='listar.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/formularios.css">
    <title>Editar Programa</title>
</head>
<body>
    <h1>Editar Programa</h1>

    <form action="actualizar.php" method="POST">
        <input type="hidden" name="codigo" value="<?= $programaSeleccionado->get('codigo') ?>">

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="listar.php">Volver al listado</a>
</body>
</html>
