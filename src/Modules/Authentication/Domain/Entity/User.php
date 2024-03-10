<?php

namespace Whipo\Shop\Modules\Authentication\Domain\Entity;

use Whipo\Shop\Modules\Core\Domain\Uuid;

class User
{
    /**
     * @param  string[]  $roles
     */
    public function __construct(
        protected readonly Uuid $uuid,
        protected string $email,
        protected string $password,
        protected array $roles = [],
    ) {
    }

//    public function getUserIdentifier(): string
//    {
//        return $this->email;
//    }
//
//    /**
//     * @return string[]
//     */
//    public function getRoles(): array
//    {
//        $roles = $this->roles;
//
//        // guarantee every user at least has ROLE_USER
//        $roles[] = 'ROLE_USER';
//
//        return array_unique($roles);
//    }
//
//    public function getPassword(): string
//    {
//        return $this->password;
//    }
//
//    public function setPassword(string $password): self
//    {
//        $this->password = $password;
//
//        return $this;
//    }
}