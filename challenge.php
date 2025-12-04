<?php

include 'lib/helper.php';

echo '<pre>';

// switch testmode on/off by passing ?day=XX&test=1 in the URL, echo switch a href link to toggle it
if (isset($_GET['test']) && $_GET['test'] == 1) {
    $_SESSION['testmode'] = true;
    echo '<a href="?day=' . $_GET['day'] . '">Switch to real input</a>';
} else {
    echo '<a href="?day=' . $_GET['day'] . '&test=1">Switch to test input</a>';
}   

// link to the overview page
echo ' - <a href="index.php">Back to overview</a>';

echo PHP_EOL . PHP_EOL;



$_GET['day'] = str_pad($_GET['day'], 2, '0', STR_PAD_LEFT);

$input = (isset($_GET['test']) ? 'test_' : '') . 'input.txt';

include 'challenges/day' . $_GET['day'] . '/index.php';

$ch = new Challenge($input);

ob_start();

echo devider(1);
echo 'ANSWER: ' . $ch->partOne();
echo devider(2);
echo 'ANSWER: ' . $ch->partTwo();

$output = ob_get_clean();

file_put_contents('challenges/day' . $_GET['day'] . '/'.(isset($_GET['test']) ? 'test_' : '').'output.txt', strip_tags(str_replace(['<br>', '<br/>', '<br />'], PHP_EOL, $output)));

echo $output;