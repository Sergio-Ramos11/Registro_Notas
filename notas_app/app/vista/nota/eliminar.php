<?php
require_once __DIR__ . '/../../controlador/controlador_nota.php';

use App\Controlador\NotaControlador;

$controlador = new NotaControlador();

if (isset($_POST['estudiante'], $_POST['materia']) && !isset($_POST['confirmado'])) {
    $estudiante = $_POST['estudiante'];
    $materia = $_POST['materia'];
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Confirmar Eliminación</title>
    </head>

    <body>
        <h3>¿Seguro que quieres eliminar la nota del estudiante <?= htmlspecialchars($estudiante) ?> en la materia <?= htmlspecialchars($materia) ?>?</h3>

        <form method="post" action="">
            <input type="hidden" name="estudiante" value="<?= htmlspecialchars($estudiante) ?>">
            <input type="hidden" name="materia" value="<?= htmlspecialchars($materia) ?>">
            <input type="hidden" name="confirmado" value="1">
            <button type="submit">Sí, eliminar</button>
        </form>

        <form action="listar.php" method="get">
            <button type="submit">Cancelar</button>
        </form>
    </body>

    </html>
<?php
    exit;
}

if (isset($_POST['estudiante'], $_POST['materia'], $_POST['confirmado'])) {
    $estudiante = $_POST['estudiante'];
    $materia = $_POST['materia'];

    $resultado = $controlador->deleteNota($estudiante, $materia);

    header("Location: listar.php");
    exit;
} else { ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>ERROR</title>
    </head>

    <body>
        <h1>Ocurrió un error al eliminar la nota.</h1>
        <br>
        <a href="listar.php">Volver al menú de notas</a>
    </body>

    </html>
<?php
}
?>