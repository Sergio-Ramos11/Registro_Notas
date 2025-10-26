<?php
require __DIR__ . "/../../controlador/controlador_nota.php";

use App\Controlador\NotaControlador;

$notaControlador = new NotaControlador();

if (!empty($_GET['estudiante']) && !empty($_GET['materia']) && !empty($_GET['actividad'])) {

    $estudiante = $_GET['estudiante'];
    $materia = $_GET['materia'];
    $actividad = $_GET['actividad'];

    $notas = $notaControlador->queryAllNotas();
    $notaSeleccionada = null;

    foreach ($notas as $nota) {
        if (
            $nota->get('estudiante') === $estudiante &&
            $nota->get('materia') === $materia &&
            $nota->get('actividad') === $actividad
        ) {
            $notaSeleccionada = $nota;
            break;
        }
    }

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../public/css/formularios.css">
        <title>Editar Nota</title>
    </head>

    <body>
        <h1>Editar Nota</h1>

        <form action="actualizar.php" method="POST">
            <input type="hidden" name="estudiante" value="<?= $notaSeleccionada->get('estudiante') ?>">
            <input type="hidden" name="materia" value="<?= $notaSeleccionada->get('materia') ?>">
            <input type="hidden" name="actividad" value="<?= $notaSeleccionada->get('actividad') ?>">

            <label for="nota">Nota:</label><br>
            <input type="number" min="0" max="5" step="0.01" id="nota" name="nota" value="<?= $notaSeleccionada->get('nota') ?>" required><br><br>

            <button type="submit">Actualizar</button>
        </form>

        <br>
        <a href="listar.php">Volver al listado</a>
    </body>

    </html>

<?php
    exit;
} else {
    echo "<script>alert('Faltan parámetros para editar la nota.'); window.location.href='listar.php';</script>";
}
?>
