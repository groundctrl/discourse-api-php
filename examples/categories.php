<?php # Discourse API

$client = require __DIR__ . '/client.php';

$result = $client->categories();

print_r($result);
