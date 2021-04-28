<?php

namespace App\Repository;

use App\Entity\PsSocietymain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsSocietymain|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsSocietymain|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsSocietymain[]    findAll()
 * @method PsSocietymain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsSocietyMainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsSocietymain::class);
    }

    // /**
    //  * @return PsSocietymain[] Returns an array of PsSocietymain objects
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
    public function findOneBySomeField($value): ?PsSocietymain
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
