<?php # Discourse API Examples: Groups

$discourse = require __DIR__ . '/client.php';

foreach ($discourse->groups() as $group) {
    print_r($group);
}
