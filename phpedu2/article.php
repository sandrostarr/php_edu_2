<?php
require __DIR__ . '/autoload.php';

$id = [':id' => $_GET['id']];



if ($_POST) {

    if ($_POST['delete_id']) {
        $id = $_POST['delete_id'];
        \App\Models\Article::delete($id);
        header('Location: /');
    }
    else if ($_POST['edit_id']) {
        $edit_id = $_POST['edit_id'];
        include __DIR__ . '/templates/edit.php';
    }
    else if ($_POST['title']) {
        $article = new \App\Models\Article();

        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        $article->save($_POST['id']);
    }
}

$article = \App\Models\Article::findById($id);

include __DIR__ . '/templates/article.php';
