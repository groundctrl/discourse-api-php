<?php # Discourse API Examples: Client

use Ctrl\Discourse\Discourse;

if (! file_exists(__DIR__.'/../../vendor/autoload.php')) {
    die ('Please install composer dependencies.' . PHP_EOL);
}
$loader = require __DIR__ . '/../../vendor/autoload.php';

if (! file_exists(__DIR__.'/config.php')) {
    die ('Did you forget to create a config file? Copy examples/config.dist.php to get started.' . PHP_EOL);
}
$config = require __DIR__ . '/config.php';

return Discourse::factory($config);
