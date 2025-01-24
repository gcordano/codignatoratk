<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
</head>
<body>
<h2>Bem-vindo, <?= session()->get('username'); ?>!</h2>
<p>Você está logado no sistema.</p>
<a href="<?= site_url('login/logout'); ?>">Sair</a>
</body>
</html>