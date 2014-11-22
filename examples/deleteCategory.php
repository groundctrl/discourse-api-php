<?php # Discourse API

$client = require __DIR__ . '/client.php';

if( ! isset($argv[1]) ) {  //categories require a name and a color
    die(sprintf('Usage: %s <categoryId>' . PHP_EOL, $argv[0]));
}

$id = [ 'slug' => $argv[1] ];

$client->deleteCategory($id);
