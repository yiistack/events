<?php

declare(strict_types=1);

namespace Yiistack\Events\Tests\Support;

use Yiistack\Events\Attribute\Listener;

final class DummyListener
{
    #[Listener('test')]
    public function handle(object $event): void
    {
    }
}
