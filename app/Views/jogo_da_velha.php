<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Velha</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        h2 {
            font-size: 1.5rem;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }
        .tabuleiro {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 10px;
        }
        .celula {
            width: 100px;
            height: 100px;
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            line-height: 100px;
            border: 2px solid #fff;
            background-color: #f0f0f0;
            color: #333;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .celula.vazia {
            background-color: #fff;
        }
        .celula.vazia:hover {
            background-color: #ffe600;
            transform: scale(1.1);
        }
        .celula:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }
        .celula:disabled.x {
            background-color: #ff6b6b;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .celula:disabled.o {
            background-color: #1dd1a1;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        button {
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        button:hover {
            background-color: #3b5998;
            color: #fff;
            transform: translateY(-3px);
        }
        button:active {
            transform: translateY(0);
        }
        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Jogo da Velha</h1>

    <?php if ($vencedor): ?>
        <h2><?= $vencedor === 'Empate' ? 'O jogo empatou!' : "Vencedor: $vencedor 🎉" ?></h2>
    <?php else: ?>
        <h2>Vez do jogador: <?= $jogadorAtual ?></h2>
    <?php endif; ?>

    <div class="tabuleiro">
        <?php foreach ($tabuleiro as $i => $linha): ?>
            <?php foreach ($linha as $j => $celula): ?>
                <form action="/jogo-da-velha/jogar" method="post" style="margin: 0; display: inline;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="linha" value="<?= $i ?>">
                    <input type="hidden" name="coluna" value="<?= $j ?>">
                    <button type="submit" 
                            class="celula <?= $celula === '' ? 'vazia' : ($celula === 'X' ? 'x' : 'o') ?>" 
                            <?= $celula !== '' || $vencedor ? 'disabled' : '' ?>>
                        <?= $celula ?>
                    </button>
                </form>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>

    <br>

    <form action="/jogo-da-velha/reiniciar" method="post">
        <?= csrf_field() ?>
        <button type="submit">🔄 Reiniciar Jogo</button>
    </form>
</body>
</html>
