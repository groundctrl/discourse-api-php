<?php # Discourse API

$client = require __DIR__ . '/client.php';

if(!isset($argv[1])) {
    die(sprintf('Usage: %s <name>' . PHP_EOL, $argv[0]));
}

$name = $argv[1];

print_r($client->createGroup( ['group' => [ 'name' => $name ] ]));
#print_r($client->createGroup([1, 2, 3]));