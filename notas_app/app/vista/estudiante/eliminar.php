<?php
require_once __DIR__ . '/../../controlador/controlador_estudiante.php';
use App\Controlador\EstudiantesControlador;

$controlador = new EstudiantesControlador();

if (isset($_POST['codigo']) && !isset($_POST['confirmado'])) {
    $codigo = $_POST['codigo'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Confirmar eliminación</title>
    </head>
    <body>
        <h3>¿Seguro que quieres eliminar al estudiante con código <?= htmlspecialchars($codigo) ?>?</h3>
        <form method="post">
            <input type="hidden" name="codigo" value="<?= htmlspecialchars($codigo) ?>">
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


if (isset($_POST['codigo']) && isset($_POST['confirmado'])) {
    $codigo = $_POST['codigo'];
    $resultado = $controlador->deleteEstudiante($codigo);
    header("Location: listar.php");
    exit;
}else {?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>ERROR</title>
    </head>
    <body>
        <h1>Ocurrió un error al eliminar el estudiante.</h1>
        <br>
        <a href="listar.php">Volver al menú de estudiantes</a>
    </body>
    </html>
    <?php
}
?>
