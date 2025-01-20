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
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container principal */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        /* Título principal */
        .container h2 {
            text-align: center;
            font-size: 32px;
            color: #444;
            margin-bottom: 40px;
        }

        /* Grid de notícias */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Caixa de notícia */
        .news-item {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Título da notícia */
        .news-item h3 {
            font-size: 22px;
            color: #007BFF;
            margin: 0 0 10px;
        }

        .news-item h3:hover {
            text-decoration: underline;
        }

        /* Corpo da notícia */
        .news-item .main {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        /* Botão "View article" */
        .news-item a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .news-item a:hover {
            background-color: #0056b3;
        }

        /* Mensagem de "No News" */
        .no-news {
            text-align: center;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?= esc($title) ?></h2>

        <?php if ($news_list !== []): ?>
            <div class="news-grid">
                <?php foreach ($news_list as $news_item): ?>
                    <div class="news-item">
                        <h3><?= esc($news_item['title']) ?></h3>
                        <div class="main">
                            <?= esc($news_item['body']) ?>
                        </div>
                        <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="no-news">
                <h3>No News</h3>
                <p>Unable to find any news for you.</p>
            </div>
        <?php endif ?>
    </div>
</body>
</html>
