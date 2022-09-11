<?php

declare(strict_types=1);

namespace Yiistack\Events\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION)]
final class Listener
{
    public function __construct(private string $event)
    {
    }

    public function getEvent(): string
    {
        return $this->event;
    }
}
