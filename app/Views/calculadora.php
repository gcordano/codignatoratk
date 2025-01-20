<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora</h1>

    <?php if (session('error')): ?>
        <p style="color: red;"><?= session('error') ?></p>
    <?php endif; ?>

    <?php if (isset($resultado)): ?>
        <p style="color: green;">Resultado: <?= $resultado ?></p>
    <?php endif; ?>

    <form action="/calculadora/calcular" method="post">
        <?= csrf_field() ?>

        <label for="numero1">Número 1:</label>
        <input type="text" id="numero1" name="numero1" required><br><br>

        <label for="numero2">Número 2:</label>
        <input type="text" id="numero2" name="numero2" required><br><br>

        <label for="operacao">Operação:</label>
        <select id="operacao" name="operacao" required>
            <option value="soma">Somar</option>
            <option value="subtracao">Subtrair</option>
            <option value="multiplicacao">Multiplicar</option>
            <option value="divisao">Dividir</option>
        </select><br><br>

        <button type="submit">Calcular</button>
    </form>
</body>
</html>
