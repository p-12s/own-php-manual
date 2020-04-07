<?php

namespace Theory;

echo '<pre>';

$file = __DIR__ . '/test.txt';
if (file_exists($file) && is_readable($file)) {
    $lines = file($file); // если файл может быть большим - пользоваться не нужно, весь файл хранится в памяти
    foreach ($lines as $line) {
        echo $line;
    }

    $content = file_get_contents($file);
    echo $content;

    $fileDescriptor = fopen($file, 'rb'); // r+
    if ($fileDescriptor) {
        try {
            $contents = fread($fileDescriptor, filesize($file));
            print_r($contents);
        } finally {
            fclose($fileDescriptor);
        }
    }

    $fileDescriptor2 = fopen($file, 'rb');
    if ($fileDescriptor2) {
        try {
            while (!feof($fileDescriptor2)) {
                echo fgets($fileDescriptor2, 1024); // чтение по блокам
            }
        } finally {
            fclose($fileDescriptor2);
        }
    }

    $fileDescriptor3 = fopen($file, 'rb');
    if ($fileDescriptor3) {
        try {
            while ($userInfo = fscanf($fileDescriptor3, "%s\t%s\t%s\n")) {
                list($name, $profession, $counttryCode) = $userInfo;
            }
        } finally {
            fclose($fileDescriptor3);
        }
    }
}

$file = new \SplFileObject($file);
while (!$file->eof()) {
    echo $file->fgets();
}

foreach ($file as $lineNumber => $content) {
    print_r('Line %d: %s', $lineNumber, $content);
}

$linesTenToTwentyIterator = new \LimitIterator(
    $file,
    9, // start at line 10
    10 // iterate 10 lines
);
foreach ($linesTenToTwentyIterator as $line) {
    echo $line;
}

echo '</pre>';
