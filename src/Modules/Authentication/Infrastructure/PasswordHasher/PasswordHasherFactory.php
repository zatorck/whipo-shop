<?php

namespace Whipo\Shop\Modules\Authentication\Infrastructure\PasswordHasher;

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory as SymfonyPasswordHasherFactory;
use Whipo\Shop\Modules\Authentication\Application\PasswordHasher\PasswordHasher as PasswordHasherInterface;
use Whipo\Shop\Modules\Authentication\Application\PasswordHasher\PasswordHasherFactory as PasswordHasherFactoryInterface;

class PasswordHasherFactory implements PasswordHasherFactoryInterface
{
    private const PASSWORD_HASH_ALGORITHM = 'bcrypt';

    public function createPasswordHasher(): PasswordHasherInterface
    {
        $factory = new SymfonyPasswordHasherFactory([
            self::PASSWORD_HASH_ALGORITHM => ['algorithm' => self::PASSWORD_HASH_ALGORITHM],
        ]);

        $symfonyPasswordHasher = $factory->getPasswordHasher(self::PASSWORD_HASH_ALGORITHM);

        return new PasswordHasher($symfonyPasswordHasher);
    }
}