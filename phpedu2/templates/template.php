<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body>
<h1>News</h1>
<ul>
<?php foreach ($this->articles as $article) : ?>
        <li>
            <h2><?php echo $article->title; ?></h2>
            <p><?php echo $article->content; ?></p>
            <p><a href="/article.php?id=<?php echo $article->id;?>">Подробнее</a> <span>Автор: <?php echo $article->author->name;?></span></p>
        </li>
<?php endforeach; ?>
</ul>
<?php include __DIR__ . '/edit.php';?>
</body>
</html>