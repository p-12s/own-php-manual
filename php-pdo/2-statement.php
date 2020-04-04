<?php

namespace Theory;

$opt = array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // по-умолчанию не выводятся ошибки. Чтобы отлаживать - установим вывод
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC // вернет только ассоциативные ключи
);

/*$dsn = "mysql:host=$host;dbname=$dbnsme;charset=$charset";*/

$pdo = new \PDO('sqlite::memory:', null, null, $opt);

$pdo->exec("create table users (id integer, name string)");

// Для защиты от SQL-инъекций можно использовать
// Также способ удобен для вставки любого кол-ва параметров в любую таблицу
$values = [3, 'm\'ark--'];
$data = implode(', ', array_map(static function ($item) use ($pdo) {
    return $pdo->quote($item);
}, $values));
$sql = "insert into users values ($data)";
$pdo->exec($sql);

// После выполнения запроса в БД возвращается объект PDO-statement
$stmt = $pdo->query('select * from users')->fetchAll();
echo '<pre>';
print_r($stmt);
echo '</pre>';

/*
Output:
'3', 'm''ark--'
*/

// так можно работать с курсором
$stmt = $pdo->query('select * from users');

while ($row = $stmt->fetch()) {
    print_r($row);
}

foreach ($stmt as $value) {
    print_r($value);
}

// PDO::FETCH_COLUMN, PDO::FETCH_KEY_PAIR, PDO::FETCH_UNIQ
// так можно использовать агрегирующие функции
$stmt = $pdo->query('select MAX(id) from users');
print_r($stmt->fetchColumn() ."\n");
