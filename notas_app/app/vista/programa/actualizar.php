<?php
require __DIR__ . "/../../controlador/controlador_programa.php";

use App\Controlador\ProgramaControlador;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new ProgramaControlador();

    $resultado = $controlador->updatePrograma($_POST);

    if ($resultado) {
        header("Location: listar.php");
        exit;
    }
}
?>
