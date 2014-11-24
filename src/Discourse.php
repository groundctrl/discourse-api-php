<?php namespace Ctrl\Discourse;

use Ctrl\Discourse\Plugin\SsoPlugin;
use Ctrl\Discourse\Sso\QuerySigner;
use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class Discourse extends Client
{
    const VERSION = 'DEV';

    /**
     * Creates a new Discourse client from config values.
     *
     * @param array $config
     * @return Discourse
     */
    public static function factory($config = array ())
    {
        $required = [ 'base_url', 'api_key', 'api_username', 'sso_secret' ];
        $defaults = [ 'sso_secret' => '' ];

        $config = Collection::fromConfig($config, $defaults, $required);

        $client = new self($config['base_url'], [
            'command.params' => [
                'api_key'       => $config['api_key'],
                'api_username'  => $config['api_username']
            ]
        ]);

        $client->addSubscriber(new SsoPlugin(new QuerySigner($config['sso_secret'])));

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