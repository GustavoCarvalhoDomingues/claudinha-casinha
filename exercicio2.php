<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Pares entre Intervalo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            margin-bottom: 30px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
        h2 {
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .resultado {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        .numero {
            background-color: #e0f7fa;
            padding: 5px 10px;
            border-radius: 3px;
        }
        form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"] {
            padding: 8px;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .aviso {
            color: #f44336;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Números Pares entre Dois Números</h1>
    
    <form method="post">
        <label for="numero1">Primeiro número:</label>
        <input type="number" id="numero1" name="numero1" required>
        
        <label for="numero2">Segundo número:</label>
        <input type="number" id="numero2" name="numero2" required>
        
        <input type="submit" value="Mostrar Números Pares">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = intval($_POST["numero1"]);
        $numero2 = intval($_POST["numero2"]);
        
        // Determina o menor e maior número
        $inicio = min($numero1, $numero2);
        $fim = max($numero1, $numero2);
        
        echo "<div class='container'>";
        echo "<h2>Números pares entre $inicio e $fim usando FOR</h2>";
        echo "<div class='resultado'>";
        
        // Usando FOR
        for ($i = $inicio; $i <= $fim; $i++) {
            if ($i % 2 == 0) {
                echo "<span class='numero'>$i</span>";
            }
        }
        
        echo "</div>";
        echo "</div>";
        
        echo "<div class='container'>";
        echo "<h2>Números pares entre $inicio e $fim usando WHILE</h2>";
        echo "<div class='resultado'>";
        
        // Usando WHILE
        $i = $inicio;
        while ($i <= $fim) {
            if ($i % 2 == 0) {
                echo "<span class='numero'>$i</span>";
            }
            $i++;
        }
        
        echo "</div>";
        echo "</div>";
        
        echo "<div class='container'>";
        echo "<h2>Números pares entre $inicio e $fim usando DO-WHILE</h2>";
        echo "<div class='resultado'>";
        
        // Usando DO-WHILE
        $i = $inicio;
        do {
            if ($i % 2 == 0) {
                echo "<span class='numero'>$i</span>";
            }
            $i++;
        } while ($i <= $fim);
        
        echo "</div>";
        echo "</div>";
    }
    ?>
</body>
</html>