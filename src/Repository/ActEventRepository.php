<?php

namespace App\Repository;

use App\Entity\ActEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActEvent[]    findAll()
 * @method ActEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActEventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActEvent::class);
    }

//    /**
//     * @return ActEvent[] Returns an array of ActEvent objects
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
    public function findOneBySomeField($value): ?ActEvent
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
