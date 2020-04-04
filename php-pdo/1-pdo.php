<?php

namespace Theory;

$opt = array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION // по-умолчанию не выводятся ошибки. Чтобы отлаживать - установим вывод
);

/*$dsn = "mysql:host=$host;dbname=$dbnsme;charset=$charset";*/

$pdo = new \PDO('sqlite::memory:', null, null, $opt);

$pdo->exec("create table users (id integer, name string)");
$pdo->exec("insert into users values (1,'aaa')");
$pdo->exec("insert into users values (2,'bbb')");
$data = $pdo->query("select * from users")->fetchAll();

echo "<pre>";
print_r($data);
echo "</pre>";

/* Output:
Array
(
    [0] => Array
        (
            [id] => 1
            [0] => 1 // по-умолчанию PDO возвращает и ключ и индекс, но это настраивается
            [name] => aaa
            [1] => aaa
        )
    [1] => Array
        (
            [id] => 2
            [0] => 2
            [name] => bbb
            [1] => bbb
        )
)
*/