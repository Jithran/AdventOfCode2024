<?php

include 'lib/helper.php';
include 'lib/update_md.php';

$folders = '';
foreach ($challenges as $day => $challenge) {
    $folders .= '
    <div class="card">
        <a href="challenge.php?day=' . str_pad($day, 2, '0', STR_PAD_LEFT) . '">
            <img src="/images/day' . str_pad($day, 2, '0', STR_PAD_LEFT) . '.png" />
            <div class="info">
                <h2>' . $challenge['title'] . '</h2>
                ' . (isset($challenge['description']) ? '<p>' . $challenge['description'] . '</p>' : '') . '
            </div>
        </a>
        <a class="challenge_link" href="' . $config['url_prefix'] . $day . '" target="_blank">View Challenge</a>
    </div>';
}

$randomHeader = 'header2.png';

// get the content of index.htm and replace the placeholder with the list of folders
$index = file_get_contents('template/index.htm');
$index = str_replace('<!-- HEADER -->', $randomHeader, $index);
$index = str_replace('<!-- FOLDERS -->', $folders, $index);
echo $index;