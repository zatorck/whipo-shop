<?php

namespace Whipo\Shop\Modules\Product\Domain\Entity;

use Whipo\Shop\Modules\Core\Domain\Uuid;

class Product
{
    private function __construct(
        public readonly Uuid $uuid,
        public readonly string $name
    ) {
    }
}
