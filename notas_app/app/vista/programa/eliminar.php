<?php
require_once __DIR__ . '/../../controlador/controlador_programa.php';

use App\Controlador\ProgramaControlador;

$controlador = new ProgramaControlador;

if (isset($_POST['codigo']) && !isset($_POST['confirmado'])) {
    $codigo = $_POST['codigo'];
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Eliminar</title>
    </head>

    <body>
        <h3>¿Seguro que quieres eliminar al programa con código <?= htmlspecialchars($codigo) ?>?</h3>
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
    $resultado = $controlador->deletePrograma($codigo);
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
        <h1>Ocurrió un error al eliminar el programa.</h1>
        <br>
        <a href="listar.php">Volver al menú de programas</a>
    </body>

    </html>
<?php
}
?>