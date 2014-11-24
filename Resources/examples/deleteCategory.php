<?php # Discourse API Examples: Delete Category

$discourse = require __DIR__ . '/client.php';

//categories require a name and a color
if( ! isset ($argv[1]) ) {
    die (sprintf('Usage: %s <categoryId>' . PHP_EOL, $argv[0]));
}

$result = $discourse->deleteCategory(array ('slug' => $argv[1]));

print_r($result);
