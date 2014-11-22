<?php # Discourse API

$client = require __DIR__ . '/client.php';

if( ! isset($argv[1], $argv[2]) ) {  //categories require a name and a color
    die(sprintf('Usage: %s <name> <color> [textColor] [parentCategoryId]' . PHP_EOL, $argv[0]));
}

$name = $argv[1];
$colo = $argv[2];
$tcol = isset($argv[3]) ? $argv[3] : '000000';
$pcid = isset($argv[4]) ? $argv[4] : 0;

$category =     [ 'name'               => $name,
    'color'              => $colo,
    'text_color'         => $tcol,];
//'parent_category_id' => $pcid, ];

var_dump($category);
$client->createCategory($category);
