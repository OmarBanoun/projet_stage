<?php

namespace App\Repository;

use App\Entity\PsAnnonce;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method PsAnnonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsAnnonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsAnnonce[]    findAll()
 * @method PsAnnonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsAnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsAnnonce::class);
    }

    // /**
    //  * @return PsAnnonce[] Returns an array of PsAnnonce objects
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
    public function findOneBySomeField($value): ?PsAnnonce
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
