<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Casinha com Sol e Gramado</title>
    <style>
        body {
            background-color: #eef;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 100vh;
            position: relative;
            margin: 0;
            overflow: hidden;
        }

        .sol {
            width: 80px;
            height: 80px;
            background-color: yellow;
            border-radius: 50%;
            position: absolute;
            top: 40px;
            right: 60px;
            box-shadow: 0 0 25px rgba(255, 255, 0, 0.8);
        }

        .gramado {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            background-color: #2ecc71;
            z-index: 0;
        }

        .casa {
            position: relative;
            width: 200px;
            height: 220px;
            z-index: 1;
            margin-bottom: 100px; /* para não sobrepor o gramado */
        }

        .parede {
            width: 100%;
            height: 140px;
            background-color: #fff;
            border: 3px solid #333;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .telhado {
            width: 0;
            height: 0;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
            border-bottom: 80px solid #c0392b;
            position: absolute;
            top: 0;
            left: 0;
        }

        .porta {
            width: 40px;
            height: 60px;
            background-color: #8e5b2d;
            position: absolute;
            bottom: 0;
            left: 80px;
            border: 2px solid #333;
        }

        .janela {
            width: 30px;
            height: 30px;
            background-color: #3498db;
            position: absolute;
            top: 100px;
            left: 20px;
            border: 2px solid #333;
        }

        .janela2 {
            left: auto;
            right: 20px;
        }
    </style>
</head>
<body>

<div class="sol"></div>
<div class="gramado"></div>

<?php
function desenharCasa() {
    echo '
    <div class="casa">
        <div class="telhado"></div>
        <div class="parede"></div>
        <div class="porta"></div>
        <div class="janela"></div>
        <div class="janela janela2"></div>
    </div>';
}

desenharCasa();
?>

</body>
</html>
