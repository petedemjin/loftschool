<?php
function db()
{
   return $dbh = new \PDO ('mysql:host=localhost;dbname=burger', 'root', 'root');
}

function select($email)
{
    $data = [':email'=>$email];
    $sql = 'SELECT * FROM `customer` WHERE email=:email';
    $sth = db()->prepare($sql);
    $sth->execute($data);
    return $sth->fetchAll();
}

function query($sql, $data)
{
    $sth = db()->prepare($sql);
    $sth->execute($data);
    return db()->lastInsertId('id');
}