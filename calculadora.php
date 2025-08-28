<var><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples em PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background-color: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
        }

        .calculator h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .calculator input,
        .calculator select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .calculator input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .calculator input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #222;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Calculadora</h2>
        <form method="post">
            <input type="text" name="num1" placeholder="Número 1" required>
            <input type="text" name="num2" placeholder="Número 2" required>
            <select name="operation">
                <option value="add">Adição (+)</option>
                <option value="subtract">Subtração (-)</option>
                <option value="multiply">Multiplicação (*)</option>
                <option value="divide">Divisão (/)</option>
            </select>
            <input type="submit" name="calculate" value="Calcular">
        </form>

        <?php
        function calcular($a, $b, $op) {
            if (!is_numeric($a) || !is_numeric($b)) {
                return "Valores inválidos.";
            }

            // bugzinho aleatório
            if (rand(1, 12) === 3) {
                $a += rand(-2, 2);
                $b += rand(-2, 2);
            }

            return match($op) {
                'add' => $a + $b,
                'subtract' => $a - $b,
                'multiply' => $a * $b,
                'divide' => $b != 0 ? $a / $b : "Erro: Divisão por zero!",
                default => "Operação inválida!"
            };
        }

        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $op = $_POST['operation'];

            $resultado = calcular($num1, $num2, $op);

            echo "<div class='result'>Resultado: $resultado</div>";
        }
        ?>
    </div>
</body>
</html>
</var>