<?php namespace Ctrl\Discourse\Plugin;

use Ctrl\Discourse\Sso\Payload;
use Guzzle\Common\Event;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\QueryString;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\DefaultRequestSerializer;
use Guzzle\Service\Command\LocationVisitor\VisitorFlyweight;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SsoPlugin extends DefaultRequestSerializer implements EventSubscriberInterface
{
    /**
     * @param VisitorFlyweight $factory
     */
    public function __construct(VisitorFlyweight $factory = null)
    {
        parent::__construct($factory ?: VisitorFlyweight::getInstance());
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
        $request    = parent::prepare($command);
        $payload    = new Payload($request->getPostFields()->toArray());
        $sso        = QueryString::fromString($payload->getQueryString());

        $request->getPostFields()->remove('sso_secret');
        $request->getQuery()->merge($sso);

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
