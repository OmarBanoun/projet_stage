<?php

namespace App\Repository;

use App\Entity\PsHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsHome[]    findAll()
 * @method PsHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsHomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsHome::class);
    }

    // /**
    //  * @return PsHome[] Returns an array of PsHome objects
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
    public function findOneBySomeField($value): ?PsHome
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
