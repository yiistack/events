<?php

namespace Yiistack\Events\Tests;

use Psr\Container\ContainerInterface;
use ReflectionClass;
use RustamWin\Attributes\Dto\ResolvedAttribute;
use Yiisoft\Di\Container;
use Yiisoft\Di\ContainerConfig;
use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiistack\Events\Attribute\Listener;
use Yiistack\Events\EventListenerHandler;
use PHPUnit\Framework\TestCase;
use Yiistack\Events\Tests\Support\DummyEvent;
use Yiistack\Events\Tests\Support\DummyListener;

class EventListenerHandlerTest extends TestCase
{

    public function testHandle(): void
    {
        $container = $this->getContainer();
        $handler = new EventListenerHandler($container);
        $handler->handle(
            new ReflectionClass(DummyListener::class),
            [new ResolvedAttribute(new Listener(DummyEvent::class), new \ReflectionMethod(DummyListener::class, 'handle'))]
        );

        $listeners = new Provider($handler->getListenerCollection());
        $this->assertEquals(1, iterator_count($listeners->getListenersForEvent(new DummyEvent)));
        $this->assertCount(1, $listeners->getListenersForEvent(new DummyEvent));
    }

    private function getContainer(): ContainerInterface
    {
        $config = ContainerConfig::create()->withDefinitions([
            ListenerCollection::class => new ListenerCollection(),
        ]);

        return new Container($config);
    }
}
