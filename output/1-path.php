<?php

namespace Theory;

const BR = '<br>';

echo __FILE__ . BR;                     // E:\OSPanel\domains\own-php-manual\output\1-path.php
echo __DIR__ . BR;                      // E:\OSPanel\domains\own-php-manual\output
echo dirname(__FILE__) . BR;    // E:\OSPanel\domains\own-php-manual\output
echo basename(__FILE__) . BR;   // 1-path.php

print_r(pathinfo(__FILE__));
/*
Array (
    [dirname] => E:\OSPanel\domains\own-php-manual\output
    [basename] => 1-path.php
    [extension] => php
    [filename] => 1-path
)
*/
echo getcwd() . BR;                     // E:\OSPanel\domains\own-php-manual\output

// build path
$pathParts = ['var', 'tmp', 'test'];
$path = implode(DIRECTORY_SEPARATOR, $pathParts);
echo DIRECTORY_SEPARATOR . $path . BR;  // \var\tmp\test

$file = new \SplFileInfo(__FILE__);
echo $file->getPathInfo() . BR;         // E:\OSPanel\domains\own-php-manual\output
echo $file->getFileInfo() . BR;         // E:\OSPanel\domains\own-php-manual\output\1-path.php
echo $file->getExtension() . BR;        // php
