<?php # Discourse API Examples: Create Group

$client = require __DIR__ . '/client.php';

if (! isset($argv[1])) {
    die (sprintf('Usage: %s <name>' . PHP_EOL, $argv[0]));
}

print_r($client->createGroup( array ('group' => array ('name' => $argv[1]))));
