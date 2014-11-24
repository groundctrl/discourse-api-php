<?php # Discourse API Examples: Active Users

/** @var Guzzle\Service\Client $discourse */
$discourse = require __DIR__ . '/client.php';

$filter = isset($argv[1]) ? $argv[1] : '';

$result = $discourse->activeUsers(array ('filter' => $filter ));

print_r($result);
