<?php

namespace App\Repository;

use App\Entity\PsAbout;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsAbout|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsAbout|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsAbout[]    findAll()
 * @method PsAbout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsAboutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsAbout::class);
    }

    // /**
    //  * @return PsAbout[] Returns an array of PsAbout objects
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
    public function findOneBySomeField($value): ?PsAbout
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
