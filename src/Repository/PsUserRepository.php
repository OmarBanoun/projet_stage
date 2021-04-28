<?php

namespace App\Repository;

use App\Entity\PsUser;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @method PsUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsUser[]    findAll()
 * @method PsUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsUserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsUser::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof PsUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function adminQuery()
    {
        return $this->createQueryBuilder('u')
        ->where('u.roles LIKE :role')
        ->setParameter('role', '%"' . 'ROLE_ADMIN' . '"%');
    }

    static public function findByExampleField( PsUserRepository $repository)
    {
        return $repository->createQueryBuilder('u')
            ->andWhere('u.roles LIKE :role')
            ->setParameter('role', 'ROLE_ADMIN')
            ->getQuery()
            ->getResult()
        ;
    }
    // /**
    //  * @return PsUser[] Returns an array of PsUser objects
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
    public function findOneBySomeField($value): ?PsUser
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
