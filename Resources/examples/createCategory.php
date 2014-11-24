<?php # Discourse API Examples: Create Category

$discourse = require __DIR__ . '/client.php';

if (! isset ($argv[1])) {
    die (sprintf('Usage: %s <name> [color] [textColor] [parentCategoryId]' . PHP_EOL, $argv[0]));
}

array_shift($argv);

$parameters = array ('name', 'color', 'text_color', 'parent_category_id' );

array_splice($parameters, count($argv));

$category = array_combine($parameters, $argv);
if (false === $category) {
    die ('Invalid parameters specified.' . PHP_EOL);
}

$result = $discourse->createCategory($category);

print_r($result['category']);
