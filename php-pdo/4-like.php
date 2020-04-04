<?php

namespace Theory;

$opt = array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // по-умолчанию не выводятся ошибки. Чтобы отлаживать - установим вывод
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC // вернет только ассоциативные ключи
);

/*$dsn = "mysql:host=$host;dbname=$dbnsme;charset=$charset";*/
$pdo = new \PDO('sqlite::memory:', null, null, $opt);
$pdo->exec("create table users (id integer, name string, role string)");

$pdo->exec("insert into users values (1, 'john', 'member')");
$pdo->exec("insert into users values (2, 'john2', 'member2')");
$pdo->exec("insert into users values (3, 'john3', 'member3')");

$name = 'a';
$value = "$name%";
$stmt = $pdo->prepare('select * from users where name like ?');
$stmt->execute($value);

$data = $stmt->fetchAll(\PDO::FETCH_UNIQUE);
print_r($data);
