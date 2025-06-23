<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Números Primos</title>
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
        h2 {
            color: #3498db;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
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
        .resultado {
            margin-top: 15px;
            padding: 15px;
            border-radius: 4px;
        }
        .primo {
            color: #27ae60;
            font-weight: bold;
        }
        .nao-primo {
            color: #e74c3c;
            font-weight: bold;
        }
        .lista-primos {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }
        .numero-primo {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
        }
        .metodo {
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <h1>Verificador de Números Primos</h1>
    
    <form method="post">
        <label for="numero">Digite um número inteiro positivo:</label>
        <input type="number" id="numero" name="numero" min="2" required>
        <input type="submit" value="Verificar Primo">
    </form>
    
    <?php
    function ehPrimo($n) {
        if ($n <= 1) return false;
        if ($n == 2) return true;
        if ($n % 2 == 0) return false;
        
        for ($i = 3; $i <= sqrt($n); $i += 2) {
            if ($n % $i == 0) return false;
        }
        return true;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = isset($_POST["numero"]) ? intval($_POST["numero"]) : 0;
        
        if ($numero >= 2) {
            // Verifica se o número é primo
            $primo = ehPrimo($numero);
            
            echo "<div class='container'>";
            echo "<h2>Resultado para o número $numero</h2>";
            echo "<p>O número $numero é <span class='" . ($primo ? "primo" : "nao-primo") . "'>" . 
                 ($primo ? "PRIMO" : "NÃO PRIMO") . "</span></p>";
            
            // Exibe todos os primos até o número informado usando diferentes estruturas
            echo "<div class='metodo'>";
            echo "<h3>Números primos até $numero usando FOR</h3>";
            echo "<div class='lista-primos'>";
            
            // Usando FOR
            for ($i = 2; $i <= $numero; $i++) {
                if (ehPrimo($i)) {
                    echo "<span class='numero-primo'>$i</span>";
                }
            }
            
            echo "</div>";
            echo "</div>";
            
            echo "<div class='metodo'>";
            echo "<h3>Números primos até $numero usando WHILE</h3>";
            echo "<div class='lista-primos'>";
            
            // Usando WHILE
            $i = 2;
            while ($i <= $numero) {
                if (ehPrimo($i)) {
                    echo "<span class='numero-primo'>$i</span>";
                }
                $i++;
            }
            
            echo "</div>";
            echo "</div>";
            
            echo "<div class='metodo'>";
            echo "<h3>Números primos até $numero usando DO-WHILE</h3>";
            echo "<div class='lista-primos'>";
            
            // Usando DO-WHILE
            $i = 2;
            do {
                if (ehPrimo($i)) {
                    echo "<span class='numero-primo'>$i</span>";
                }
                $i++;
            } while ($i <= $numero);
            
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='container'>";
            echo "<p class='nao-primo'>Por favor, digite um número inteiro maior ou igual a 2.</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>