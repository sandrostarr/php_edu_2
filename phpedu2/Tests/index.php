<?php
require __DIR__ . '/../autoload.php';

$user = new \App\Models\User();
//$sql = 'INSERT INTO users (email, name) VALUES (:email, :name)';
$sql = 'UPDATE users SET email = :email, name = :name WHERE id = :id';
$data = [':id' => '6',
    ':email' => '22221',
    ':name' => '333332'];

//$res = $user->insertRecord($sql, $data);
//$res = \App\Models\User::modify($sql, $data);



$id = [':id' => '8'];


//$user = \App\Models\User::findById($id);
//var_dump($user);



$article = new \App\Models\Article();

$article->title = 446;
$article->content = 346;
//$user->update(8);

//$article->save(7);
//$article->delete(5 );




$data = array(':email' => '12',
    'name' => '23',
    'id' => '8');
//$res = \App\Models\User::update($data);


//$config = new \App\Config();
//echo $config->data['db']['host'];


$articles = \App\Models\Article::findAll();

var_dump($articles);