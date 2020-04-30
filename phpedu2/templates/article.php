<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
    <h2><?php echo $article[0]->title; ?></h2>
    <p><?php echo $article[0]->content; ?></p>
    <p>Автор: <?php echo $article[0]->author->name; ?></p>
    <form action="#" name="delete" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $_GET['id']; ?>">
        <button>Удалить</button>
    </form>
    <form action="#" name="edit" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="title" value="<?php echo $article[0]->title; ?>">
        <input type="hidden" name="content" value="<?php echo $article[0]->content; ?>">
        <button>Редактировать</button>
    </form>
</body>
</html>