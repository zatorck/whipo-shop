<?php

namespace Whipo\Shop\Modules\Authentication\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Whipo\Shop\Modules\Authentication\Domain\Entity\Account;
use Whipo\Shop\Modules\Authentication\Domain\Repository\AccountRepository;

class DoctrineAccountRepository implements AccountRepository
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }


    public function findOneOrNullByEmail(string $email): ?Account
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
            ->from(Account::class, 'a')
            ->where('a.email = :email')
            ->setParameter('email', $email)
            ->setMaxResults(1);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function save(Account $account, bool $flush = true): void
    {
        $this->em->persist($account);

        if ($flush) {
            $this->em->flush();
        }
    }
}