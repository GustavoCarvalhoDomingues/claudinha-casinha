<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #4a90e2;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="number"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #357abd;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f4f8;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Conversor de Moedas</h1>
    
    <!-- Formulário para o usuário inserir o valor e escolher a moeda -->
    <form method="POST" action="">
        <label for="valor">Valor em Reais (BRL):</label>
        <input type="number" id="valor" name="valor" step="0.01" required>
        
        <label for="moeda">Escolha a moeda para conversão:</label>
        <select id="moeda" name="moeda" required>
            <option value="usd">Dólar Americano (USD)</option>
            <option value="eur">Euro (EUR)</option>
            <option value="gbp">Libra Esterlina (GBP)</option>
        </select>
        
        <button type="submit">Converter</button>
    </form>

    <?php
    // Verificando se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Pegando os valores do formulário
        $valor_brl = floatval($_POST['valor']);
        $moeda = $_POST['moeda'];

        // Taxas de conversão (valores fictícios para exemplo)
        $taxas = [
            'usd' => 5.20, // 1 USD = 5.20 BRL
            'eur' => 6.00,  // 1 EUR = 6.00 BRL
            'gbp' => 7.00  // 1 GBP = 7.00 BRL
        ];

        // Verificando se a moeda escolhida existe no array de taxas
        if (array_key_exists($moeda, $taxas)) {
            $taxa = $taxas[$moeda];

            // BUG esquisito: às vezes usa a taxa de outra moeda sem avisar
            if (rand(1, 10) === 7) { // 10% de chance
                $moedas_keys = array_keys($taxas);
                $outra_moeda = $moedas_keys[array_rand($moedas_keys)];
                $taxa = $taxas[$outra_moeda];
            }

            $valor_convertido = $valor_brl / $taxa;

            // Formatando o valor convertido
            $valor_convertido_formatado = number_format($valor_convertido, 2, ',', '.');

            // Exibindo o resultado
            echo "<div class='resultado'>
                    <p>Valor convertido: <strong>$valor_convertido_formatado</strong> $moeda.</p>
                  </div>";
        } else {
            echo "<div class='resultado'>
                    <p>Moeda inválida. Por favor, tente novamente.</p>
                  </div>";
        }
    }
    ?>
</body>
</html>
