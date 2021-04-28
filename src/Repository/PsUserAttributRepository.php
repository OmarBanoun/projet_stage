<?php

namespace App\Repository;

use App\Entity\PsUserattribut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsUserattribut|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsUserattribut|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsUserattribut[]    findAll()
 * @method PsUserattribut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsUserAttributRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsUserattribut::class);
    }

    // /**
    //  * @return PsUserattribut[] Returns an array of PsUserattribut objects
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
    public function findOneBySomeField($value): ?PsUserattribut
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
