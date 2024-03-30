<?php

namespace Whipo\Shop\Modules\Authentication\Application\Service;

use SensitiveParameter;
use Whipo\Shop\Modules\Authentication\Application\PasswordHasher\PasswordHasherFactory;
use Whipo\Shop\Modules\Authentication\Domain\Service\PasswordHash as PasswordHashInterface;

/** @noinspection PhpUnused */
readonly class PasswordHash implements PasswordHashInterface
{
    public function __construct(private PasswordHasherFactory $passwordHasherFactory)
    {
    }

    public function handle(#[SensitiveParameter] string $password): string
    {
        return $this->passwordHasherFactory->createPasswordHasher()->hash($password);
    }
}