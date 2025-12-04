<?php

include 'challengeData.php';

// get content from readme.example

$readme = file_get_contents('template/readme.example');

// create a html list of the challenges
$challengeList = "| Afbeelding | Challenge | Link |\n|---|---|---|\n";
foreach ($challenges as $day => $challenge) {
    $img = '<img src="images/day' . str_pad($day, 2, '0', STR_PAD_LEFT) . '.png" alt="Day ' . str_pad($day, 2, '0', STR_PAD_LEFT) . '" width="240" />';
    $titleLink = "[" . $challenge['title'] . "](" . $config['url_prefix'] . $day . ")";
    $challengeLink = "[View Challenge Code]( /challenges/day" . str_pad($day, 2, '0', STR_PAD_LEFT) . "/index.php )";
    $challengeList .= "| $img | $titleLink | $challengeLink |\n";
}


// write the readme.md file
$readme = str_replace('<!-- CHALLENGES -->', $challengeList, $readme);
file_put_contents('README.md', $readme);