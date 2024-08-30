<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<body>
    <h1>Calculadora Simple</h1>

    <!-- Formulario para ingresar los números y la operación -->
    <form method="post" action="">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" step="any" required>
        <br><br>
        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" step="any" required>
        <br><br>
        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion" required>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $numero1 = isset($_POST['numero1']) ? floatval($_POST['numero1']) : null;
        $numero2 = isset($_POST['numero2']) ? floatval($_POST['numero2']) : null;
        $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : '';

        // Validar que los números y la operación no estén vacíos
        if ($numero1 !== null && $numero2 !== null && $operacion !== '') {
            // Variable para almacenar el resultado
            $resultado = null;

            // Realizar la operación correspondiente
            switch ($operacion) {
                case 'suma':
                    $resultado = $numero1 + $numero2;
                    break;
                case 'resta':
                    $resultado = $numero1 - $numero2;
                    break;
                case 'multiplicacion':
                    $resultado = $numero1 * $numero2;
                    break;
                case 'division':
                    // Verificar si el divisor no es cero
                    if ($numero2 != 0) {
                        $resultado = $numero1 / $numero2;
                    } else {
                        $resultado = 'Error: División por cero';
                    }
                    break;
                default:
                    $resultado = 'Operación no válida';
            }

            // Mostrar el resultado
            echo "<h2>Resultado: " . htmlspecialchars($resultado) . "</h2>";
        } else {
            echo "<h2>Por favor, complete todos los campos.</h2>";
        }
    }
    ?>
</body>
</html>