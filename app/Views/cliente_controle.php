<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Clientes</title>
</head>
<body>
    <h1>Controle de Clientes</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($clientes) && is_array($clientes)): ?>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= esc($cliente['id']) ?></td>
                        <td><?= esc($cliente['nome']) ?></td>
                        <td><?= esc($cliente['email']) ?></td>
                        <td><?= esc($cliente['telefone']) ?></td>
                        <td><?= esc($cliente['endereco']) ?></td>
                        <td><?= esc($cliente['cpf']) ?></td>
                        <td>
                            <a href="/cliente/editar/<?= esc($cliente['id']) ?>">Editar</a>
                            |
                            <a href="/cliente/excluir/<?= esc($cliente['id']) ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Nenhum cliente cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
