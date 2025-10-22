<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes form</title>
</head>
<body>
    <h1>Hola form estudiantes</h1>

    <form action="estudiante/crear.php" method="post">
        <?php
        if (!empty($_GET["cod"])) {
            echo '<input type="hidden" name="id" value="' . $_GET["cod"] . '">';
        }
        ?>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="programa">Programa:</label>
        <select id="programa" name="programa" required>
            <?php
                $programas = $controlador->obtenerProgramas();
                foreach ($programas as $programa) {
                    echo "<option value='" . $programa['id'] . "'>" . $programa['nombre'] . "</option>";
                }
            ?>
        </select><br><br>

        <input type="submit" value="Guardar">
</body>
</html>