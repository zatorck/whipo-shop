<?php

namespace Whipo\Shop\Modules\Authentication\Infrastructure\PasswordHasher;

use SensitiveParameter;
use Symfony\Component\PasswordHasher\PasswordHasherInterface as SymfonyPasswordHasher;
use Whipo\Shop\Modules\Authentication\Application\PasswordHasher\PasswordHasher as ApplicationPasswordHasher;

class PasswordHasher implements ApplicationPasswordHasher
{
    public function __construct(private SymfonyPasswordHasher $symfonyPasswordHasher)
    {
    }

    public function hash(#[SensitiveParameter] string $password): string
    {
        return $this->symfonyPasswordHasher->hash($password);
    }

    public function verify(string $hashedPassword, #[SensitiveParameter] string $plainPassword): bool
    {
        return $this->symfonyPasswordHasher->verify($hashedPassword, $plainPassword);
    }
}