<?php

namespace Theory;

$opt = array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // по-умолчанию не выводятся ошибки. Чтобы отлаживать - установим вывод
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC // вернет только ассоциативные ключи
);

/*$dsn = "mysql:host=$host;dbname=$dbnsme;charset=$charset";*/
$pdo = new \PDO('sqlite::memory:', null, null, $opt);
$pdo->exec("create table users (id integer, name string, role string)");

$data = [
    [1, 'john', 'member'],
    [2, 'john2', 'member2'],
    [8, 'john3', 'member3']
];
$stmt = $pdo->prepare('insert into users values (?, ?, ?)');
foreach ($data as $value) {
    $stmt->execute($value);
}

$idx = [1, 2, 3];
$in = implode(', ', array_fill(0, sizeof($idx), '?'));
$sql = "select * from users where id in ($in)";
$stmt = $pdo->prepare($sql);
$stmt->execute($idx);
print_r($stmt->fetchAll());
