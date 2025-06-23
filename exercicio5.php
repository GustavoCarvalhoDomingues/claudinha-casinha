<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padrão de Asteriscos</title>
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
        .pattern {
            font-family: monospace;
            white-space: pre;
            line-height: 1;
            font-size: 18px;
            margin: 15px 0;
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
    </style>
</head>
<body>
    <h1>Gerador de Triângulo de Asteriscos</h1>
    
    <form method="post">
        <label for="linhas">Número de linhas:</label>
        <input type="number" id="linhas" name="linhas" min="1" max="20" required>
        <input type="submit" value="Gerar Padrão">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $linhas = intval($_POST["linhas"]);
        
        if ($linhas < 1 || $linhas > 20) {
            echo "<div class='container'>";
            echo "<p>Por favor, digite um número entre 1 e 20.</p>";
            echo "</div>";
        } else {
            echo "<div class='container'>";
            echo "<h2>Padrão com FOR</h2>";
            echo "<div class='pattern'>";
            
            // Usando FOR
            for ($i = 1; $i <= $linhas; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    echo "*";
                }
                echo "\n";
            }
            
            echo "</div>";
            
            echo "<h2>Padrão com WHILE</h2>";
            echo "<div class='pattern'>";
            
            // Usando WHILE
            $i = 1;
            while ($i <= $linhas) {
                $j = 1;
                while ($j <= $i) {
                    echo "*";
                    $j++;
                }
                echo "\n";
                $i++;
            }
            
            echo "</div>";
            
            echo "<h2>Padrão com DO-WHILE</h2>";
            echo "<div class='pattern'>";
            
            // Usando DO-WHILE
            $i = 1;
            do {
                $j = 1;
                do {
                    echo "*";
                    $j++;
                } while ($j <= $i);
                echo "\n";
                $i++;
            } while ($i <= $linhas);
            
            echo "</div>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>