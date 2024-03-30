<?php

namespace Whipo\Shop\Modules\Authentication\Domain\ValueObject;

class Roles
{
    /**
     * @param  string[]  $roles
     */
    public function __construct(
        public array $roles
    ) {
    }
}