<?php

namespace Theory;

echo '<pre>';

const BR = '<br>';
$dir = sys_get_temp_dir();
$tempName = tempnam(sys_get_temp_dir(), 'castom-temp');
$temp = tmpfile();

try {
    fwrite($temp, 'my data');
    fseek($temp, 0);
    echo fread($temp, 1024);
} finally {
    fclose($temp);
}

echo '</pre>';
