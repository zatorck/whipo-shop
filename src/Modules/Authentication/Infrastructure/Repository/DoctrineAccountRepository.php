<?php

namespace Whipo\Shop\Modules\Authentication\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Whipo\Shop\Modules\Authentication\Domain\Entity\Account;
use Whipo\Shop\Modules\Authentication\Domain\Repository\AccountRepository;

/** @noinspection PhpUnused */
readonly class DoctrineAccountRepository implements AccountRepository
{
    public function __construct(private EntityManagerInterface $em)
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

        /** @var ?Account $account */
        $account = $qb->getQuery()->getOneOrNullResult();

        return $account;
    }

    public function save($account, bool $flush = true): void
    {
        $this->em->persist($account);

        if ($flush) {
            $this->em->flush();
        }
    }
}