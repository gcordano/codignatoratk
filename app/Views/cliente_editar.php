<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>

    <?php if (session('error')): ?>
        <p style="color: red;"><?= session('error') ?></p>
    <?php endif; ?>

    <form action="/cliente/editar/<?= esc($cliente['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= esc($cliente['nome'], 'html') ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= esc($cliente['email'], 'html') ?>" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?= esc($cliente['telefone'], 'html') ?>" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?= esc($cliente['endereco'], 'html') ?>" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?= esc($cliente['cpf'], 'html') ?>" required><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>

</body>
</html>
