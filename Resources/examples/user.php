<?php # Discourse API Examples: User

$discourse = require __DIR__ . '/client.php';

if (! isset ($argv[1]) ) {
    die (sprintf('Usage: %s <username>' . PHP_EOL, $argv[0]));
}

$result = $discourse->user(array ('username' => $argv[1]));

print_r($result);
