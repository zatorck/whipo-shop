<?php

namespace Whipo\Shop\Modules\Authentication\Infrastructure\Provider;

use Exception;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Whipo\Shop\Modules\Authentication\Domain\Repository\AccountRepository;
use Whipo\Shop\Modules\Authentication\Infrastructure\Account\SymfonyAccount;
use function get_class;

/**
 * @implements UserProviderInterface<SymfonyAccount>
 * @noinspection PhpUnused
 */
readonly class SecurityUserProvider implements UserProviderInterface, PasswordUpgraderInterface
{

    public function __construct(private AccountRepository $accountRepository)
    {
    }

    public function supportsClass(string $class): bool
    {
        return $class === SymfonyAccount::class;
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof SymfonyAccount) {
            throw new UnsupportedUserException(sprintf('Invalid user class %s', get_class($user)));
        }

        $userEntity = $this->accountRepository->findOneOrNullByEmail($user->getUserIdentifier());

        if (!$userEntity) {
            throw new UserNotFoundException(sprintf('No user found for "%s"', $user->getUserIdentifier()));
        }

        return new SymfonyAccount($userEntity);
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        if (null === ($user = $this->accountRepository->findOneOrNullByEmail($identifier))) {
            throw new UserNotFoundException(sprintf('No user found for "%s"', $identifier));
        }

        return new SymfonyAccount($user);
    }

    /**
     * @throws Exception
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        throw new Exception(sprintf('Implement me %s::%s', __CLASS__, __METHOD__));
    }
}