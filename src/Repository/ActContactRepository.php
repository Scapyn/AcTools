<?php

namespace App\Repository;

use App\Entity\ActContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActContact[]    findAll()
 * @method ActContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActContactRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActContact::class);
    }

//    /**
//     * @return ActContact[] Returns an array of ActContact objects
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
    public function findOneBySomeField($value): ?ActContact
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
