<?php

namespace App\Models;

use App\Db;
use App\GetSetTrait;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;

    public static function getLastThree()
    {

        $db = new Db();

        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 3';
        return $res = $db->query($sql, [], self::class);
    }

    use GetSetTrait;

}