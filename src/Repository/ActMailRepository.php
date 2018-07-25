<?php

namespace App\Repository;

use App\Entity\ActMail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActMail|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActMail|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActMail[]    findAll()
 * @method ActMail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActMailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActMail::class);
    }

//    /**
//     * @return ActMail[] Returns an array of ActMail objects
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
    public function findOneBySomeField($value): ?ActMail
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
