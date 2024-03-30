<?php

namespace Whipo\Shop\Modules\Core\Domain;

/**
 * @template TItem
 */
interface Saving
{
    /**
     * @param TItem $account
     */
    public function save($account, bool $flush = true): void;
}