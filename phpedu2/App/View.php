<?php

namespace App;

class View implements \Countable
{

    protected $data = [];

    public function display($template)
    {
        include $template;
    }

    use GetSetTrait;

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }
}
