<?php

namespace App\Repository;

use App\Entity\PsImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsImage[]    findAll()
 * @method PsImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsImage::class);
    }

    // /**
    //  * @return PsImage[] Returns an array of PsImage objects
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
    public function findOneBySomeField($value): ?PsImage
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
