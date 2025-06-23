<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem Regressiva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
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
        .countdown {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
            margin: 10px 0;
            padding: 10px;
            background-color: #fdedec;
            border-radius: 5px;
            text-align: center;
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
    <h1>Contagem Regressiva</h1>
    
    <form method="post">
        <label for="numero">Digite um número inteiro positivo:</label>
        <input type="number" id="numero" name="numero" min="1" required>
        <input type="submit" value="Iniciar Contagem">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = intval($_POST["numero"]);
        
        if ($numero < 1) {
            echo "<div class='container'>";
            echo "<p>Por favor, digite um número positivo maior que zero.</p>";
            echo "</div>";
        } else {
            echo "<div class='container'>";
            
            // Contagem regressiva com FOR
            echo "<div class='method'>";
            echo "<h2>Contagem com FOR</h2>";
            for ($i = $numero; $i >= 0; $i--) {
                echo "<div class='countdown'>$i</div>";
            }
            echo "</div>";
            
            // Contagem regressiva com WHILE
            echo "<div class='method'>";
            echo "<h2>Contagem com WHILE</h2>";
            $i = $numero;
            while ($i >= 0) {
                echo "<div class='countdown'>$i</div>";
                $i--;
            }
            echo "</div>";
            
            // Contagem regressiva com DO-WHILE
            echo "<div class='method'>";
            echo "<h2>Contagem com DO-WHILE</h2>";
            $i = $numero;
            do {
                echo "<div class='countdown'>$i</div>";
                $i--;
            } while ($i >= 0);
            echo "</div>";
            
            echo "</div>";
        }
    }
    ?>
</body>
</html>