<?php

namespace Whipo\Shop\Modules\Authentication\Domain\ValueObject;

use Webmozart\Assert\Assert;

class Password
{
    public function __construct(
        public string $password,
    ) {
    }
}