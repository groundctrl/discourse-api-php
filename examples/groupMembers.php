<?php # Discourse API

$client = require __DIR__ . '/client.php';

$sluggify = function($str) {
    return [ 'slug' => $str ];
};

print("Admins:".PHP_EOL);
print_r($client->groupMembers($sluggify('admins')));
echo PHP_EOL;

print("Trust Level 0:".PHP_EOL);
print_r($client->groupMembers($sluggify('trust_level_0')));
echo PHP_EOL;