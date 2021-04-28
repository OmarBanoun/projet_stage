<?php

namespace App\Repository;

use App\Entity\PsFacturedevis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsFacturedevis|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsFacturedevis|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsFacturedevis[]    findAll()
 * @method PsFacturedevis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsFactureDevisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsFacturedevis::class);
    }

    // /**
    //  * @return PsFacturedevis[] Returns an array of PsFacturedevis objects
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
    public function findOneBySomeField($value): ?PsFacturedevis
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
