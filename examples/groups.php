<?php # Discourse API

$client = require __DIR__ . '/client.php';

print_r($client->groups());
