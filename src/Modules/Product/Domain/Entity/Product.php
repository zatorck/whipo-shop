<?php

namespace Whipo\Shop\Modules\Product\Domain\Entity;


use Symfony\Component\Uid\Uuid;

class Product
{
    private Uuid $uuid;

    private string $name;

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
