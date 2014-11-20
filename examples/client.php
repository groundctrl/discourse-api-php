<?php

$loader = require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Ctrl\Discourse\Api\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

$config = require __DIR__ . '/config.php';

return new GuzzleClient(new Client([
    'defaults' => [
        'query' => [
            'api_key'       => $config['api_key'],
            'api_username'  => $config['api_username']
        ]
    ]
]), new Description([ 'baseUrl' => $config['base_url'] ]));
