<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada em PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            margin-bottom: 30px;
        }
        h2 {
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="number"] {
            padding: 8px;
            width: 100px;
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
    </style>
</head>
<body>
    <h1>Calculadora de Tabuada</h1>
    
    <form method="post">
        <label for="numero">Digite um número inteiro:</label>
        <input type="number" id="numero" name="numero" required>
        <input type="submit" value="Calcular Tabuada">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = isset($_POST["numero"]) ? intval($_POST["numero"]) : 0;
        
        if ($numero != 0) {
            echo "<div class='container'>";
            echo "<h2>Tabuada do $numero usando FOR</h2>";
            echo "<table>";
            echo "<tr><th>Operação</th><th>Resultado</th></tr>";
            
            // Usando FOR
            for ($i = 1; $i <= 10; $i++) {
                $resultado = $numero * $i;
                echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
            }
            
            echo "</table>";
            echo "</div>";
            
            echo "<div class='container'>";
            echo "<h2>Tabuada do $numero usando WHILE</h2>";
            echo "<table>";
            echo "<tr><th>Operação</th><th>Resultado</th></tr>";
            
            // Usando WHILE
            $i = 1;
            while ($i <= 10) {
                $resultado = $numero * $i;
                echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
                $i++;
            }
            
            echo "</table>";
            echo "</div>";
            
            echo "<div class='container'>";
            echo "<h2>Tabuada do $numero usando DO-WHILE</h2>";
            echo "<table>";
            echo "<tr><th>Operação</th><th>Resultado</th></tr>";
            
            // Usando DO-WHILE
            $i = 1;
            do {
                $resultado = $numero * $i;
                echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
                $i++;
            } while ($i <= 10);
            
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p>Por favor, digite um número válido.</p>";
        }
    }
    ?>
</body>
</html>