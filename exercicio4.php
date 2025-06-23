<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Números</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        input, button {
            padding: 8px;
            margin: 5px 0;
        }
        .result {
            background-color: #e9ffe9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .method {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #ccc;
        }
    </style>
</head>
<body>
    <h1>Calculadora de Soma</h1>
    
    <form method="post">
        <label for="count">Quantidade de números:</label>
        <input type="number" id="count" name="count" min="1" required>
        
        <label for="numbers">Números (separados por vírgula):</label>
        <input type="text" id="numbers" name="numbers" placeholder="Ex: 5, 10, 15" required>
        
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $count = intval($_POST["count"]);
        $numbersInput = $_POST["numbers"];
        
        // Limpa e converte a string de números em array
        $numbers = array_map('floatval', array_map('trim', explode(',', $numbersInput)));
        
        // Verifica se a quantidade informada bate com os números fornecidos
        if (count($numbers) != $count) {
            echo "<div class='error'>Você deve informar exatamente $count números.</div>";
        } else {
            echo "<div class='result'>";
            echo "<h2>Resultados para $count números</h2>";
            
            // Soma com FOR
            $sumFor = 0;
            for ($i = 0; $i < $count; $i++) {
                $sumFor += $numbers[$i];
            }
            echo "<div class='method'>";
            echo "<h3>Usando FOR:</h3>";
            echo "<p>Soma = $sumFor</p>";
            echo "</div>";
            
            // Soma com WHILE
            $sumWhile = 0;
            $i = 0;
            while ($i < $count) {
                $sumWhile += $numbers[$i];
                $i++;
            }
            echo "<div class='method'>";
            echo "<h3>Usando WHILE:</h3>";
            echo "<p>Soma = $sumWhile</p>";
            echo "</div>";
            
            // Soma com DO-WHILE
            $sumDoWhile = 0;
            $i = 0;
            if ($count > 0) {
                do {
                    $sumDoWhile += $numbers[$i];
                    $i++;
                } while ($i < $count);
            }
            echo "<div class='method'>";
            echo "<h3>Usando DO-WHILE:</h3>";
            echo "<p>Soma = $sumDoWhile</p>";
            echo "</div>";
            
            echo "</div>";
        }
    }
    ?>
</body>
</html>