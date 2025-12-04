<?php

function devider($partno) {
    return PHP_EOL . PHP_EOL . str_repeat('=', 30) . ' PART ' . $partno . ' ' . str_repeat('=', 30) . PHP_EOL . PHP_EOL;  
}

function inpread($filename = 'input.txt', $mulitline_to_array = true) {
    $filecontent = trim(file_get_contents($filename));
    if ($mulitline_to_array) {
        return explode("\n", $filecontent);
    }
    return $filecontent;
}

function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function ddd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function dump($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>'.PHP_EOL;
}