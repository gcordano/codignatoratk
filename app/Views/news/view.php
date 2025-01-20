<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        /* Estilo Geral */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Container Principal */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        /* Grid de Notícias */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        /* Caixa Individual de Notícia */
        .news-box {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .news-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Título da Notícia */
        .news-box h2 {
            font-size: 22px;
            margin: 0 0 10px;
            color: #007BFF;
        }

        .news-box h2:hover {
            text-decoration: underline;
        }

        /* Texto da Notícia */
        .news-box p {
            margin: 10px 0 20px;
            font-size: 16px;
            color: #555;
        }

        /* Botão Ler Mais */
        .news-box a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .news-box a:hover {
            background-color: #0056b3;
        }

        /* Título Principal */
        .container h1 {
            text-align: center;
            color: #444;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= esc($title) ?></h1>

        <!-- Grid de Notícias -->
        <div class="news-grid">
            <?php foreach ($news as $item): ?>
                <div class="news-box">
                    <h2><?= esc($item['title']) ?></h2>
                    <p><?= esc($item['body']) ?></p>
                    <a href="/news/<?= esc($item['slug']) ?>">Ler Mais</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
