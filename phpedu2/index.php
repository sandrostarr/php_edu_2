<?php

require __DIR__ . '/autoload.php';

$db = new \App\Db();
$view = new \App\View();

//$data = \App\Models\Article::findAll('DESC');


//$data = \App\Models\Article::getLastThree();

$view->articles = App\Models\Article::findAll('DESC');


if ($_POST) {
    $article = new \App\Models\Article();

    $article->title = $_POST['title'];
   // $article->content = $_POST['content'];

    $res = $article->save();
    if($res) {
        echo 'Новость опубликована!';
    } else {
        echo 'Ошибка!';
    }
}



$view->display(__DIR__ . '/templates/template.php');
//include __DIR__ . '/templates/template.php';


echo count($view);