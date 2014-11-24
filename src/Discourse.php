<?php namespace Ctrl\Discourse;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class Discourse extends Client
{
    /**
     * Creates a new Discourse client from config values.
     *
     * @param array $config
     * @return Discourse
     */
    public static function factory($config = array ())
    {
        $required = [ 'base_url', 'api_key', 'api_username' ];

        $config = Collection::fromConfig($config, [], $required);

        $client = new self($config['base_url'], [
            'command.params' => [
                'api_key'       => $config['api_key'],
                'api_username'  => $config['api_username']
            ]
        ]);

        return $client->setDescription(static::createDescription());
    }

    /**
     * @return \Guzzle\Service\Description\ServiceDescriptionInterface|void
     */
    static public function createDescription()
    {
        return ServiceDescription::factory(__DIR__.'/../Resources/discourse/service.json');
    }
}
