<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/formularios.css">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de Notas</h1>

    <form action="nota/crear.php" method="post">
        
        <label for="materia">Materia:</label>
        <input type="text" id="materia" name="materia" required><br><br>

        <label for="estudiante">Estudiante:</label>
        <input type="text" id="estudiante" name="estudiante" required><br><br>

        <label for="actividad">Actividad:</label>
        <input type="text" id="actividad" name="actividad" required><br><br>

        <label for="nota">Nota:</label>
        <input type="number" min="0" max="5" step="0.01" id="nota" name="nota" required><br><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="nota/listar.php">Volver</a>
</body>
</html>