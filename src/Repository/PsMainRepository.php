<?php

namespace App\Repository;

use App\Entity\PsMain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsMain|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsMain|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsMain[]    findAll()
 * @method PsMain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsMainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsMain::class);
    }

    // /**
    //  * @return Main[] Returns an array of Main objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PsMain
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
