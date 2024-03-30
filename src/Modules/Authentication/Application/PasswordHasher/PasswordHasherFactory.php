<?php

namespace Whipo\Shop\Modules\Authentication\Application\PasswordHasher;

interface PasswordHasherFactory
{
    public function createPasswordHasher(): PasswordHasher;
}