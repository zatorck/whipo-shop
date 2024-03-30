<?php

namespace Whipo\Shop\Modules\Authentication\Application\PasswordHasher;

use SensitiveParameter;

interface
PasswordHasher
{
    public function hash(#[SensitiveParameter] string $password): string;

    public function verify(string $hashedPassword, #[SensitiveParameter] string $plainPassword): bool;
}