<?php

namespace App\Repository;

use App\Entity\PsSubscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsSubscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsSubscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsSubscription[]    findAll()
 * @method PsSubscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsSubscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsSubscription::class);
    }

    // /**
    //  * @return PsSubscription[] Returns an array of PsSubscription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PsSubscription
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
