<?php

namespace App\Repository;

use App\Entity\ActUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActUser[]    findAll()
 * @method ActUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActUser::class);
    }

//    /**
//     * @return ActUser[] Returns an array of ActUser objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActUser
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
