<?php # Discourse API

/** @var \GuzzleHttp\Command\Guzzle\GuzzleClient $client */
$client = require __DIR__ . '/client.php';

print_r($client->categories());
