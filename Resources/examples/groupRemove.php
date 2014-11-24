<?php # Discourse API Examples: Create Group

$client = require __DIR__ . '/client.php';

if (! isset($argv[1])) {
    die (sprintf('Usage: %s <id> <name> [additional_names]' . PHP_EOL, $argv[0]));
}

array_shift($argv);

$id = array_shift($argv);

print_r($argv);

print_r($client->groupRemove( array ('id' => (int)$id, 'changes' => array ('delete' => $argv))));
