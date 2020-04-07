<?php

namespace Theory;

$opt = array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // по-умолчанию не выводятся ошибки. Чтобы отлаживать - установим вывод
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC // вернет только ассоциативные ключи
);

/*$dsn = "mysql:host=$host;dbname=$dbnsme;charset=$charset";*/

$pdo = new \PDO('sqlite::memory:', null, null, $opt);
$pdo->exec("create table users (id integer, name string, role string)");

// 1 ВАРИАНТ

// Для защиты от SQL-инъекций можно использовать
// Также способ удобен для вставки любого кол-ва параметров в любую таблицу
$data = [
    [1, 'john', 'member'],
    [2, 'john2', 'member2'],
    [3, 'john3', 'member3']
];
// prepare подготовливает запрос в БД - просчитывает план запроса. Чтобы в следующие разы просто использовать этот план. Ускорение
// также после, в execute выполняется экранирование
// а если БД не поддерживает возможность подготовки - запрос просто запоминается, без просчитывания плана запроса
// символы ? - плейсхолдеры
$stmt = $pdo->prepare('insert into users values (?, ?, ?)');
foreach ($data as $value) {
    $stmt->execute($value);
}

// так можно использовать агрегирующие функции
$stmt = $pdo->prepare('select name from users where role = ? and name != ?');
$stmt->execute(['member', '']);

print_r($stmt->fetchAll());


// 2 ВАРИАНТ
$pdo->exec("insert into users values (1, 'john', 'member')");
$pdo->exec("insert into users values (2, 'john2', 'member2')");
$pdo->exec("insert into users values (3, 'john3', 'member3')");

$stmt2 = $pdo->query('select * from users');
$stmt2 = $pdo->prepare('select name from users where role = :role');
$stmt2->bindValue(':role', 'member', PDO::PARAM_STR);
$stmt2->execute();

print_r($stmt2->fetchAll());









