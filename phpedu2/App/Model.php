<?php

namespace App;

abstract class Model
{

    public const TABLE = '';

    public $id;

    public static function findAll($sort = 'ASC')
    {
        $db = new Db();

        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY id ' . $sort,
            [':id' => '2'],
            static::class);

    }

    public static function modify($sql, $data = [])
    {
        $db = new Db();

        return $db->execute(
            $sql,
            $data);

    }

    public static function findById($id)
    {

        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id LIMIT 1';
        $res = $db->query($sql, $id, static::class);
        if($res) {
            return $res;
        } else {
            return false;
        }

    }

    public function insert()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if($name == 'id') {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' 
        (' . implode(',', $cols) . ') 
        VALUES 
        (' . implode(',', array_keys($data)) . ')';

        $db = new Db();
        $res = $db->execute($sql, $data);
        $this->id = $db->getLastId(); 
        return $res;
    }

    public function update($id)
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if($name == 'id') {
                continue;
            }
            $cols[] = $name . ' = :' . $name;
            $data[':' . $name] = $value;
        }

        $data[':id'] = $id;


        $db = new Db();

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $cols) . ' WHERE id = :id LIMIT 1';

        return $db->execute($sql, $data);
    }

    public function save($id = null)
    {
        if($id) {
            return $this->update($id);
        } else {
            return $this->insert();
        }
    }

    public static function delete($id) {
        $db = new Db();

        $data[':id'] = $id;

        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';

        $db->execute($sql, $data);
    }

}

