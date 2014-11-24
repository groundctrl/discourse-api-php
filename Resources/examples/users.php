<?php # Discourse API Examples: Users

$client = require __DIR__ . '/client.php';

foreach ($client->users() as $user) {
    print_r($user);
}
