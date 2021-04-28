<?php

namespace App\Repository;


use App\Entity\PsFactureprestation;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method PsFactureprestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsFactureprestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsFactureprestation[]    findAll()
 * @method PsFactureprestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsFacturePrestationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsFactureprestation::class);
    }

    // /**
    //  * @return PsFactureprestation[] Returns an array of PsFactureprestation objects
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
    public function findOneBySomeField($value): ?PsFactureprestation
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
