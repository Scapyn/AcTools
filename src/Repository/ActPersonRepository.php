<?php

namespace App\Repository;

use App\Entity\ActPerson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActPerson|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActPerson|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActPerson[]    findAll()
 * @method ActPerson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActPersonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActPerson::class);
    }

//    /**
//     * @return ActPerson[] Returns an array of ActPerson objects
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
    public function findOneBySomeField($value): ?ActPerson
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
