<?php

namespace Whipo\Shop\Modules\Authentication\Domain\Service;

use SensitiveParameter;
use Whipo\Shop\Modules\Authentication\Domain\Exception\AccountNotFoundException;
use Whipo\Shop\Modules\Authentication\Domain\Repository\AccountRepository;

readonly class AccountUpdatePassword
{
    public function __construct(private AccountRepository $accountRepository, private PasswordHash $passwordHash)
    {
    }

    /**
     * @throws AccountNotFoundException
     */
    public function handle(
        string $accountEmail,
        #[SensitiveParameter] string $password
    ): void {
        $account = $this->accountRepository->findOneOrNullByEmail($accountEmail);

        if (null === $account) {
            throw new AccountNotFoundException(sprintf('Account with email: %s not found', $accountEmail));
        }

        $account->password->password = $this->passwordHash->handle($password);

        $this->accountRepository->save($account);
    }
}