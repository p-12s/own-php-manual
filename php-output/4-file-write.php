<?php

namespace Theory;

$file = __DIR__ . '/test-write.txt';
$data = 'string to write';

file_put_contents($file, $data); // FILE_APPEND

if (is_writable($file)) {
    $fileDescriptor = fopen($file, 'ab'); // a+ c
    if ($fileDescriptor) {
        try {
            fwrite($fileDescriptor, $data); // указатель смещается, происходит дозапись в конец
            fwrite($fileDescriptor, $data);
            fflush($fileDescriptor);
        } finally {
            fclose($fileDescriptor);
        }
    }
}

$file = new \SplFileObject($file, 'ab'); // открыли в режиме дозаписи
$file->fwrite($data);
