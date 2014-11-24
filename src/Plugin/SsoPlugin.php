<?php namespace Ctrl\Discourse\Plugin;

use Ctrl\Discourse\Sso\Payload;
use Ctrl\Discourse\Sso\QuerySigner;
use Guzzle\Common\Event;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\DefaultRequestSerializer;
use Guzzle\Service\Command\RequestSerializerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SsoPlugin implements EventSubscriberInterface, RequestSerializerInterface
{
    /** @var QuerySigner */
    private $signer;

    /** @var RequestSerializerInterface */
    private $serializer;

    /**
     * SsoPlugin Constructor.
     *
     * @param QuerySigner $signer
     * @param RequestSerializerInterface $serializer
     */
    public function __construct(QuerySigner $signer, RequestSerializerInterface $serializer = null)
    {
        $this->signer = $signer;
        $this->serializer = $serializer ?: DefaultRequestSerializer::getInstance();
    }

    /**
     * Runs before a Command is prepared.
     *
     * @param Event $event
     */
    public function beforePrepare(Event $event)
    {
        /** @var \Guzzle\Service\Command\OperationCommand $command */
        $command = $event['command'];

        if ('SyncSso' === $command->getName()) {
            $command->setRequestSerializer($this);
        }
    }

    /**
     * Create a request for a command
     *
     * @param CommandInterface $command Command that will own the request
     *
     * @return RequestInterface
     */
    public function prepare(CommandInterface $command)
    {
        /** @var \Guzzle\Http\Message\EntityEnclosingRequestInterface $request */
        $request    = $this->serializer->prepare($command);
        $payload    = new Payload($this->signer, json_decode($request->getBody(), true));

        $payloadQueryString = $payload->getQueryString();
        $params = [];
        parse_str($payloadQueryString, $params);

        $queryString = $request->getQuery();

        foreach ($params as $key => $value) {
            $queryString->set($key, $value);
        }

        return $request;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'client.command.create' => 'beforePrepare',
        ];
    }
}
