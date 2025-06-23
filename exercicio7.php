<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Média de Notas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
            padding: 8px;
            margin: 5px 0;
        }
        .result {
            background-color: #e8f8f5;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .method {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Média</h1>
        
        <form method="post">
            <label for="qtd_notas">Quantidade de notas:</label>
            <input type="number" id="qtd_notas" name="qtd_notas" min="1" required>
            <button type="submit">Continuar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["notas"])) {
            $qtd_notas = intval($_POST["qtd_notas"]);
            
            if ($qtd_notas < 1) {
                echo '<p class="error">Digite um número válido de notas (maior que 0)</p>';
            } else {
                echo '<form method="post">';
                echo '<input type="hidden" name="qtd_notas" value="'.$qtd_notas.'">';
                
                for ($i = 1; $i <= $qtd_notas; $i++) {
                    echo '<label for="nota'.$i.'">Nota '.$i.':</label>';
                    echo '<input type="number" id="nota'.$i.'" name="notas[]" step="0.1" min="0" max="10" required><br>';
                }
                
                echo '<button type="submit">Calcular Média</button>';
                echo '</form>';
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["notas"])) {
            $qtd_notas = intval($_POST["qtd_notas"]);
            $notas = $_POST["notas"];
            
            // Validar notas
            $validas = true;
            foreach ($notas as &$nota) {
                $nota = floatval(str_replace(',', '.', $nota));
                if ($nota < 0 || $nota > 10) {
                    $validas = false;
                    break;
                }
            }
            
            if (!$validas) {
                echo '<p class="error">Todas as notas devem estar entre 0 e 10</p>';
            } else {
                echo '<div class="result">';
                echo '<h3>Notas informadas:</h3>';
                echo '<p>'.implode(', ', $notas).'</p>';
                
                // Cálculo com FOR
                echo '<div class="method">';
                echo '<h4>Usando FOR:</h4>';
                $soma_for = 0;
                for ($i = 0; $i < $qtd_notas; $i++) {
                    $soma_for += $notas[$i];
                }
                $media_for = $soma_for / $qtd_notas;
                echo '<p>Soma: '.$soma_for.'</p>';
                echo '<p>Média: '.number_format($media_for, 2).'</p>';
                echo '</div>';
                
                // Cálculo com WHILE
                echo '<div class="method">';
                echo '<h4>Usando WHILE:</h4>';
                $soma_while = 0;
                $i = 0;
                while ($i < $qtd_notas) {
                    $soma_while += $notas[$i];
                    $i++;
                }
                $media_while = $soma_while / $qtd_notas;
                echo '<p>Soma: '.$soma_while.'</p>';
                echo '<p>Média: '.number_format($media_while, 2).'</p>';
                echo '</div>';
                
                // Cálculo com DO-WHILE
                echo '<div class="method">';
                echo '<h4>Usando DO-WHILE:</h4>';
                $soma_dowhile = 0;
                $i = 0;
                if ($qtd_notas > 0) {
                    do {
                        $soma_dowhile += $notas[$i];
                        $i++;
                    } while ($i < $qtd_notas);
                }
                $media_dowhile = $soma_dowhile / $qtd_notas;
                echo '<p>Soma: '.$soma_dowhile.'</p>';
                echo '<p>Média: '.number_format($media_dowhile, 2).'</p>';
                echo '</div>';
                
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>