<?php

namespace App\Repository;

use App\Entity\PsSocietyannexe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsSocietyannexe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsSocietyannexe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsSocietyannexe[]    findAll()
 * @method PsSocietyannexe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsSocietyAnnexeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsSocietyannexe::class);
    }

    // /**
    //  * @return PsSocietyannexe[] Returns an array of PsSocietyannexe objects
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
    public function findOneBySomeField($value): ?PsSocietyannexe
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
