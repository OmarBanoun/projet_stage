<?php

namespace App\Repository;

use App\Entity\CategoryAnnonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryAnnonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryAnnonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryAnnonce[]    findAll()
 * @method CategoryAnnonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryAnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryAnnonce::class);
    }

    public function getCategory(string $category)
    {
        return $this->createQueryBuilder('')
            ->select('c')
            ->join('c.annonces', 'a')
            ->where('c.name = :name')
            ->setParameter('name', $category)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CategoryAnnonce[] Returns an array of CategoryAnnonce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryAnnonce
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
