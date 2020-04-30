<?php

namespace App;

use App\Models\Author;

trait GetSetTrait
{
    /**
     * @param $name
     * @return |null
     */
    public function __get($name)
    {
        if ($name == 'author') {
            if(isset($this->author_id)) {
                $author = Author::findById(['id' => $this->author_id]);
                return $author[0];
            }
        } else {
        return $this->data[$name] ?? null;
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

}