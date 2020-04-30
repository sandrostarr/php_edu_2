<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/../config.php')['db'];
        $this->dbh =  new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
    }

    public function query($sql, $data=[], $class)
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function queryy($sql, $data=[], $class)
    {

        //return $this->dbh->query($sql, \PDO::FETCH_CLASS, $class)->fetchAll();
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $data=[])
    {

        $sth = $this->dbh->prepare($sql);
        if($sth->execute($data)) {
            return true;
        } else {
            return false;
        }

    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}