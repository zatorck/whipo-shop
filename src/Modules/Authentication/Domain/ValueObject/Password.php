<?php

namespace Whipo\Shop\Modules\Authentication\Domain\ValueObject;

class Password
{
    public function __construct(
        public string $password,
    ) {
    }
}