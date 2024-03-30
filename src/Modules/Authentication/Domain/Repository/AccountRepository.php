<?php

namespace Whipo\Shop\Modules\Authentication\Domain\Repository;

use Whipo\Shop\Modules\Authentication\Domain\Entity\Account;
use Whipo\Shop\Modules\Core\Domain\Saveable;

interface AccountRepository extends Saveable
{
    public function findOneOrNullByEmail(string $email): ?Account;
}