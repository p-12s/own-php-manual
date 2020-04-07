<?php

namespace Theory;

echo '<pre>';

const BR = '<br>';
$file = __DIR__ . '/test.txt';
$data = 'string to write';

if (file_exists($file) && is_readable($file)) {

    $fileDescriptor = fopen($file, 'wb');
    if ($fileDescriptor) {
        try {
            fwrite($fileDescriptor, $data);
            echo ftell($fileDescriptor) . BR;

            fseek($fileDescriptor, 0);
            echo ftell($fileDescriptor) . BR;
        } finally {
            fclose($fileDescriptor);
        }
    }
}

echo '</pre>';
