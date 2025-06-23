<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sequência de Fibonacci</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
        }
        .container {
            margin-bottom: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #2c3e50;
        }
        input[type="number"] {
            padding: 10px;
            width: 150px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #27ae60;
        }
        .fibonacci {
            font-family: monospace;
            font-size: 18px;
            margin: 15px 0;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            white-space: pre-wrap;
        }
        .method {
            margin-top: 25px;
            padding: 15px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        h2 {
            color: #3498db;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Sequência de Fibonacci</h1>
    
    <form method="post">
        <label for="limite">Digite um número limite para a sequência:</label>
        <input type="number" id="limite" name="limite" min="1" required>
        <input type="submit" value="Gerar Sequência">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $limite = intval($_POST["limite"]);
        
        if ($limite < 1) {
            echo "<div class='error'>Por favor, digite um número positivo maior que zero.</div>";
        } else {
            echo "<div class='container'>";
            
            // Sequência com FOR
            echo "<div class='method'>";
            echo "<h2>Usando FOR</h2>";
            echo "<div class='fibonacci'>";
            $a = 0;
            $b = 1;
            echo "$a, $b";
            for ($i = 2; $a + $b <= $limite; $i++) {
                $c = $a + $b;
                echo ", $c";
                $a = $b;
                $b = $c;
            }
            echo "</div>";
            echo "</div>";
            
            // Sequência com WHILE
            echo "<div class='method'>";
            echo "<h2>Usando WHILE</h2>";
            echo "<div class='fibonacci'>";
            $a = 0;
            $b = 1;
            echo "$a, $b";
            while ($a + $b <= $limite) {
                $c = $a + $b;
                echo ", $c";
                $a = $b;
                $b = $c;
            }
            echo "</div>";
            echo "</div>";
            
            // Sequência com DO-WHILE
            echo "<div class='method'>";
            echo "<h2>Usando DO-WHILE</h2>";
            echo "<div class='fibonacci'>";
            $a = 0;
            $b = 1;
            echo "$a, $b";
            if ($a + $b <= $limite) {
                do {
                    $c = $a + $b;
                    echo ", $c";
                    $a = $b;
                    $b = $c;
                } while ($a + $b <= $limite);
            }
            echo "</div>";
            echo "</div>";
            
            echo "</div>";
        }
    }
    ?>
</body>
</html>