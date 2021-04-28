<?php

namespace App\Repository;

use App\Entity\PsImageannonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsImageannonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsImageannonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsImageannonce[]    findAll()
 * @method PsImageannonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsImageAnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsImageannonce::class);
    }

    // /**
    //  * @return PsImageannonce[] Returns an array of PsImageannonce objects
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
    public function findOneBySomeField($value): ?PsImageannonce
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
