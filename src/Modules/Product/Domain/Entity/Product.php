<?php

namespace Whipo\Shop\Modules\Product\Domain\Entity;


use Symfony\Component\Uid\Uuid;

class Product
{
    private function __construct(
        public readonly Uuid $uuid,
        public readonly string $name
    ) {
    }
}
