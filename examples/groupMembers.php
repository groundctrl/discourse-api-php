<?php # Discourse API

$client = require __DIR__ . '/client.php';

if(!isset($argv[1])) {
    die(sprintf('Usage: %s <group>' . PHP_EOL, $argv[0]));
}

$group = $argv[1];

print_r($client->groupMembers( ['slug' => $group  ]));
