<?php

namespace Whipo\Shop\Modules\Authentication\Infrastructure\Account;

use Exception;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Whipo\Shop\Modules\Authentication\Domain\Entity\Account;

class SymfonyAccount implements UserInterface, PasswordAuthenticatedUserInterface
{

    public function __construct(private Account $account)
    {
    }


    public function getUserIdentifier(): string
    {
        return $this->account->email;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        $roles = $this->account->roles->roles;

        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function getPassword(): string
    {
        return $this->account->password->password;
    }

    public function setPassword(string $password): self
    {
        $this->account->password->password = $password;

        return $this;
    }

    public function eraseCredentials()
    {
        throw new Exception(sprintf('Implement me %s::%s', __CLASS__, __METHOD__));
    }
}