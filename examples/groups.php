<?php # Discourse API

$client = require __DIR__ . '/client.php';

$result = $client->groups();

print_r($result);
