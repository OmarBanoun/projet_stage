<?php

namespace App\Repository;

use App\Entity\PsPrestation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsPrestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsPrestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsPrestation[]    findAll()
 * @method PsPrestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsPrestationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsPrestation::class);
    }

    // /**
    //  * @return PsPrestation[] Returns an array of PsPrestation objects
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
    public function findOneBySomeField($value): ?PsPrestation
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
