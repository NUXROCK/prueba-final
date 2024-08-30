<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"], select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora Simple</h1>
        <form method="post" action="">
            <label for="numero1">Número 1:</label>
            <input type="number" id="numero1" name="numero1" step="any" required>
            
            <label for="numero2">Número 2:</label>
            <input type="number" id="numero2" name="numero2" step="any" required>
            
            <label for="operacion">Operación:</label>
            <select id="operacion" name="operacion" required>
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select>
            
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
                echo "<div class='result'><h2>Resultado: " . htmlspecialchars($resultado) . "</h2></div>";
            } else {
                echo "<div class='result'><h2>Por favor, complete todos los campos.</h2></div>";
            }
        }
        ?>
    </div>
</body>
</html>