<?php
function db()
{
   return new PDO ('mysql:host=localhost;dbname=burger', 'root', 'root');
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
    $dbh = new PDO ('mysql:host=localhost;dbname=burger', 'root', 'root');
    $sth = $dbh->prepare($sql);
    $sth->execute($data);
    return $dbh->lastInsertId('id');
}