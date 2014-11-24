<?php # Discourse API Examples: Category Latest Topics

/** @var Guzzle\Service\Client $discourse */
$discourse = require __DIR__ . '/client.php';

$result = $discourse->categoryLatestTopics([ 'slug' => $argv[1]]);

print_r($result['topic_list']['topics']);
