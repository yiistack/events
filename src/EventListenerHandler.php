<?php

declare(strict_types=1);

namespace Yiistack\Events;

use Psr\Container\ContainerInterface;
use ReflectionClass;
use RustamWin\Attributes\Dto\ResolvedAttribute;
use RustamWin\Attributes\Handler\AttributeHandlerInterface;
use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\Injector\Injector;
use Yiistack\Events\Attribute\Listener;

final class EventListenerHandler implements AttributeHandlerInterface
{
    private ListenerCollection $listenerCollection;
    private Injector $injector;

    public function __construct(private ContainerInterface $container)
    {
        $this->listenerCollection = new ListenerCollection();
        $this->injector = new Injector($this->container);
    }

    /**
     * {@inheritdoc}
     */
    public function handle(ReflectionClass $class, iterable $attributes): void
    {
        foreach ($attributes as $attribute) {
            if ($attribute->getAttribute() instanceof Listener) {
                /** @var ResolvedAttribute<Listener, \ReflectionFunction|\ReflectionMethod> $attribute */
                $this->listenerCollection = $this->listenerCollection->add(
                    $this->prepareListener($attribute->getReflectionTarget()),
                    $attribute->getAttribute()->getEvent()
                );
            }
        }
    }

    public function getListenerCollection(): ListenerCollection
    {
        return $this->listenerCollection;
    }

    private function prepareListener(\ReflectionFunction|\ReflectionMethod $reflection): callable
    {
        if ($reflection instanceof \ReflectionMethod) {
            $listener = [$this->container->get($reflection->getDeclaringClass()->getName()), $reflection->getName()];
        } else {
            $listener = $reflection->getClosure();
        }
        return function (object $event) use ($listener): mixed {
            /** @var callable $listener */
            return $this->injector->invoke(
                $listener,
                [$event]
            );
        };
    }
}
