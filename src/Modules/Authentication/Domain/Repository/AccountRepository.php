<?php

namespace Whipo\Shop\Modules\Authentication\Domain\Repository;

use Whipo\Shop\Modules\Authentication\Domain\Entity\Account;
use Whipo\Shop\Modules\Core\Domain\Saving;

/**
 * @extends Saving<Account>
 */
interface AccountRepository extends Saving
{
    public function findOneOrNullByEmail(string $email): ?Account;
}