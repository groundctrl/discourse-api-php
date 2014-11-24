<?php # Discourse API Examples: Categories

/** @var Guzzle\Service\Client $discourse */
$discourse = require __DIR__ . '/client.php';

$result = $discourse->categories();

foreach ($result['category_list']['categories'] as $category) {
    print_r($category);
}
