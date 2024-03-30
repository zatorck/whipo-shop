<?php

namespace Whipo\Shop\Modules\Authentication\Infrastructure\Provider;


use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\SecurityUser;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

final class CurrentUserProvider
{
    private $tokenStorage;
    private $userRepo;
    private $currentUser; // cached to prevent querying multiple times

    public function __construct(TokenStorageInterface $tokenStorage, UserRepository $userRepo)
    {
        $this->tokenStorage = $tokenStorage;
        $this->userRepo = $userRepo;
    }

    public function get(): ?User
    {
        if (!$this->currentUser) {
            $this->currentUser = $this->fromToken($this->tokenStorage->getToken());
        }

        return $this->currentUser;
    }

    public function fromToken(TokenInterface $token): ?User
    {
        if (!$token || !$token->getUser() instanceof SecurityUser) {
            return null;
        }

        return $this->userRepo->findOneByEmail($token->getUsername());
    }
}