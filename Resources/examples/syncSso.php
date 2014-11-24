<?php # Discourse API Examples: Sync Sso

$client = require __DIR__ . '/client.php';

if (! isset($argv[1], $argv[2], $argv[3])) {
    die (sprintf('Usage: %s <id> <email> <username> [name]' . PHP_EOL, $argv[0]));
}

array_shift($argv);

$keys = [ 'id', 'email', 'username', 'name' ];

array_splice($keys, count($argv));

$sync = array_combine($keys, $argv);
if (false === $sync) {
    die ('Invalid parameters specified.' . PHP_EOL);
}

$sync['id'] = (int) $sync['id'];

$result = $client->syncSso($sync);

print_r($result['single_sign_on_record']);
