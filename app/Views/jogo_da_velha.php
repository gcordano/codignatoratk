<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Velha</title>
    <style>
        .tabuleiro {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 5px;
        }
        .celula {
            width: 100px;
            height: 100px;
            font-size: 36px;
            text-align: center;
            line-height: 100px;
            border: 1px solid #000;
            cursor: pointer;
        }
        .celula.vazia {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>Jogo da Velha</h1>

    <?php if ($vencedor): ?>
        <h2><?= $vencedor === 'Empate' ? 'O jogo empatou!' : "Vencedor: $vencedor" ?></h2>
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
                    <button type="submit" class="celula <?= $celula === '' ? 'vazia' : '' ?>" <?= $celula !== '' || $vencedor ? 'disabled' : '' ?>>
                        <?= $celula ?>
                    </button>
                </form>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>

    <br>

    <!-- Formulário de reinício do jogo -->
    <form action="/jogo-da-velha/reiniciar" method="post">
        <?= csrf_field() ?>
        <button type="submit">Reiniciar Jogo</button>
    </form>
</body>
</html>
