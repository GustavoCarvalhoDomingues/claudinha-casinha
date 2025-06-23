<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples em PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .calculator h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .calculator input,
        .calculator select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .calculator input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        .calculator input[type="submit"]:hover {
            background-color: #218838;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
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
