<?php
require_once __DIR__ . '/../../controlador/controlador_estudiante.php';
require_once __DIR__ . '/../../modelo/estudiante.php';
require_once __DIR__ . '/../../modelo/databases/db.php';
require_once __DIR__ . '/../../modelo/modelo_sql/sql_estudiantes.php';

use App\Controlador\EstudiantesControlador;
use App\Modelo\Databases\DB;
use App\Modelo\SQLmodelo\SQLEstudiante;

$controlador = new EstudiantesControlador();
$db = new DB();

if (isset($_GET['cod'])) {
    $codigo = $_GET['cod'];

    $sql = SQLEstudiante::getByCodigo();
    $res = $db->execSQL($sql, true, "s", $codigo);
    $estudiante = $res->fetch_assoc();
    if (!$estudiante) {
        $db->close();
        echo "<script>alert('Estudiante no encontrado'); window.location.href='listar.php';</script>";
        exit;
    }

    $sqlProg = "SELECT codigo, nombre FROM programas";
    $progsRes = $db->execSQL($sqlProg, true);
    $programas = [];
    if ($progsRes && $progsRes->num_rows > 0) {
        while ($r = $progsRes->fetch_assoc()) {
            $programas[] = $r;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $controlador->updateEstudiante($_POST);
    $db->close();
    if (!$resultado) {
        header("Location: ./listar.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/formularios.css">
    <title>Editar Estudiante</title>
</head>
<body>
    <h1>Editar Estudiante</h1>

    <form method="POST" action="editar.php">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($estudiante['codigo']); ?>" readonly><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="programa">Programa:</label>
        <select id="programa" name="programa" required>
            <option value="">-- Seleccione un programa --</option>
            <?php foreach ($programas as $p): ?>
                <option value="<?php echo htmlspecialchars($p['codigo']); ?>"
                    <?php echo ($p['codigo'] === $estudiante['programa']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($p['nombre'] . ' (' . $p['codigo'] . ')'); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Actualizar</button>
        <a href="listar.php">Cancelar</a>
    </form>
</body>
</html>
