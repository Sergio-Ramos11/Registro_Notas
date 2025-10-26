<?php
require __DIR__ . "/../../controlador/controlador_materia.php";

use App\Controlador\MateriaControlador;

$materiaControlador = new MateriaControlador();

$codigo = $_GET['cod'];
$materias = $materiaControlador->queryAllMaterias();
$materiaSeleccionada = null;

foreach ($materias as $materia) {
    if ($materia->get('codigo') === $codigo) {
        $materiaSeleccionada = $materia;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/formularios.css">
    <title>Editar Materia</title>
</head>
<body>
    <h1>Editar Materia</h1>
    <form action="actualizar.php" method="POST">
        <input type="hidden" name="codigo" value="<?php echo $materiaSeleccionada->get('codigo'); ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Programa:</label><br>
        <input type="text" name="programa" required><br><br>

        <button type="submit">Actualizar Materia</button>
    </form>

    <br>
    <a href="listar.php">Volver al listado</a>
</body>
</html>
