<?php # Discourse API Examples: Update Category

$discourse = require __DIR__ . '/client.php';

if (! isset($argv[1], $argv[2], $argv[3])) {  //categories require a name and a color
    die (sprintf('Usage: %s <name> <color> <text_color>' . PHP_EOL, $argv[0]));
}

array_shift($argv);

$delta = array ('name', 'color', 'text_color');

array_splice($delta, count($argv));

$delta = array_combine($delta, $argv);
if (false === $delta) {
    die ('Invalid parameters specified.' . PHP_EOL);
}

$category = false;
$categories = $discourse->categories();
foreach ($categories['category_list']['categories'] as $cat) {
    if ($cat['name'] !== $delta['name']) {
        continue;
    }
    $category = $cat;
}

if (false === $category) {
    die (sprintf('Invalid category %s', $delta['name']));
}

try {
    $updates = array_merge($delta, array ('id' => $category['id'] ));
    $result = $discourse->updateCategory($updates);
    print_r($result['category']);
} catch (\Exception $ex) {
    echo get_class($ex) . ': ' . $ex->getMessage() . PHP_EOL;
}
