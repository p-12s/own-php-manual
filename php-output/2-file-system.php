<?php

namespace Theory;

echo '<pre>';

$pathDir = __DIR__ . '/test';
if (!file_exists($pathDir)) {
    mkdir($pathDir, 0755, $recursive);
}
rmdir($pathDir); // не может удалить непустую директорию

$pathFile = __DIR__ . '/test.txt';
if (!file_exists($pathFile)) {
    touch($pathFile);
}
unlink($pathFile); // ОС удалит файл, когда на него не останется ссылок

$old = __DIR__ . '/test-old.txt';
$new = __DIR__ . '/test-new.txt';
rename($old, $new);
copy($old, $new);


print_r(glob('e:\OSPanel\domains\own-php-manual\php-output\*'));
/* Output:
Array
(
    [0] => e:\OSPanel\domains\own-php-manual\php-output\1-path.php
    [1] => e:\OSPanel\domains\own-php-manual\php-output\2-file-system.php
)
*/

print_r(scandir('e:\OSPanel\domains\own-php-manual\php-output'));
/* Output:
Array
(
    [0] => .
    [1] => ..
    [2] => 1-path.php
[3] => 2-file-system.php
)
*/

// Directory iterator
$iterator = new \GlobIterator('e:\OSPanel\domains\own-php-manual\php-output\*');
foreach($iterator as $item){
    print_r($item);
}
/* Output:
SplFileInfo Object
(
    [pathName:SplFileInfo:private] => e:\OSPanel\domains\own-php-manual\php-output\1-path.php
    [fileName:SplFileInfo:private] => 1-path.php
)
SplFileInfo Object
(
    [pathName:SplFileInfo:private] => e:\OSPanel\domains\own-php-manual\php-output\2-file-system.php
    [fileName:SplFileInfo:private] => 2-file-system.php
)
*/

$info = new \SplFileInfo(__FILE__);
print_r($info);
/* Output:
SplFileInfo Object
(
    [pathName:SplFileInfo:private] => E:\OSPanel\domains\own-php-manual\php-output\2-file-system.php
[fileName:SplFileInfo:private] => 2-file-system.php
)
*/
echo '</pre>';