<?php

namespace Whipo\Shop\Modules\Core\Infrastructure;

use Symfony\Component\Uid\Uuid as SymfonyUuid;
use Whipo\Shop\Modules\Core\Domain\Uuid as DomainUuid;

class Uuid extends SymfonyUuid implements DomainUuid
{

}