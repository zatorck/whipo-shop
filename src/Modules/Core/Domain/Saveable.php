<?php

namespace Whipo\Shop\Modules\Core\Domain;

use Whipo\Shop\Modules\Authentication\Domain\Entity\Account;

interface Saveable
{
    public function save(Account $account, bool $flush = true): void;
}