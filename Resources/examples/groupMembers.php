<?php # Discourse API Examples: Group Members

$discourse = require __DIR__ . '/client.php';

if (! isset ($argv[1])) {
    die (sprintf('Usage: %s <group>' . PHP_EOL, $argv[0]));
}

$members = $discourse->groupMembers([ 'slug' => $argv[1] ]);

foreach ($members as $member) {
    print_r($member);
}
