<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
</head>
<body>
<h2>Login</h2>

<!-- Exibe mensagem de erro -->
<?php if ($session->getFlashdata('error')): ?>
<p style="color: red;"><?php echo $session->getFlashdata('error'); ?></p>
<?php endif; ?>

<form action="<?php echo site_url('login/authenticate'); ?>" method="post">
<?= csrf_field() ?>
<label for="username">Usuário:</label>
<input type="text" name="username" id="username" required>
<br>
<label for="password">Senha:</label>
<input type="password" name="password" id="password" required>
<br>
<button type="submit">Entrar</button>
</form>
</body>
</html>