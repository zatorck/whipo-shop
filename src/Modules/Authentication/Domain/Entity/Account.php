<?php

namespace Whipo\Shop\Modules\Authentication\Domain\Entity;

use Symfony\Component\Uid\Uuid;
use Whipo\Shop\Modules\Authentication\Domain\ValueObject\Password;
use Whipo\Shop\Modules\Authentication\Domain\ValueObject\Roles;

class Account
{
    public function __construct(
        public readonly Uuid $uuid,
        public readonly string $email,
        public Password $password,
        public Roles $roles,
    ) {
    }
}