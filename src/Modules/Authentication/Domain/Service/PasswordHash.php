<?php

namespace Whipo\Shop\Modules\Authentication\Domain\Service;

use SensitiveParameter;

interface PasswordHash
{
    public function handle(#[SensitiveParameter] string $password): string;
}